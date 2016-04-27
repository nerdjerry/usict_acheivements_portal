<?php
class Achievements extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function getStaffAchivementCounts($facultyId){
		$query = $this->db->where('faculty_id',$facultyId)->get('publications');
		$count['publications'] = $query->num_rows();
		$query = $this->db->where('faculty_id',$facultyId)->get('seminars');
		$count['seminars'] = $query->num_rows();
		$query = $this->db->where('faculty_id',$facultyId)->get('projects');
		$count['projects'] = $query->num_rows();
		$query = $this->db->where('faculty_id',$facultyId)->get('awards');
		$count['awards'] = $query->num_rows();
		return $count;
	}
	public function getAllStaffAchievementCounts(){
		$query = $this->db->get('publications');
		$count['publications'] = $query->num_rows();
		$query = $this->db->get('seminars');
		$count['seminars'] = $query->num_rows();
		$query = $this->db->get('projects');
		$count['projects'] = $query->num_rows();
		$query = $this->db->get('awards');
		$count['awards'] = $query->num_rows();
		return $count;
	}
	public function getStudentAchievmentCounts($studentId){
		$query = $this->db->where('user_id',$studentId)->get('achievements');
		return $query->num_rows();
	}
}
?>