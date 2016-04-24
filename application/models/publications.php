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
							->order_by('year_of_pub DESC,month_of_pub DESC')
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
				->order_by('year_of_pub DESC,month_of_pub DESC')
				->get();
		return $query->result_array();
	}
	function filteredPublications($condition){
		$designation = array($condition['isProfessor'],$condition['isAssociateProf'],$condition['isAssistantProf']);
		if($designation[0] == '' && $designation[1] == '' && $designation[2] == '')
			$designation = array('Professor','Associate Professor','Assistant Professor');
		$type = array($condition['isJournal'],$condition['isConference']);
		if($type[0] == '' && $type[1] == '' )
			$type = array('Journal','Conference');
		$region = array($condition['isNational'],$condition['isInternational']);
		if($region[0] == '' && $region[1] == '' )
			$region = array('National','International');
		$startYear = $condition['startDate'];
		$endYear = $condition['endDate'];
		$yearCondition = array('year_of_pub >=' => $startYear,'year_of_pub <= ' => $endYear);
		$query = $this->db->select('name,designation,title,month_of_pub,year_of_pub,
			journal_name,coauthor_1,coauthor_2,coauthor_3,coauthor_4,presented_in,presented_at')
							->from('publications')
							->join('faculty','faculty.faculty_id = publications.faculty_id')
							->like('name',$condition['name'])
							->where_in('designation',$designation)
							->like('title',$condition['title'])
							->where($yearCondition)
							->like('journal_name',$condition['journalName'])
							->where_in('presented_in',$type)
							->where_in('presented_at',$region)
							->order_by('year_of_pub DESC,month_of_pub DESC')
							->get();
		return $query->result_array();
	}
}