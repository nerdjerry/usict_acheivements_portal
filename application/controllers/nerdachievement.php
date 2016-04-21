<?php
defined('BASEPATH') or exit('No direct script access allowed');

class nerdachievement extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$userType = get_user_type();
		if($userType==1){
			//User is a faculty member so 
			$this->staff();
		}
	}
	/*infoType index
		1 => Publication
		2 => Seminar
		3 => Projects
		4 => Awards
	*/
	public function staff($requestedDataType = 1){
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
		switch($infoType){
			case 1:
				$this->load->model('publications');
				$data['info'] = $this->publications->getPublications($facultyId);
				break;
			case 2:
				$this->load->model('seminars');
				$data['info'] = $this->seminars->getSeminars($facultyId);
				break;
			case 3:
				$this->load->model('projects');
				$data['info'] = $this->projects->getProjects($facultyId);
				break;
			case 4:
				$this->load->model('awards');
				$data['info'] = $this->awards->getAwards($facultyId,$userType);
				break;
		}
		$this->load->view('staffAchievements.php',$data);
	}
}