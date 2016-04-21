<?php
class User_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function getUserDetails($conditions = array())
	{
		if(count($conditions)>0)
		{
			$this->db->where($conditions);
		}
		$this->db->select('users.user_id,users.email_id,users.type');
		$result = $this->db->get('users');
		if($result->num_rows()>0)
		{
			return $result;
		}
	}

	public function getFacultyDetails($conditions = array())
	{
		if(count($conditions)>0)
		{
			$this->db->where($conditions);
		}
		$this->db->select('faculty.faculty_id,faculty.name,faculty.designation,faculty.email,faculty.profile_pic');
		$result = $this->db->get('faculty');
		if($result->num_rows()>0)
		{
			return $result;
		}
	}
	public function getStudentDetails($conditions = array())
	{
		if(count($conditions)>0)
		{
			$this->db->where($conditions);
		}
		$this->db->select('student.student_id,student.name,student.branch,student.email,student.year,student.profile_pic');
		$result = $this->db->get('student');
		if($result->num_rows()>0)
		{
			return $result;
		}
	}
}
?>