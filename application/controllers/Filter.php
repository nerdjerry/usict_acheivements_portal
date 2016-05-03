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
			if($resultType == 'view'){
				//Pagination
				$totalRows = $this->count['publications'];
				$perPage = 1;
				$uriSegment = 3;
				$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
				//Get data from model
				$data['info'] = $this->publications->filteredPublications($condition,$perPage,$page);
				$totalRows = $this->publications->filteredPublicationsCount($condition);
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
		$achievementType = 'seminar';
		//If form again submitted then take values from form not from session
		if($this->input->post('results') != null){
			unset($_SESSION[$achievementType]);
		}
		$condition['name'] = filterInput($achievementType,'name','name','');
		$condition['isProfessor'] = filterInput($achievementType,'professor','isProfessor','');
		$condition['isAssociateProf'] = filterInput($achievementType,'associate_professor','isAssociateProf','');
		$condition['isAssistantProf'] = filterInput($achievementType,'assistant_professor','isAssistantProf','');
		$condition['title'] = filterInput($achievementType,'title','title','');
		$condition['place'] = filterInput($achievementType,'place','place','');
		$condition['organiser'] = filterInput($achievementType,'organiser','organiser','');
		$condition['startDate'] = filterInput($achievementType,'start_date','startDate','2000-01-01');
		$condition['endDate'] = filterInput($achievementType,'end_date','endDate',date('Y-m-d'));
		$condition['isNational'] = filterInput($achievementType,'national','isNational','');
		$condition['isInternational'] = filterInput($achievementType,'international','isInternational','');
		$condition['isSeminar'] = filterInput($achievementType,'seminar','isSeminar','');
		$condition['isWorkshop'] = filterInput($achievementType,'workshop','isWorkshop','');
		$condition['isTraining'] = filterInput($achievementType,'training_program','isTraining','');
		$condition['isFDP'] = filterInput($achievementType,'fdp','isFDP','');
		$condition['isSymposium'] = filterInput($achievementType,'symposium','isSymposium','');
		$condition['isAttended'] = filterInput($achievementType,'attended','isAttended','');
		$condition['isOrganised'] = filterInput($achievementType,'organised','isOrganised','');;
		$condition['noOfParticipants'] = filterInput($achievementType,'no_of_participants','noOfParticipants',null);
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
		//Sava filter conditions in session so that they can be used in different pages of pagination
		$_SESSION[$achievementType] = $condition;
		$data['filter'] = $_SESSION[$achievementType];
		if($resultType == 'view'){
			//Pagination
			$totalRows = $this->count['seminars'];
			$perPage = 1;
			$uriSegment = 3;
			$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
			//Get data from model
			$data['info'] = $this->seminars->filteredSeminars($condition,$perPage,$page);
			$totalRows = $this->seminars->filteredSeminarsCount($condition);
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
		$achievementType = 'project';
		//If form again submitted then take values from form not from session
		if($this->input->post('results') != null){
			unset($_SESSION[$achievementType]);
		}
		$condition['name'] = filterInput($achievementType,'name','name','') ;
		$condition['isProfessor'] = filterInput($achievementType,'professor','isProfessor','');
		$condition['isAssociateProf'] = filterInput($achievementType,'associate_professor','isAssociateProf','');
		$condition['isAssistantProf'] = filterInput($achievementType,'assistant_professor','isAssistantProf','');
		$condition['title'] = filterInput($achievementType,'title','title','');
		$condition['grantingAgency'] = filterInput($achievementType,'granting_agency','grantingAgency',NULL);
		$condition['startDate'] = filterInput($achievementType,'start_date','startDate','2000-01-01');
		$condition['endDate'] = filterInput($achievementType,'end_date','endDate',date('Y-m-d'));
		$condition['amountStart'] = filterInput($achievementType,'amount_start','amountStart',NULL);
		$condition['amountEnd'] = filterInput($achievementType,'amount_end','amountEnd',NULL);
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
		//Sava filter conditions in session so that they can be used in different pages of pagination
		$_SESSION[$achievementType] = $condition;
		$data['filter'] = $_SESSION[$achievementType];
		if($resultType == 'view'){
			//Pagination
			$totalRows = $this->count['projects'];
			$perPage = 30;
			$uriSegment = 3;
			$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
			//Get data from model
			$data['info'] = $this->projects->filteredProjects($condition,$perPage,$page);
			$totalRows = $this->projects->filteredProjectsCount($condition);
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
		$achievementType = 'award';
		//If form again submitted then take values from form not from session
		if($this->input->post('results') != null){
			unset($_SESSION[$achievementType]);
		}
		$condition['name'] = filterInput($achievementType,'name','name','');
		$condition['isProfessor'] = filterInput($achievementType,'professor','isProfessor','');
		$condition['isAssociateProf'] = filterInput($achievementType,'associate_professor','isAssociateProf','');
		$condition['isAssistantProf'] = filterInput($achievementType,'assistant_professor','isAssistantProf','');
		$condition['startDate'] = filterInput($achievementType,'start_date','startDate','2000-01-01');
		$condition['endDate'] = filterInput($achievementType,'end_date','endDate',date('Y-m-d'));
		$condition['amountStart'] = filterInput($achievementType,'amount_start','amountStart',NULL);
		$condition['amountEnd'] = filterInput($achievementType,'amount_end','amountEnd',NULL);
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
		//Sava filter conditions in session so that they can be used in different pages of pagination
		$_SESSION[$achievementType] = $condition;
		$data['filter'] = $_SESSION[$achievementType];
		if($resultType == 'view'){
			//Pagination
			$totalRows = $this->count['awards'];
			$perPage = 30;
			$uriSegment = 3;
			$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
			//Get data from model
			$data['info'] = $this->awards->filteredAwards($condition,$perPage,$page);
			$totalRows = $this->awards->filteredAwardsCount($condition);
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
		$achievementType = 'award';
		//If form again submitted then take values from form not from session
		if($this->input->post('results') != null){
			unset($_SESSION[$achievementType]);
		}
		$condition['name'] = filterInput($achievementType,'name','name','') ;
		$condition['isIT'] = filterInput($achievementType,'IT','isIT','');
		$condition['isCSE'] = filterInput($achievementType,'CSE','isCSE','');
		$condition['isECE'] = filterInput($achievementType,'ECE','isECE','');
		$condition['isMCA'] = filterInput($achievementType,'MCA','isMCA','');
		$condition['isFirst'] = filterInput($achievementType,'first','isFirst','');
		$condition['isSecond'] = filterInput($achievementType,'second','isSecond','');
		$condition['isThird'] = filterInput($achievementType,'third','isThird','');
		$condition['isFourth'] = filterInput($achievementType,'fourth','isFourth','');
		$condition['startYear'] = filterInput($achievementType,'start_date','startDate',2000);
		$condition['endYear'] = filterInput($achievementType,'end_date','endDate',date('Y'));
		$this->filter = $condition;
		$resultType = $this->input->post('results') != null ? $this->input->post('results') : 'view';
		$this->load->model('achievements');
		$this->count = $this->achievements->getAllStudentAchievementCounts();
		$this->load->model('student');
		$data['noOfAchievements'] = $this->count['achievements'];
		$data['infoType'] = 1;
		$data['requestedUserType'] = 2;
		$data['results'] = true;
		//Sava filter conditions in session so that they can be used in different pages of pagination
		$_SESSION[$achievementType] = $condition;
		$data['filter'] = $_SESSION[$achievementType];
		if($resultType == 'view'){
			//Pagination
			$totalRows = $this->count['achievements'];
			$perPage = 30;
			$uriSegment = 3;
			$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
			//Get data from model
			$data['info'] = $this->student->filteredAchievements($condition,$perPage,$page);
			$totalRows = $this->student->filteredAchievementsCount($condition);
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