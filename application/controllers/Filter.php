<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Filter extends CI_COntroller{

	private $currentUseType;
	public function __construct(){
		parent::__construct();
		$this->currentUserType = get_user_type();
	}

	public function publication(){
		$condition['name'] = $this->input->post('name') !=null ? $this->input->post('name') : '' ;
		$condition['isProfessor'] = $this->input->post('professor') != null ? $this->input->post('professor') : '';
		$condition['isAssociateProf'] = $this->input->post('associate_professor') != null ? $this->input->post('associate_professor') : '';
		$condition['isAssistantProf'] = $this->input->post('assistant_professor') != null ? $this->input->post('assistant_professor') : '';
		$condition['title'] = $this->input->post('title') != null ? $this->input->post('title') : '';
		$condition['startDate'] = $this->input->post('start_date') != null ? $this->input->post('start_date') : 2000;
		$condition['endDate'] = $this->input->post('end_date') != null ? $this->input->post('end_date') : date('Y');
		$condition['journalName'] = $this->input->post('journal_name') != null ?$this->input->post('journal_name') : '' ;
		$condition['isJournal'] = $this->input->post('journal') != null ? $this->input->post('journal') : '';
		$condition['isConference'] = $this->input->post('conference') != null ? $this->input->post('conference') : '';
		$condition['isNational'] = $this->input->post('national') != null ? $this->input->post('national'): '';
		$condition['isInternational'] = $this->input->post('international') != null ?$this->input->post('international')  : '';
		$this->load->model('publications');
		$data['info'] = $this->publications->filteredPublications($condition);
		$this->load->model('achievements');
		$count = $this->achievements->getAllStaffAchievementCounts();
		$data['noOfPublications'] = $count['publications'];
		$data['noOfSeminars'] = $count['seminars'];
		$data['noOfProjects'] = $count['projects'];
		$data['noOfAwards'] = $count['awards'];
		$data['infoType'] = 1;
		$data['requestedUserType'] = 1;
		$data['results'] = true;
		$data['links'] = '';
		$this->load->view('admin',$data);
	}
}