<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Publications extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	/* Returns the number of publications done by user*/
	//TODO:Remove this function if not needed
	function getPublicationNumber($facultyId){
		$query = $this->db->where('faculty_id',$facultyId)
							->get('publications');
		return $query->num_rows();
	}
	/*Returns an array containing details of publicaitons made by the user*/
	function getPublications($facultyId){
		$query = $this->db->where('faculty_id',$facultyId)->get('publications');
		return $query->result_array();
	}
}