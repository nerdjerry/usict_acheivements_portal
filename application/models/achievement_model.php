<?php
class Achievement_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function newAchievement($user_type,$description)
	{
		$data = array('description'=>$description,'user_id'=>$this->session->userdata('user_id'));
		if(get_user_type() == '2')
			$result = $this->db->insert('achievements_students',$data);
		if($result){
			return true;
		} else {
			return false;
		}
	}

	public function getUserAchievements()
	{
		
		$this->db->select('achievements_students.description,achievements_students.created_at');
		$this->db->order_by("created_at","desc");
		$result = $this->db->get('achievements_students');
		if($result->num_rows()>0)
		{
			return $result;
		}
	}
}
?>