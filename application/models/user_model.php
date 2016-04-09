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
		$this->db->select('users.user_id,users.email_id,users.name,users.type');
		$result = $this->db->get('users');
		if($result->num_rows()>0)
		{
			return $result;
		}
	}
}
?>