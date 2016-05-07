<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if(!isUserLoggedIn()) redirect('/login');
		$this->load->model('authentication');
	}
	
	function index(){
		$sessionDataKeys = array('user_id','userType','isLogged','name','profilePic');
		$this->session->unset_userdata($sessionDataKeys);
		$this->session->sess_destroy();
		$userId = get_cookie("userId");
		$token = get_cookie("token");
		//Not null means cookie exist which means user checked remember me so delete
		//token from database and cookie.
		if(!is_null($userId) && !is_null($token)){
			$this->authentication->deleteToken($userId,$token);
			delete_cookie("userId");
			delete_cookie("token");
		}
		$this->session->set_flashdata('logoutSuccess', 'Logout Successful');
		redirect('/');
	}
	
}
?>