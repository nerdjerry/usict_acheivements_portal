<?php
class Authentication extends CI_Model {
	
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
	function setToken($userId,$token){
		$array = array(
			'user_id' => $userId,
			'token' => $token);
		return $this->db->insert('login',$array);
	}
	function matchToken($userId,$token){
		$query = $this->db->where('user_id',$userId)
							->where('token',md5($token))
							->from('login')
							->get();
		if($query->num_rows() == 1)
			return true;
		else
			return false;	
	}
	function getDetailsFromToken($userId){
		$query = $this->db->select('user_id,type')
						->where('user_id',$userId)
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
	function deleteToken($userId){
		$this->db->where('user_id',$userId)
				->delete('login');
	}
}
?>