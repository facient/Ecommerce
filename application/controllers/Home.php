<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title']='My ECommerce';
		$data['mainContent']='admin/index';
		$this->load->view('admin/template/master',$data);
	}
}
