<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function isUserLoggedIn(){
	//If exists in session return
	if(isset($_SESSION['isLogged']) && $_SESSION['isLogged']){
		return true;
	}else if(!is_null(get_cookie("token")) && !is_null(get_cookie("userId"))){
		$token = get_cookie("token");
		$userId	= get_cookie("userId");
		$CI = get_instance();
		$CI->load->model('authentication');
		$isAccessGranted = $CI->authentication->matchToken($userId,$token);
		if($isAccessGranted){
			//Now we need to save in session for the user
			//Get details about user to save in session from model based on user Id
			$user = $CI->authentication->getDetailsFromToken($userId);
			setSession($user);
		}
		return $isAccessGranted;
	}else{
		return false;
	}
}
function setSession($user){
	$sessionData = array(
			'user_id' => $user['user_id'],
			'userType' => intval($user['type']),
			'isLogged' => TRUE,
			'name' => $user['name'],
			'profilePic' => $user['profile_pic']
		);
	get_instance()->session->set_userdata($sessionData);
}