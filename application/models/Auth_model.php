<?php
class Auth_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function login($email,$password){
		$query = $this->db->select('user_id,type')
						->where('email_id',$email)
						->where('password',$password)
						->from('users')
						->get();
		$result = $query->row_array();
		if($result['type'] == 1){
			$user = $this->getUserDetails('faculty',$result);
		}else if($result['type'] == 2){
			$user = $this->getUserDetails('student',$result);
		}else{
			$user = array(
				'name' => 'Admin',
				'profile_pic' => NULL);
		}
		return array_merge($result,$user);
	}
	private function getUserDetails($userType,$result){
		$query = $this->db->select('name,profile_pic')
						->where($userType.'_id',$result['user_id'])
						->from($userType)
						->get();
		return $query->row_array();
	}
}
?>