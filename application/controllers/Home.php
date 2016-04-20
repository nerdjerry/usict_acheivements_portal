<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
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
	public function index()
	{
		$user = $this->user_model->getUserDetails(array('user_id'=>$this->session->userdata('user_id')));
		if(isset($user) && !empty($user))
		{
			$outputData = array();
			$outputData['user_name'] = get_user_name();
			$user = $user->row();
			$user_type = get_user_type();
			if($user_type == '0'){
				$achievements 				= $this->achievement_model->getAllAchievements('1');
				$achievements 				= $achievements->result_array();
				$outputData['achievements'] = $achievements;
				$this->load->view('home.tpl',$outputData);
			}
			else if($user_type == '1')
				$this->load->view('publication.tpl');
			else if($user_type=='2')
				$this->load->view('new_student_acheivement.tpl',$outputData);
		} else {
			return redirect('/');
			//$message = 'Please '.'<a href ='.base_url().'><i>login</i></a> to View this Page';
			//show_error($message);
		}
	}

	public function award()
	{
		$this->load->view('award.tpl');
	}
	public function project()
	{
		$this->load->view('project.tpl');
	}
	public function publication()
	{
		$this->load->view('publication.tpl');
	}
	public function seminar()
	{
		$this->load->view('seminar.tpl');	
	}
}
