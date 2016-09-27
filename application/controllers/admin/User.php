<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('ion_auth');
		

	}

	// List all your items
	public function index(  )
	{
		$this->load->view('welcome_message');
		
	}
	public function login($id)
	{
		
		echo "This is the login Page";

			
	}

	// Add a new item
	public function logout()
	{
		echo "this is logout Page";
	}
		
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */



