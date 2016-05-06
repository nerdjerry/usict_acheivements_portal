<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function isUserLoggedIn(){
	//If exists in session return
	if(isset($_SESSION['isLogged']) && $_SESSION['isLogged']){
		return true;
	}
	//Check for remember me
}