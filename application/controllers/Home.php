<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	const ADMIN = 0;
	const FACULTY = 1;
	const STUDENT = 2;
	private $currentUserType;
	public function __construct(){
		parent::__construct();
		if(!isUserLoggedIn()) redirect('/login');
		$this->currentUserType = get_user_type();
	}
	public function index(){
		$user_type = get_user_type();
		//Redirect to admin view of achivement if user is admin
		if($user_type == '0'){
			redirect('/achievement/admin');
		}
		//Load Faculty View,by default option to add publications if user is faculty member
		else if($user_type == '1')
			redirect('/achievement');
		else if($user_type == '2')
			redirect('/achievement');
	}

	public function award(){
		$this->isAllowed();
		$this->load->view('award');
	}
	public function project(){
		$this->isAllowed();
		$this->load->view('project');
	}
	public function publication(){
		$this->isAllowed();
		$this->load->view('publication');
	}
	public function seminar(){
		$this->isAllowed();
		$this->load->view('seminar');	
	}
	public function achievement(){
		$this->load->view('achievements');
	}
	//To restrict direct access to function calls.Direct user to home if he is not authorized
	private function isAllowed(){
		if($this->currentUserType != self::FACULTY){
			redirect('/home');
		}
	}
}
