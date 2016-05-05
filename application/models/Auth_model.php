<?php
class Auth_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function login($conditions=array())
	{
		if(count($conditions)>0)
		{
			$this->db->where($conditions);
		}
		$this->db->select('users.user_id');
		$result = $this->db->get('users');
		if($result->num_rows()>0)
		{
			return true;
		} else {
			return false;
		}
	}
	
	function setSession($conditions=array())
	{
		if(count($conditions)>0)
		{
			$this->db->where($conditions);
		}
		
		$this->db->select('users.user_id');
		$result = $this->db->get('users');
		
		if($result->num_rows()>0)
		{
			$row = $result->row();
			$values = array('user_id'=>$row->user_id);
			$this->session->set_userdata($values);
		}
	}
	function clearSession()
	{
		$array_items = array('user_id');
		$this->session->unset_userdata($array_items);
	}
}
?>