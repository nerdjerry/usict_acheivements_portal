<?php
class Common_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	function add($table_name, $insertData=array()) {
		$result = $this->db->insert($table_name,$insertData);
		return $result;
	}
}
?>