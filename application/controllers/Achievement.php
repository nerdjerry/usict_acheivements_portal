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
		$description = $this->input->post('achievement_description');
		$user_type = get_user_type();
		if($this->achievement_model->newAchievement($user_type,$description)){
			return redirect('/achievement');
		}
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
