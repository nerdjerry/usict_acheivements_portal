<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if(!isUserLoggedIn()) redirect('/login');
		$this->load->helper('cookie');
	}
	
	function index(){
		$sessionDataKeys = array('user_id','userType','isLogged','name','profilePic');
		$this->session->unset_userdata($sessionDataKeys);
		$this->session->sess_destroy();
		//delete_cookie("user_id");
		$this->session->set_flashdata('logoutSuccess', 'Logout Successful');
		redirect('/');
	}
	
}
?>