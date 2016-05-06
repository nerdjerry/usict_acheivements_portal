<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('auth_model');
	}
	public function index(){
		//Check already logged in or not
		if(isUserLoggedIn()){
			redirect('/home');
		}else{
			$this->load->view('login');
		}	
	}

	public function auth_login(){
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$isRemember = $this->input->post('remember');
		$user = $this->auth_model->login($email,$password);
		if($user!=NULL){
			$this->setSession($user);
			//Make rememeber me work
			redirect('/home');
		}else{
			$this->session->set_flashdata('loginError', 'Invalid Credentials');
			redirect('/');
		}
	}

	private function setSession($user){
		$sessionData = array(
				'user_id' => $user['user_id'],
				'userType' => intval($user['type']),
				'isLogged' => TRUE,
				'name' => $user['name'],
				'profilePic' => $user['profile_pic']
			);
		$this->session->set_userdata($sessionData);
	}
	/*public function auth_login1(){
		$email 			= $this->input->post('email');
		$password 		= md5($this->input->post('password'));
		$remember_me 	= $this->input->post('remember');
		
		$this->load->helper('cookie');

		if($this->input->cookie('user_id'))
		{	
			if($this->auth_model->login(array('users.user_id'=>$this->input->cookie('user_id'))))
			{
				$conditions = array('email_id'=>$email,'password'=>$password);
				$this->auth_model->setSession($conditions);
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
				
			}
		
		}	
	}*/
}
