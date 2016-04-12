<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function get_user_type(){
	$CI = get_instance();
	$user = $CI->user_model->getUserDetails(array('user_id'=>$CI->session->userdata('user_id')));
	if(isset($user) && !empty($user))
	{
		$user = $user->row();
		$type = $user->type;
		return $type;
	}
}

function get_user_name(){
	$CI = get_instance();
	$user = $CI->user_model->getUserDetails(array('user_id'=>$CI->session->userdata('user_id')));
	if(isset($user) && !empty($user))
	{
		$user = $user->row();
		$name = $user->name;
		return $name;
	}
}