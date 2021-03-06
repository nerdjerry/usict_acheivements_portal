<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achievement extends CI_Controller {
	
	const ADMIN = 0;
	const FACULTY = 1;
	const STUDENT = 2;
	public function __construct(){
		parent::__construct();
		if(!isUserLoggedIn()) redirect('/login');
		$outputData = array();
		$this->load->helper('date');
	}

	public function index(){
		$userType = get_user_type();
		if($userType==1){
			//User is a faculty member so 
			$this->staff();
		}elseif ($userType==0) {
			//User is a admin member so show that view
			$this->admin();
		}elseif ($userType == 2){
			//User is a student member so show that view
			$this->student();
		}
	}
	public function store(){
		$currentUserType = get_user_type();
		if($this->input->post('form_type') == null || $currentUserType == self::ADMIN){
			show_error("Action not allowed!!",401);
		}
		$table_name		= '';
		$insertData 	= array();
		$form_type 		= $this->input->post('form_type');

		/*$form_type index
			1 => Publication
			2 => Seminar
			3 => Projects
			4 => Awards
		*/
			
		if(isset($form_type) && !empty($form_type)){
			if($form_type == '1'){
				$table_name 							= 'publications';
				$insertData['faculty_id']				= $this->session->userdata('user_id');
				$insertData['title']					= $this->input->post('publication_title');
				$insertData['year_of_pub']				= $this->input->post('year_of_pub');
				$insertData['journal_name']				= $this->input->post('journal_name');
				$insertData['presented_in']				= $this->input->post('presented_in');
				$insertData['presented_at']				= $this->input->post('presented_at');
				$insertData['comm_author']				= $this->input->post('comm_author');
				$insertData['first_author']				= $this->input->post('first_author');
				$month_of_pub 							= $this->input->post('month_of_pub');
				if(isset($month_of_pub))
					$insertData['month_of_pub']			= monthToNo($month_of_pub);
				else $insertData['month_of_pub']		= '';

				$coauthor_1 							= $this->input->post('coauthor_1');
				if($coauthor_1)
					$insertData['coauthor_1']			= $coauthor_1;
				else $insertData['coauthor_1'] 			= '';

				$coauthor_2 							= $this->input->post('coauthor_2');
				if(isset($coauthor_2))
					$insertData['coauthor_2'] 			= $coauthor_2;
				else $insertData['coauthor_2'] 			= '';

				$coauthor_3 							= $this->input->post('coauthor_3');
				if(isset($coauthor_3))
					$insertData['coauthor_3'] 			= $coauthor_3;
				else $insertData['coauthor_3']			= '';

				$coauthor_4 							= $this->input->post('coauthor_4');
				if(isset($coauthor_))
					$insertData['coauthor_4'] 			= $coauthor_4;
				else $insertData['coauthor_4']			= '';
			} else if($form_type == '2'){
				$table_name 							= 'seminars';
				$insertData['faculty_id']				= $this->session->userdata('user_id');
				$insertData['title']					= $this->input->post('seminar_title');
				$insertData['start_date']				= $this->input->post('start_date');
				$insertData['region']					= $this->input->post('region');
				$insertData['type']						= $this->input->post('seminar_type');
				$insertData['status']					= $this->input->post('status');

				$organiser 								= $this->input->post('seminar_organiser');
				$place 									= $this->input->post('seminar_place');
				$end_date 								= $this->input->post('end_date');
				$type 									= $this->input->post('seminar_type');
				$event_details 							= $this->input->post('event_details');
				$no_of_participants					= $this->input->post('no_of_participants');

				if(isset($organiser))
					$insertData['organiser']			= $organiser;
				else $insertData['organiser']			= '';

				if(isset($place))
					$insertData['place']				= $place;
				else $insertData['place']				= '';

				if(isset($end_date))
					$insertData['end_date']				= $end_date;
				else $insertData['end_date']			= '';

				if(isset($type))
					$insertData['type']					= $type;
				else $insertData['type']				= '';

				if(isset($event_details))
					$insertData['event_details']		= $event_details;
				else $insertData['event_details']		= '';

				if(isset($no_of_participants))
					$insertData['no_of_participant']	= $no_of_participants;
				else $insertData['no_of_participant']	= '';
			} else if($form_type == '3'){

				$table_name 							= 'projects';
				$insertData['faculty_id']				= $this->session->userdata('user_id');
				$insertData['title']					= $this->input->post('project_title');
				$insertData['date']						= $this->input->post('project_date');
				$amount 								= $this->input->post('project_amount');
				if(isset($amount))
					$insertData['amount']				= $amount;
				else $insertData['amount']				= '';

				$granting_agency 						= $this->input->post('granting_agency');
				if(isset($amount))
					$insertData['granting_agency']		= $granting_agency;
				else $insertData['granting_agency']		= '';
			} else if($form_type == '4'){
				$table_name 							= 'awards';
				$insertData['faculty_id']				= $this->session->userdata('user_id');
				$insertData['details']					= $this->input->post('award_details');
				$insertData['agency']					= $this->input->post('award_agency');
				$date 									= $this->input->post('award_date');
				if(isset($date))
					$insertData['date']					= $date;
				else $insertData['date']				= '';

				$amount 								=  $this->input->post('award_amount');
				if(isset($amount) && $amount != 0)
					$insertData['amount']				= $amount;
				else $insertData['amount']				= NULL;
			} 
			$this->common_model->add($table_name,$insertData);
		}
		$this->session->set_flashdata('insertionSuccess', ucfirst(substr($table_name,0,-1).' Added Successfully'));
		
		return redirect('achievement/staff/'.$form_type);
	}

	/*infoType index
		1 => Publication
		2 => Seminar
		3 => Projects
		4 => Awards
	*/
	/* Controller to display staff achievements*/
	public function staff($requestedDataType = 1){
		$currentUserType = get_user_type();
		if($currentUserType == self::FACULTY){
			$userType = 1;
			$facultyId = get_user_id();
			$infoType = $requestedDataType;
			//Loading required models
			$this->load->model('achievements');
			$count = $this->achievements->getStaffAchivementCounts($facultyId);
			$data['noOfPublications'] = $count['publications'];
			$data['noOfSeminars'] = $count['seminars'];
			$data['noOfProjects'] = $count['projects'];
			$data['noOfAwards'] = $count['awards'];
			$data['infoType'] = $infoType;
			$totalRows = 0;
			$perPage = 10;
			$uriSegment = 4;
			$page=$this->uri->segment(4) != null? $this->uri->segment(4) : 1;
			switch($infoType){
				case 1:
					$this->load->model('publications');
					$data['info'] = $this->publications->getPublications($facultyId,$perPage,$page);
					$totalRows = $count['publications'];
					break;
				case 2:
					$this->load->model('seminars');
					$data['info'] = $this->seminars->getSeminars($facultyId,$perPage,$page);
					$totalRows = $count['seminars'];
					break;
				case 3:
					$this->load->model('projects');
					$data['info'] = $this->projects->getProjects($facultyId,$perPage,$page);
					$totalRows = $count['projects'];
					break;
				case 4:
					$this->load->model('awards');
					$data['info'] = $this->awards->getAwards($facultyId,$userType,$perPage,$page);
					$totalRows = $count['awards'];
					break;
				default:
					redirect('achievement/staff/');
					break;
			}
			$data['links'] = $this->doPagination('/achievement/staff/'.$infoType,$totalRows,$perPage,$uriSegment);
			$this->load->view('staffAchievements',$data);
			}else{
				redirect('/home');
			}
	}
	/*
		paramas:
		$infoType = Type of information requested like publications,awards etc.
		Default value is 1 for publicaitons
		$dataClass = For what clas of user it is requested,like staff,student or tpc etc
		Default value is 1 for staff

		$dataClass = 1 => Staff Data
		$dataClass = 2 => Student Data

		For Staff data
			$infoType
				1 => Publications
				2 => Seminars/Workshops
				3 => Projects
				4 => Awards
		TODO:For Student Data,display and everything
			$infoType

	*/
	public function admin($dataClass=self::FACULTY,$infoType=1){
		$currentUserType = get_user_type();
		if($currentUserType == self::ADMIN){
			$requestedUserType = $dataClass;
			$requestedDataType = $infoType;
			$adminId = get_user_id();
			$data['requestedUserType'] = $requestedUserType;
			if($requestedUserType == self::FACULTY ){
				$this->load->model('achievements');
				$count = $this->achievements->getAllStaffAchievementCounts();
				$data['noOfPublications'] = $count['publications'];
				$data['noOfSeminars'] = $count['seminars'];
				$data['noOfProjects'] = $count['projects'];
				$data['noOfAwards'] = $count['awards'];
				$data['infoType'] = $requestedDataType;
				$totalRows = 0;
				$perPage = 30;
				$uriSegment = 5;
				$page=$this->uri->segment(5) != null? $this->uri->segment(5) : 1;
				switch($requestedDataType){
					case 1:
						$this->load->model('publications');
						$data['info'] = $this->publications->getAllStaffPublications($perPage,$page);
						$totalRows = $count['publications'];
						break;
					case 2:
						$this->load->model('seminars');
						$data['info'] = $this->seminars->getAllStaffSeminars($perPage,$page);
						$totalRows = $count['seminars'];
						break;
					case 3:
						$this->load->model('projects');
						$data['info'] = $this->projects->getAllStaffProjects($perPage,$page);
						$totalRows = $count['projects'];
						break;
					case 4:
						$this->load->model('awards');
						$data['info'] = $this->awards->getAllStaffAwards($perPage,$page);
						$totalRows = $count['awards'];
						break;
					default:
						redirect('achievement/admin/');
						break;
				}	
				$data['links'] = $this->doPagination('/achievement/admin/'.$requestedUserType.'/'.$requestedDataType,$totalRows,$perPage,$uriSegment);
				$this->load->view('admin',$data);
			}elseif($requestedUserType == self::STUDENT){
				$this->load->model('achievements');
				$count = $this->achievements->getAllStudentAchievementCounts();
				$data['noOfAchievements'] = $count['achievements'];
				$data['infoType'] = $requestedDataType;
				$totalRows = $count['achievements'];
				$perPage = 30;
				$uriSegment = 5;
				$page=$this->uri->segment(5) != null? $this->uri->segment(5) : 1;
				switch ($requestedDataType) {
					case 1:
						$this->load->model('student');
						$data['info'] = $this->student->getAllStudentAchievements($perPage,$page);
						break;
					
					default:
						redirect('achievement/admin/2');
						break;
				}
				$data['links'] = $this->doPagination('/achievement/admin/'.$requestedUserType.'/'.$requestedDataType,$totalRows,$perPage,$uriSegment);
				$this->load->view('admin',$data);
			}
		}
		else{
			redirect('/home');
		}
	}
	public function studentStore(){
		$currentUserType = get_user_type();
		if($currentUserType == self::ADMIN || $currentUserType == self::FACULTY){
			show_error("Action not allowed!!",401);
		}else{
			$data['details'] = $this->input->post('details');
			$data['studentId'] = get_user_id();
			$data['year'] = $this->input->post('year') != null ? $this->input->post('year'): date('Y') ;
			$this->load->model('student');
			$success = $this->student->store($data);
			if($success){
				$this->session->set_flashdata('insertStatus',$success);
				redirect('/achievement/student');
			}
			else{
				$this->session->set_flashdata('insertStatus',$success);
				redirect('/home');
			}
		}
	}

	public function student(){
		$currentUserType = get_user_type();
		$studentId = get_user_id();
		if($currentUserType == self::STUDENT){
			$this->load->model('achievements');
			$data['noOfAchievements'] = $this->achievements->getStudentAchievmentCounts($studentId);
			$this->load->model('student');
			//Pagination
			$totalRows = $data['noOfAchievements'];
			$perPage = 10;
			$uriSegment = 3;
			$page=$this->uri->segment(3) != null? $this->uri->segment(3) : 1;
			$data['infoType'] = 5;
			$data['info'] = $this->student->getAchievements($studentId,$perPage,$page);
			$data['links'] = $this->doPagination('/achievement/student/',$totalRows,$perPage,$uriSegment);
			$this->load->view('studentAchievements',$data);
		}else{
			redirect('/home');
		}
	}

	/**This is called when a achievement in staff has to be removed **/
	public function deleteAchievement($infoType,$id){
		$currentUserType = get_user_type();
		if(!isset($infoType)||!isset($id)||$currentUserType == self::ADMIN){
			show_error("Action not allowed!!!",401);
		}
		switch ($infoType) {
			case 1:
				$status = $this->common_model->delete('publications',$id);
				break;
			case 2:
				$status = $this->common_model->delete('seminars',$id);
				break;
			case 3:
				$status = $this->common_model->delete('projects',$id);
				break;
			case 4:
				$status = $this->common_model->delete('awards',$id);
				break;
			case 5:
				$status = $this->common_model->delete('achievements',$id);
				$this->session->set_flashdata('deleteStatus',$status);
				redirect('achievement/student');
				break;
		}
		$this->session->set_flashdata('deleteStatus',$status);
		redirect('/achievement/staff/'.$infoType);
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
