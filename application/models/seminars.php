<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Seminars extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	/* Returns the number of seminars done by user*/
	//TODO:Remove this function if not needed
	function getSeminarNumber($facultyId){
		$query = $this->db->where('faculty_id',$facultyId)
							->get('seminars');
		return $query->num_rows();
	}
	/*Returns an array containing details of publicaitons made by the user*/
	function getSeminars($facultyId){
		$query = $this->db->where('faculty_id',$facultyId)
							->order_by('start_date','DESC')
							->get('seminars');
		return $query->result_array();
	}
}