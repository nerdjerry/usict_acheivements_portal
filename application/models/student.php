<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Student extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function store($data){
		$insertData = array('user_id' => $data['studentId'],
							'details' => $data['details'],
							'year' => $data['year']);
		 return $this->db->insert('achievements',$insertData);
	}
	function getAchievements($studentId,$limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->select('id,details,year')->where('user_id',$studentId)
					->limit($limit,$offset)
					->order_by('year','DESC')
					->get('achievements');
		return $query->result_array();
	}
	function getAllStudentAchievements($limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->select('name,branch,student.year as studentYear,details,achievements.year')
							->from('achievements')
							->join('student','student.student_id = achievements.user_id')
							->limit($limit,$offset)
							->order_by('achievements.year','DESC')
							->get();
		return $query->result_array();
	}
	function filteredAchievements($condition,$limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$innerQuery = $this->filter($condition);
		$query = $innerQuery->limit($limit,$offset)
							->get();
		return $query->result_array();
	}
	private function filter($condition){
		$branch = array($condition['isIT'],$condition['isCSE'],$condition['isECE'],$condition['isMCA']);
		if($branch[0] == '' && $branch[1] == '' && $branch[2] == '' && $branch[3] == '')
			$branch = array('IT','CSE','ECE','MCA');
		$studentYear = array($condition['isFirst'],$condition['isSecond'],$condition['isThird'],$condition['isFourth']);
		if($studentYear[0] == '' && $studentYear[1] == '' && $studentYear[2] == '' && $studentYear[3] == '')
			$studentYear = array('1','2','3','4');
		$startYear = $condition['startYear'];
		$endYear = $condition['endYear'];
		$dateCondition = array('achievements.year >=' => $startYear,'achievements.year <= ' => $endYear);
		$query = $this->db->select('name,branch,student.year as studentYear,details,achievements.year')
							->from('achievements')
							->join('student','student.student_id = achievements.user_id')
							->like('name',$condition['name'])
							->where_in('branch',$branch)
							->where_in('student.year',$studentYear)
							->where($dateCondition)
							->order_by('achievements.year', 'DESC');
		return $query;
	}
	function filteredStudentsCount($condition){
		$innerQuery = $this->filter($condition);
		$query = $innerQuery->get();
		return $query->num_rows();
	}
}