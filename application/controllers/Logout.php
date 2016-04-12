<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('auth_model');
	}
	
	function index()
	{
		$this->auth_model->clearSession();	
		return redirect('/');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/admin/logout.php */
?>