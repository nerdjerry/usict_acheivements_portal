<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function get_user_type(){
	return $_SESSION['userType'];
}

function get_user_name(){
	return $_SESSION['name'];
}
function get_user_id(){
	$CI = get_instance();
	return $_SESSION['user_id'];
}
function get_user_pic(){
	$pic = $_SESSION['profilePic'];
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