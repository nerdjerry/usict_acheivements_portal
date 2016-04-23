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
	function getPublications($facultyId,$limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->where('faculty_id',$facultyId)
							->limit($limit,$offset)
							->order_by('year_of_pub','DESC')
							->get('publications');
		return $query->result_array();
	}
	function getAllStaffPublications($limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->select('name,designation,title,month_of_pub,year_of_pub,
			journal_name,coauthor_1,coauthor_2,coauthor_3,coauthor_4,presented_in,presented_at')
				->from('publications')
				->join('faculty','faculty.faculty_id = publications.faculty_id')
				->limit($limit,$offset)
				->order_by('year_of_pub','DESC')
				->get();
		return $query->result_array();
	}
}