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
		else if(get_user_type() == '1')
			$result = $this->db->insert('achievements_staff',$data);
		if($result){
			return true;
		} else {
			return false;
		}
	}

	public function getUserAchievements()
	{
		if(get_user_type() == '2'){
			$this->db->select('achievements_students.description,achievements_students.created_at');
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$this->db->order_by("created_at","desc");
			$result = $this->db->get('achievements_students');
		}
		else if(get_user_type() == '1'){
			$this->db->select('achievements_staff.description,achievements_staff.created_at');
			$this->db->order_by("created_at","desc");
			$result = $this->db->get('achievements_staff');
		}

		if($result->num_rows()>0)
		{
			return $result;
		}
	}

	public function getAllAchievements($user_type)
	{
		if($user_type == '2'){
			$this->db->select('achievements_students.description,achievements_students.created_at');
			$this->db->order_by("created_at","desc");
			$result = $this->db->get('achievements_students');
		}
		else if($user_type == '1'){
			$this->db->select('achievements_staff.description,achievements_staff.created_at');
			$this->db->order_by("created_at","desc");
			$result = $this->db->get('achievements_staff');
		}

		if($result->num_rows()>0)
		{
			return $result;
		}
	}
}
?>