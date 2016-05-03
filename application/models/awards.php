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
	function filteredAwards($condition,$limit,$pageNo){
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
		$amountCondition = is_null($condition['amountStart']) || is_null($condition['amountEnd'])
					 ? '(amount IS NULL OR amount>=0)' : 'amount>='.$condition['startAmount'].'AND amount<='.$condition['endAmount'];
		$query = $this->db->select('name,designation,details,date,amount')
							->from('awards')
							->join('faculty','faculty.faculty_id = awards.faculty_id')
							->like('name',$condition['name'])
							->where_in('designation',$designation)
							->where($dateCondition)
							->where($amountCondition,NULL,FALSE)
							->order_by('date', 'DESC');
		return $query;
	}
	function filteredAwardsCount($condition){
		$innerQuery = $this->filter($condition);
		$query = $innerQuery->get();
		return $query->num_rows();
	}
}