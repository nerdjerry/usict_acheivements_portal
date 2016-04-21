<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achievement extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$outputData = array();
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$achievements 				= $this->achievement_model->getUserAchievements();
		$achievements 				= $achievements->result_array();
		$outputData['achievements'] = $achievements;
		$outputData['user_name'] 	= get_user_name();
		if(get_user_type() == '2')
			$this->load->view('achievements_student',$outputData);
		else if(get_user_type() == '1')
			$this->load->view('achievements_staff',$outputData);
	}
	public function store()
	{
		$table_name		= '';
		$insertData 	= array();
		$form_type 		= $this->input->post('form_type');
		/*
			form_type = 1		=> New Seminar
			form_type = 2		=> New Project
			form_type = 3		=> New Award
			form_type = 4		=> New Publication
		*/
		if(isset($form_type) && !empty($form_type)){
			if($form_type == '4'){
				$table_name 					= 'publications';
				$insertData['faculty_id']		= $this->session->userdata('user_id');
				$insertData['title']			= $this->input->post('publication_title');
				$insertData['year_of_pub']		= $this->input->post('year_of_pub');
				$insertData['journal_name']		= $this->input->post('journal_name');
				$insertData['presented_in']		= $this->input->post('presented_in');
				$insertData['presented_at']		= $this->input->post('presented_at');

				$month_of_pub = $this->input->post('month_of_pub');
				if(isset($month_of_pub))
					$insertData['month_of_pub']			= $month_of_pub;
				else $insertData['month_of_pub']		= '';

				$coauthor_1 = $this->input->post('coauthor_1');
				if($coauthor_1)
					$insertData['coauthor_1'] = $coauthor_1;
				else $insertData['coauthor_1'] = '';

				$coauthor_2 = $this->input->post('coauthor_2');
				if(isset($coauthor_2))
					$insertData['coauthor_2'] = $coauthor_2;
				else $insertData['coauthor_2'] = '';

				$coauthor_3 = $this->input->post('coauthor_3');
				if(isset($coauthor_3))
					$insertData['coauthor_3'] = $coauthor_3;
				else $insertData['coauthor_3'] = '';

				$coauthor_4 = $this->input->post('coauthor_4');
				if(isset($coauthor_))
					$insertData['coauthor_4'] = $coauthor_4;
				else $insertData['coauthor_4'] = '';
			}
			$this->common_model->add($table_name,$insertData);
		}
		return redirect('/');
	}

	public function staff()
	{
		$achievements = $this->achievement_model->getAllAchievements('1');
		$achievements = $achievements->result_array();
		$outputData['user_name'] 	= get_user_name();
		$outputData['achievements'] = $achievements;
		$this->load->view('home',$outputData);
	}

	public function student()
	{
		$achievements = $this->achievement_model->getAllAchievements('2');
		$achievements = $achievements->result_array();
		$outputData['user_name'] 	= get_user_name();
		$outputData['achievements'] = $achievements;
		$this->load->view('home',$outputData);
	}

}
