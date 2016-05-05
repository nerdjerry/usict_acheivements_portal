<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');





// ------------------------------------------------------------------------



/**

 * Check Whether the user is an admin

 *

 * Create a admin URL based on the admin folder path mentioned in config file. Segments can be passed via the

 * first parameter either as a string or an array.

 *

 * @access	public

 * @param	string

 * @return	string

 */

// ------------------------------------------------------------------------



/**

 * Check Whether the user is an admin

 *

 * Create a admin URL based on the admin folder path mentioned in config file. Segments can be passed via the

 * first parameter either as a string or an array.

 *

 * @access	public

 * @param	string

 * @return	string

 */

	function isUser()
	{
		$CI 	=& get_instance();
		return  $CI->session->userdata('role') == 'user'?TRUE:FALSE;
	}



// ------------------------------------------------------------------------


/**

 * Check Whether the user is logged in

 *

 * Create a admin URL based on the admin folder path mentioned in config file. Segments can be passed via the

 * first parameter either as a string or an array.

 *

 * @access	public

 * @param	string

 * @return	string

 */

	function isLoggedIn()

	{

		$CI 	=& get_instance();

		return  $CI->session->userdata('logged_in') == '1'?TRUE:FALSE;

	}
	
	function isStore()

	{

		$CI 	=& get_instance();

		return  $CI->session->userdata('store_id') == '1'?TRUE:FALSE;

	}

	

	



/* End of file MY_url_helper.php */

/* Location: ./aaramshop/helpers/MY_url_helper.php */