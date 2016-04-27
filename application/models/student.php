<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Student extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function store($data){
		$insertData = array('user_id' => $data['studentId'],
							'details' => $data['details']);
		 return $this->db->insert('achievements',$insertData);
	}
	function getAchievements($studentId,$limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->select('id,details')->where('user_id',$studentId)
					->limit($limit,$offset)
					->get('achievements');
		return $query->result_array();
	}

}