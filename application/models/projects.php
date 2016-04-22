<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Projects extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	/* Returns the number of Projects done by user*/
	//TODO:Remove this function if not needed
	function getProjectNumber($facultyId){
		$query = $this->db->where('faculty_id',$facultyId)
							->get('projects');
		return $query->num_rows();
	}
	/*Returns an array containing details of projects made by the user*/
	function getProjects($facultyId,$limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->where('faculty_id',$facultyId)
							->limit($limit,$offset)
							->order_by('date','DESC')
							->get('projects');
		return $query->result_array();
	}
	function getAllStaffProjects(){
		$query = $this->db->select('name,designation,title,granting_agency,date,amount')
						->from('projects')
						->join('faculty','faculty.faculty_id = projects.faculty_id')
						->order_by('date','DESC')
						->get();
		return $query->result_array();
	}
}