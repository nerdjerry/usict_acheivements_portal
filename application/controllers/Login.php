<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		
		$this->load->model('auth_model');
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
		if($this->session->userdata('user_id')){
			return redirect('/home');
		} else $this->load->view('login.tpl');
	}

	public function auth_login()
	{
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');
		$this->load->helper('cookie');
		if($this->input->cookie('user_id', TRUE))
		{
			if($this->auth_model->login(array('users.user_id'=>$this->input->cookie('user_id'))))
			{
				return redirect('/home');
			}
		}
		if(isset($email) && !empty($email))
		{
			$conditions = array('email_id'=>$email,'password'=>$password);
			if($this->auth_model->login($conditions))
			{ 
				$this->auth_model->setSession($conditions);
				return redirect('/home');
			} else 
			{
				return redirect('/');
			}
		
		}	
	}
}
