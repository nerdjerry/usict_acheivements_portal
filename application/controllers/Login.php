<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		if($this->session->userdata('user_id')){
			return redirect('/home');
		} else $this->load->view('login');
	}

	public function auth_login()
	{
		$email 			= $this->input->post('email');
		$password 		= $this->input->post('password');
		$remember_me 	= $this->input->post('remember');
		
		$this->load->helper('cookie');

		if($this->input->cookie('user_id'))
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
				if(isset($remember_me) && $remember_me!='' && $remember_me == 'true'){
					$this->input->set_cookie('user_id',$this->session->userdata('user_id'), mktime(). time()+60*60*24*365);
				} else {
					if($this->input->cookie('user_id'))
						$this->input->delete_cookie("user_id");
				}
				return redirect('/home');
			} else 
			{
				return redirect('/');
			}
		
		}	
	}
}
