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
	/*
		table_name : name of the table from which you want to delete
		$conditions : an array that consists of key value pairs. key represents the column name in the table.
					multiple conditions can be passed(therefore array).

		eg: conditions['name'] = 'USIT'
			$table_name = 'Colleges'
		this would delete all rows in colleges table where name='USIT'
	*/
	function delete($table_name, $id) {
		$status = $this->db->where('id',$id)
							->delete($table_name); 
		if(!$status)
			return false;
		else
			return true;
	}
}
?>