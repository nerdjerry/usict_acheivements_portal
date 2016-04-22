<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('user_id')) header('location:'.base_url('login'));
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
			//Redirect to admin view of achivement if user is admin
			if($user_type == '0'){
				redirect('/achievement/admin');
			}
			//Load Faculty View,by default option to add publications if user is faculty member
			else if($user_type == '1')
				$this->load->view('publication');
			else if($user_type=='2')
				$this->load->view('new_student_acheivement',$outputData);
		} else {
			return redirect('/');
			//$message = 'Please '.'<a href ='.base_url().'><i>login</i></a> to View this Page';
			//show_error($message);
		}
	}

	public function award()
	{
		$this->load->view('award');
	}
	public function project()
	{
		$this->load->view('project');
	}
	public function publication()
	{
		$this->load->view('publication');
	}
	public function seminar()
	{
		$this->load->view('seminar');	
	}
}
