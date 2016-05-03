<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Filter extends CI_COntroller{

	private $currentUseType;
	private $count;
	private $filter;
	public function __construct(){
		parent::__construct();
		$this->currentUserType = get_user_type();
		//Get number of achievements
		$this->load->model('achievements');
		$this->count = $this->achievements->getAllStaffAchievementCounts();
		$this->filter = null;
	}

	public function publication(){
		if($this ->currentUserType == 0){
			$achievementType = 'publication';
			//If form again submitted then take values from form not from session
			if($this->input->post('results') != null){
				unset($_SESSION[$achievementType]);
			}
			$condition['name'] = filterInput($achievementType,'name','name','');
			$condition['isProfessor'] = filterInput($achievementType,'professor','isProfessor','');
			$condition['isAssociateProf'] = filterInput($achievementType,'associate_professor','isAssociateProf','');
			$condition['isAssistantProf'] = filterInput($achievementType,'assistant_professor','isAssistantProf','');
			$condition['title'] = filterInput($achievementType,'title','title','');
			$condition['startDate'] = filterInput($achievementType,'start_date','startDate',2000);
			$condition['endDate'] = filterInput($achievementType,'end_date','endDate',date('Y'));
			$condition['journalName'] = filterInput($achievementType,'journal_name','journalName','') ;
			$condition['isJournal'] = filterInput($achievementType,'journal','isJournal','');
			$condition['isConference'] =  filterInput($achievementType,'conference','isConference','');
			$condition['isNational'] = filterInput($achievementType,'national','isNational','');
			$condition['isInternational'] = filterInput($achievementType,'international','isInternational','');
			$this->filter = $condition;
			$resultType = $this->input->post('results') != null ? $this->input->post('results') : 'view';
			$this->load->model('publications');
			$data['noOfPublications'] = $this->count['publications'];
			$data['noOfSeminars'] = $this->count['seminars'];
			$data['noOfProjects'] = $this->count['projects'];
			$data['noOfAwards'] = $this->count['awards'];
			$data['infoType'] = 1;
			$data['requestedUserType'] = 1;
			$data['results'] = true;
			//Sava filter conditions in session so that they can be used in different pages of pagination
			$_SESSION[$achievementType] = $condition;
			$data['filter'] = $_SESSION[$achievementType];
			//show_error(var_dump($_SESSION[$achievementType]));
			if($resultType == 'view'){
				//Pagination
				$totalRows = $this->count['publications'];
				$perPage = 1;
				$uriSegment = 3;
				$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
				//Get data from model
				$data['info'] = $this->publications->filteredPublications($condition,$perPage,$page);
				$totalRows = $this->publications->filteredPublicationsCount($condition);
				//show_error($totalRows);
				$data['links'] = $this->doPagination('/filter/publication/',$totalRows,$perPage,$uriSegment);
				$this->load->view('admin',$data);
			}else{
				show_error("Exporting");
				redirect('/filter/exportPublication');
			}
			
		}else{
			redirect('/home');
		}
	}

	public function exportPublication(){
		if(!is_null($this->filter)){
			$this->load->library('excel');
			//Activate worksheet number 1
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Results');
			$this->load->model('publications');
			$resultsData = $this->publications->filteredPublications($this->filter,$this->count['publications'],1);
			$this->excel->getActiveSheet()->fromArray($resultsData);
			$fileName = 'Publications.xlsx';
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$fileName.'"');
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
			$objWriter->save('php://output');
			redirect('filter/publication');
		}else{
			show_error("Message");
		}
		
	}

	public function seminar(){
	if($this ->currentUserType == 0){
		$condition['name'] = $this->input->post('name') !=null ? $this->input->post('name') : '' ;
		$condition['isProfessor'] = $this->input->post('professor') != null ? $this->input->post('professor') : '';
		$condition['isAssociateProf'] = $this->input->post('associate_professor') != null ? $this->input->post('associate_professor') : '';
		$condition['isAssistantProf'] = $this->input->post('assistant_professor') != null ? $this->input->post('assistant_professor') : '';
		$condition['title'] = $this->input->post('title') != null ? $this->input->post('title') : '';
		$condition['place'] = $this->input->post('place') != null ? $this->input->post('place') : '';
		$condition['organiser'] = $this->input->post('organiser') != null ? $this->input->post('organiser') : '';
		$condition['startDate'] = $this->input->post('start_date') != null ? $this->input->post('start_date') : '2000-01-01';
		$condition['endDate'] = $this->input->post('end_date') != null ? $this->input->post('end_date') : date('Y-m-d');
		$condition['isNational'] = $this->input->post('national') != null ? $this->input->post('national'): '';
		$condition['isInternational'] = $this->input->post('international') != null ?$this->input->post('international')  : '';
		$condition['isSeminar'] = $this->input->post('seminar') != null ?$this->input->post('seminar')  : '';
		$condition['isWorkshop'] = $this->input->post('workshop') != null ?$this->input->post('workshop')  : '';
		$condition['isTraining'] = $this->input->post('training_program') != null ?$this->input->post('training_program')  : '';
		$condition['isFDP'] = $this->input->post('fdp') != null ?$this->input->post('fdp')  : '';
		$condition['isSymposium'] = $this->input->post('symposium') != null ?$this->input->post('symposium')  : '';
		$condition['isAttended'] = $this->input->post('attended') != null ?$this->input->post('attended')  : '';
		$condition['isOrganised'] = $this->input->post('organised') != null ?$this->input->post('organised')  : '';
		$condition['noOfParticipants'] = $this->input->post('no_of_participants') != null ? $this->input->post('no_of_participants') : null; 
		$this->filter = $condition;
		$resultType = $this->input->post('results') != null ? $this->input->post('results') : 'view';
		$this->load->model('seminars');
		$data['noOfPublications'] = $this->count['publications'];
		$data['noOfSeminars'] = $this->count['seminars'];
		$data['noOfProjects'] = $this->count['projects'];
		$data['noOfAwards'] = $this->count['awards'];
		$data['infoType'] = 2;
		$data['requestedUserType'] = 1;
		$data['results'] = true;
		if($resultType == 'view'){
			//Pagination
			$totalRows = $this->count['seminars'];
			$perPage = 30;
			$uriSegment = 3;
			$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
			//Get data from model
			$data['info'] = $this->seminars->filteredSeminars($condition,$perPage,$page);
			$data['links'] = $this->doPagination('/filter/seminar/',$totalRows,$perPage,$uriSegment);
			$this->load->view('admin',$data);
		}else{
			show_error("Exporting");
			redirect('/filter/exportPublication');
		}
	}else{
		redirect('/home');
	}
}
public function project(){
	if($this ->currentUserType == 0){
		$condition['name'] = $this->input->post('name') !=null ? $this->input->post('name') : '' ;
		$condition['isProfessor'] = $this->input->post('professor') != null ? $this->input->post('professor') : '';
		$condition['isAssociateProf'] = $this->input->post('associate_professor') != null ? $this->input->post('associate_professor') : '';
		$condition['isAssistantProf'] = $this->input->post('assistant_professor') != null ? $this->input->post('assistant_professor') : '';
		$condition['title'] = $this->input->post('title') != null ? $this->input->post('title') : '';
		$condition['grantingAgency'] = $this->input->post('granting_agency') != null ? $this->input->post('granting_agency') : NULL;
		$condition['startDate'] = $this->input->post('start_date') != null ? $this->input->post('start_date') : '2000-01-01';
		$condition['endDate'] = $this->input->post('end_date') != null ? $this->input->post('end_date') : date('Y-m-d');
		$condition['amountStart'] = $this->input->post('amount_start') != null ? $this->input->post('amount_start') : NULL;
		$condition['amountEnd'] = $this->input->post('amount_end') != null ? $this->input->post('amount_end') : NULL;
		$this->filter = $condition;
		$resultType = $this->input->post('results') != null ? $this->input->post('results') : 'view';
		$this->load->model('projects');
		$data['noOfPublications'] = $this->count['publications'];
		$data['noOfSeminars'] = $this->count['seminars'];
		$data['noOfProjects'] = $this->count['projects'];
		$data['noOfAwards'] = $this->count['awards'];
		$data['infoType'] = 3;
		$data['requestedUserType'] = 1;
		$data['results'] = true;
		if($resultType == 'view'){
			//Pagination
			$totalRows = $this->count['projects'];
			$perPage = 30;
			$uriSegment = 3;
			$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
			//Get data from model
			$data['info'] = $this->projects->filteredProjects($condition,$perPage,$page);
			$data['links'] = $this->doPagination('/filter/project/',$totalRows,$perPage,$uriSegment);
			$this->load->view('admin',$data);
		}else{
			show_error("Exporting");
			redirect('/filter/exportPublication');
		}
	}else{
		redirect('/home');
	}
}
public function award(){
	if($this ->currentUserType == 0){
		$condition['name'] = $this->input->post('name') !=null ? $this->input->post('name') : '' ;
		$condition['isProfessor'] = $this->input->post('professor') != null ? $this->input->post('professor') : '';
		$condition['isAssociateProf'] = $this->input->post('associate_professor') != null ? $this->input->post('associate_professor') : '';
		$condition['isAssistantProf'] = $this->input->post('assistant_professor') != null ? $this->input->post('assistant_professor') : '';
		$condition['startDate'] = $this->input->post('start_date') != null ? $this->input->post('start_date') : '2000-01-01';
		$condition['endDate'] = $this->input->post('end_date') != null ? $this->input->post('end_date') : date('Y-m-d');
		$condition['amountStart'] = $this->input->post('amount_start') != null ? $this->input->post('amount_start') : NULL;
		$condition['amountEnd'] = $this->input->post('amount_end') != null ? $this->input->post('amount_end') : NULL;
		$this->filter = $condition;
		$resultType = $this->input->post('results') != null ? $this->input->post('results') : 'view';
		$this->load->model('awards');
		$data['noOfPublications'] = $this->count['publications'];
		$data['noOfSeminars'] = $this->count['seminars'];
		$data['noOfProjects'] = $this->count['projects'];
		$data['noOfAwards'] = $this->count['awards'];
		$data['infoType'] = 4;
		$data['requestedUserType'] = 1;
		$data['results'] = true;
		if($resultType == 'view'){
			//Pagination
			$totalRows = $this->count['awards'];
			$perPage = 30;
			$uriSegment = 3;
			$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
			//Get data from model
			$data['info'] = $this->awards->filteredAwards($condition,$perPage,$page);
			$data['links'] = $this->doPagination('/filter/award/',$totalRows,$perPage,$uriSegment);
			$this->load->view('admin',$data);
		}else{
			show_error("Exporting");
			redirect('/filter/exportPublication');
		}
	}else{
		redirect('/home');
	}
}
public function achievement(){
	if($this ->currentUserType == 0){
		$condition['name'] = $this->input->post('name') !=null ? $this->input->post('name') : '' ;
		$condition['isIT'] = $this->input->post('IT') != null ? $this->input->post('IT') : '';
		$condition['isCSE'] = $this->input->post('CSE') != null ? $this->input->post('CSE') : '';
		$condition['isECE'] = $this->input->post('ECE') != null ? $this->input->post('ECE') : '';
		$condition['isMCA'] = $this->input->post('MCA') != null ? $this->input->post('MCA') : '';
		$condition['isFirst'] = $this->input->post('first') != null ? $this->input->post('first') : '';
		$condition['isSecond'] = $this->input->post('second') != null ? $this->input->post('second') : '';
		$condition['isThird'] = $this->input->post('third') != null ? $this->input->post('third') : '';
		$condition['isFourth'] = $this->input->post('fourth') != null ? $this->input->post('fourth') : '';
		$condition['startYear'] = $this->input->post('start_year') != null ? $this->input->post('start_year') : '2000';
		$condition['endYear'] = $this->input->post('end_year') != null ? $this->input->post('end_year') : date('Y');
		$this->filter = $condition;
		$resultType = $this->input->post('results') != null ? $this->input->post('results') : 'view';
		$this->load->model('achievements');
		$this->count = $this->achievements->getAllStudentAchievementCounts();
		$this->load->model('student');
		$data['noOfAchievements'] = $this->count['achievements'];
		$data['infoType'] = 1;
		$data['requestedUserType'] = 2;
		$data['results'] = true;
		if($resultType == 'view'){
			//Pagination
			$totalRows = $this->count['achievements'];
			$perPage = 30;
			$uriSegment = 3;
			$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
			//Get data from model
			$data['info'] = $this->student->filteredAchievements($condition,$perPage,$page);
			$data['links'] = $this->doPagination('/filter/achievement/',$totalRows,$perPage,$uriSegment);
			$this->load->view('admin',$data);
		}else{
			show_error("Exporting");
			redirect('/filter/exportPublication');
		}
	}else{
		redirect('/home');
	}
}
private function doPagination($baseUrl,$totalRows,$perPage,$uriSegment){
	$this->load->library('pagination');
	$config['base_url'] = base_url($baseUrl);
	$config['total_rows'] = $totalRows;
	$config['per_page'] = $perPage;
	$config['use_page_numbers'] = TRUE;
	$config['uri_segment'] = $uriSegment;
	$config['full_tag_open']='<div class="page-links">';
	$config['full_tag_close'] = '</div>';
	$config['cur_tag_open'] = '<button class="btn btn-primary active">';
	$config['cur_tag_close'] = '</button>';
	$config['attributes'] = array('class'=>'btn btn-default');
	$this->pagination->initialize($config);
	return $this->pagination->create_links();
}

}