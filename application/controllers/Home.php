<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('common_helper');
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
			$user = $user->row();
			$outputData['user'] = $user;
			$user_type = get_user_type();
			if($user_type == '0')
				$this->load->view('home.tpl',$outputData);
			else if($user_type=='2')
				$this->load->view('new_student_acheivement.tpl',$outputData);
		} else {
			return redirect('/');
			//$message = 'Please '.'<a href ='.base_url().'><i>login</i></a> to View this Page';
			//show_error($message);
		}
	}

}
