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
}
?>