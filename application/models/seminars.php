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
	function getAllStaffSeminars(){
		$query = $this->db->select('name,designation,title,organiser,
			place,start_date,end_date,region,type,event_details,status,
			no_of_participant')
						->from('seminars')
						->join('faculty','faculty.faculty_id = seminars.faculty_id')
						->order_by('start_date','DESC')
						->get();
		return $query->result_array();
	}
}