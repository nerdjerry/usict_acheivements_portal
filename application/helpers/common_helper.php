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
	$type = get_user_type();
	if($type == '1'){
		$faculty = $CI->user_model->getFacultyDetails(array('faculty_id'=>get_user_id()));
		if(isset($faculty) && !empty($faculty)){
			$faculty = $faculty->row();
			$name = $faculty->name;
			return $name;
		}
	} else if($type == '2'){
		$student = $CI->user_model->getStudentDetails(array('student_id'=>get_user_id()));
		if(isset($student) && !empty($student)){
			$student = $student->row();
			$name = $student->name;
			return $name;
		}
	}
}
function get_user_id(){
	$CI = get_instance();
	return $CI->session->userdata('user_id');
}


