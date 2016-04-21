<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Awards extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	/* Returns the number of awards done by user*/
	//TODO:Remove this function if not needed
	function getAwardNumber($facultyId){
		$query = $this->db->where('faculty_id',$facultyId)
							->get('awards');
		return $query->num_rows();
	}
	/*Returns an array containing details of awards made by the user*/
	function getAwards($facultyId){
		$query = $this->db->where('faculty_id',$facultyId)->get('awards');
		return $query->result_array();
	}
}