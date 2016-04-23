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
	//TODO:Get Awards for students too
	function getAwards($facultyId,$userType,$limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->where('faculty_id',$facultyId)
							->limit($limit,$offset)
							->order_by('date','DESC')
							->get('awards');
		return $query->result_array();
	}
	function getAllStaffAwards($limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->select('name,designation,details,date,amount')
						->from('awards')
						->join('faculty','faculty.faculty_id = awards.faculty_id')
						->limit($limit,$offset)
						->order_by('date','DESC')
						->get();
		return $query->result_array();
	}
}