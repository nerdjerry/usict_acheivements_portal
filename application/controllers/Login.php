<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('authentication');
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
		$user = $this->authentication->login($email,$password);
		if($user!=NULL){
			$this->setSession($user);
			//Remember me functionality
			if($isRemember == 'true'){
				//Generate a token
				$token = mt_rand();
				//Save token and user Id in database
				$this->authentication->setToken($user['user_id'],md5($token));
				//Set cookie for token and userId to be used for login
				set_cookie("token",$token,30*24*60*60);
				set_cookie("userId",$user['user_id'],30*24*60*60);
			}
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
}
