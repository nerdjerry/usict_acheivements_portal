<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

function monthToNo($month){
	if($month == 'January')
		return 1;
	elseif($month == 'Febraury')
		return 2;
	elseif($month == 'March')
		return 3;
	elseif($month == 'April')
		return 4;
	elseif($month == 'May')
		return 5;
	elseif($month == 'June')
		return 6;
	elseif($month == 'July')
		return 7;
	elseif($month == 'August')
		return 8;
	elseif($month == 'September')
		return 9;
	elseif($month == 'October')
		return 10;
	elseif($month == 'November')
		return 11;
	elseif($month == 'December')
		return 12;
}

function noToMonth($monthNumber){
	switch($monthNumber){
		case 1:
			return "January";
		case 2:
			return "February";
		case 3:
			return "March";
		case 4:
			return "April";
		case 5:
			return "May";
		case 6:
			return "June";
		case 7:
			return "July";
		case 8:
			return "August";
		case 9:
			return "September";
		case 10:
			return "October";
		case 11:
			return "November";
		case 12:
			return "Decemeber";
	}
}
function splitDate($date){
	$explodedDate = explode('/',$date);
	$month = array_slice($explodedDate, 0,1);
	$year = array_slice($explodedDate, 2,1);
	$monthAndYear = array($month,$year);
	return $monthAndYear;
}
?>