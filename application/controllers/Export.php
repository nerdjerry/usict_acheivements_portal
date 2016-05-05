<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Export extends CI_Controller{

	private $columns;
	public function __construct(){
		parent::__construct();
		$this->currentUserType = get_user_type();
		//Get number of achievements
		$this->load->model('achievements');
		$this->count = $this->achievements->getAllStaffAchievementCounts();
		$this->columns = range('A','Z');
	}
	public function exportPublication(){
		if(isset($_SESSION['publication']) && $this->currentUserType == 0){
			$this->setupFile();
			//This contains all attributes we need in header
			$fieldNames= array('Name', 'Designation', 'Title','Date of Publication','Journal/Conference Name','Co Author',
				'Co Author','Co Author','Co Author','Communicating Author','First Author','Presented In','Level');	
			$this->setHeader($fieldNames);	
			//Load model,get data based on filter saved in session
			$this->load->model('publications');
			$resultsData = $this->publications->filteredPublications($_SESSION['publication'],$this->count['publications'],1);
			$index = 2;
			//Set values for each rows as per result returned from model
			foreach ($resultsData as $result) {
				if(!is_null($result['month_of_pub'])){
					$date = noToMonth($result['month_of_pub']).",".$result['year_of_pub'];
				}else{
					$date = $result['year_of_pub'];
				}
				$this->excel->getActiveSheet()->setCellValue("A".$index,$result['name']);
				$this->excel->getActiveSheet()->setCellValue("B".$index,$result['designation']);
				$this->excel->getActiveSheet()->setCellValue("C".$index,$result['title']);
				$this->excel->getActiveSheet()->setCellValue("D".$index,$date);
				$this->excel->getActiveSheet()->setCellValue("E".$index,$result['journal_name']);
				$this->excel->getActiveSheet()->setCellValue("F".$index,$result['coauthor_1']);
				$this->excel->getActiveSheet()->setCellValue("G".$index,$result['coauthor_2']);
				$this->excel->getActiveSheet()->setCellValue("H".$index,$result['coauthor_3']);
				$this->excel->getActiveSheet()->setCellValue("I".$index,$result['coauthor_4']);
				$this->excel->getActiveSheet()->setCellValue("J".$index,$result['comm_author']);
				$this->excel->getActiveSheet()->setCellValue("K".$index,$result['first_author']);
				$this->excel->getActiveSheet()->setCellValue("L".$index,$result['presented_in']);
				$this->excel->getActiveSheet()->setCellValue("M".$index,$result['presented_at']);								
				$index++;
			}
			$this->wrapAndCenterText('M',$index);
			$fileName = 'USITPublications'.date('d-m-Y').'.xls';
			$this->sendFile($fileName);
			redirect('filter/publication');
			end;
		}else{
			show_error("Action not Allowed");
		}
	}
	private function setupFile(){
		//Load the PHP EXCEL library instance
		$this->load->library('excel');
		//Activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//Set title for active sheet
		$this->excel->getActiveSheet()->setTitle('Results');
		//List of all columns we will use,we can push to this array column like
		//"AA" if more columns needed
		$this->columns = range('A','Z');
		//Set the width for each column to 20px
		for($i=0;$i<count($this->columns);$i++){
				$this->excel->getActiveSheet()->getColumnDimension($this->columns[$i])->setWidth(20);
		}

	}
	/*This function takes an array of field names and set cell headers for active worksheet*/
	private function setHeader($fieldNames){
		//Setting style for header
		$style = array(
		'font'  => array(
			'bold'  => true,
			'size'  => 12,
			'name'  => 'Array'
		));
		//Set header cells
		for($i=0; $i<count($fieldNames); $i++){
				$cellId = $this->columns[$i]."1";
				$this->excel->getActiveSheet()->setCellValue($cellId,$fieldNames[$i]);
				$this->excel->getActiveSheet()->getStyle($cellId)->applyFromArray($style);
		}
	}
	private function wrapAndCenterText($endColumnName,$index){
		//Set all text to wrap in cell and center vertically and horizontally
		$this->excel->getActiveSheet()->getStyle('A'.'1'.":".$endColumnName.$index)->getAlignment()
										->setWrapText(true)
										->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
										->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	}
	private function sendFile($fileName){
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
	}
}
?>