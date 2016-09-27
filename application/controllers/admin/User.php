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
		
		$this->data['message'] = 'here will be the login form';
        $this->render('user/login_view');

			
	}

	// Add a new item
	public function logout()
	{
		echo "this is logout Page";
	}
		
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */



