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
		$query = $this->db->select('name,branch,student.year,details,achievements.year')
							->from('achievements')
							->join('student','student.student_id = achievements.user_id')
							->limit($limit,$offset)
							->order_by('achievements.year')
							->get();
		return $query->result_array();
	}
}