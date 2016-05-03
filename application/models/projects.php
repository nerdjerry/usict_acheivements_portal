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
	function getAllStaffProjects($limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->select('name,designation,title,granting_agency,date,amount')
						->from('projects')
						->join('faculty','faculty.faculty_id = projects.faculty_id')
						->limit($limit,$offset)
						->order_by('date','DESC')
						->get();
		return $query->result_array();
	}
	function filteredProjects($condition,$limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$innerQuery = $this->filter($condition);
		$query = $innerQuery->limit($limit,$offset)
							->get();
		return $query->result_array();
	}
	private function filter($condition){
		$designation = array($condition['isProfessor'],$condition['isAssociateProf'],$condition['isAssistantProf']);
		if($designation[0] == '' && $designation[1] == '' && $designation[2] == '')
			$designation = array('Professor','Associate Professor','Assistant Professor');
		$startDate = $condition['startDate'];
		$endDate = $condition['endDate'];
		$dateCondition = array('date >=' => $startDate,'date <= ' => $endDate);
		$grantingAgencyCondition = is_null($condition['grantingAgency']) ? 
							"(granting_agency IS NULL OR granting_agency LIKE'%%')" : "granting_agency LIKE '%".$condition['grantingAgency']."%'";
		$amountCondition = is_null($condition['amountStart']) || is_null($condition['amountEnd'])
					 ? '(amount IS NULL OR amount>=0)' : 'amount>='.$condition['startAmount'].'AND amount<='.$condition['endAmount'];
		$query = $this->db->select('name,designation,title,granting_agency,date,amount')
							->from('projects')
							->join('faculty','faculty.faculty_id = projects.faculty_id')
							->like('name',$condition['name'])
							->where_in('designation',$designation)
							->like('title',$condition['title'])
							->where($dateCondition)
							->where($grantingAgencyCondition,NULL,FALSE)
							->where($amountCondition,NULL,FALSE)
							->order_by('date', 'DESC');
		return $query;
	}
	function filteredProjectsCount($condition){
		$innerQuery = $this->filter($condition);
		$query = $innerQuery->get();
		return $query->num_rows();
	}
}