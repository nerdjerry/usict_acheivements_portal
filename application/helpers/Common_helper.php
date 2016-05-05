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
function get_user_pic(){
	$CI = get_instance();
	$type = get_user_type();
	if($type == '1'){
		$faculty = $CI->user_model->getFacultyDetails(array('faculty_id'=>get_user_id()));
		if(isset($faculty) && !empty($faculty)){
			$faculty = $faculty->row();
			$pic = $faculty->profile_pic;
		}
	} else if($type == '2'){
		$student = $CI->user_model->getStudentDetails(array('student_id'=>get_user_id()));
		if(isset($student) && !empty($student)){
			$student = $student->row();
			$pic = $student->profile_pic;
		}
	}
	if(isset($pic))
		return $pic;
	else
		return "photos/default.jpg";
}
function format_student_year($year){
	switch ($year) {
		case 1:
			return "1<sup>st</sup>";
			break;
		case 2:
			return "2<sup>nd</sup>";
			break;
		case 3:
			return "3<sup>rd</sup>";
			break;
		case 4:
			return "4<sup>th</sup>";
			break;
		
		default:
			return "Error";
			break;
	}
}
/*If form values set then return those,is filter fields saved in session then return thode
else return the default value */
function filterInput($achivementType,$formField,$sessionField,$default){
	$fieldFromForm = get_instance()->input->post($formField);
	if($fieldFromForm != null){
		return $fieldFromForm;
	}elseif(isset($_SESSION[$achivementType][$sessionField])){
		return $_SESSION[$achivementType][$sessionField];
	}else{
		return $default;
	}
}
/*Format amount to display as indian comma seperated format*/
function formattedMoney($amount){
	return number_format($amount);
}