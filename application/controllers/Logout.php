<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
	}
	
	function index()
	{
		$this->auth_model->clearSession();
		delete_cookie("user_id");
		$this->session->set_flashdata('logoutSuccess', 'Logout Successful');
		return redirect('/');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/admin/logout.php */
?>