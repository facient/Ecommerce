<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parentmenu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Parentmenu_model','parentmenu');

	}

	// List all your items
	public function index(  )
	{
		$data['parentmenus']=$this->parentmenu->view_all();
		$data['title']='ECommerce | Parentmenu';
		$data['mainContent']='admin/parentmenu/index';
		$this->load->view('admin/template/master',$data);
	}

	// Add a new item
	public function add()
	{	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(
					'name' => $this->input->post('inputName'), 
					'contact_person' => $this->input->post('inputContactPerson'), 
					'landline_no' =>  $this->input->post('inputLandlineNumber'), 
					'mobile_no' =>  $this->input->post('inputMobileNumber'), 
					'email' =>  $this->input->post('inputEmail'), 
					'gst_no' =>  $this->input->post('inputGST'), 
					'ntn_no' => $this->input->post('inputNTN'), 
					'initial_balance' =>  $this->input->post('inputIntBal'), 
					'status' => 'active', 
					'user_id' =>  $this->input->post('inputUser'), 
					'parentmenu_id' => $this->input->post('inputparentmenu'), 
					'group_id' =>  $this->input->post('inputGroup'), 
					'created_at' =>  date('y')
				);

				$this->session->set_flashdata('success','Record has been added successfully.');

				$this->parentmenu->create($options);
				redirect('/admin/parentmenu','refresh');
			 
		}
		$data['title']=' ECommerce | Add Parentmenu';
		$data['mainContent']='admin/parentmenu/add';
		$this->load->view('admin/template/master',$data);
	}

	//Update one item
	public function edit( $id)
	{	

		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(

					'name' => $this->input->post('inputName'), 
					'contact_person' => $this->input->post('inputContactPerson'), 
					'landline_no' =>  $this->input->post('inputLandlineNumber'), 
					'mobile_no' =>  $this->input->post('inputMobileNumber'), 
					'email' =>  $this->input->post('inputEmail'), 
					'gst_no' =>  $this->input->post('inputGST'), 
					'ntn_no' => $this->input->post('inputNTN'), 
					'initial_balance' =>  $this->input->post('inputIntBal'), 
					'status' => 'active', 
					'user_id' =>  $this->input->post('inputUser'), 
					'parentmenu_id' => $this->input->post('inputparentmenu'), 
					'group_id' =>  $this->input->post('inputGroup'), 
					'created_at' =>  date('y')
				);


				$affected=$this->parentmenu->update($id,$options);
				if ($affected) {
					$this->session->set_flashdata('success','Record has been Updated successfully.');
					redirect('/admin/parentmenu','refresh');
				}
			 
		}
		$data['parentmenus']=$this->parentmenu->edit($id);

		$data['title']='ECommerce | Edit parentmenu';
		$data['mainContent']='admin/parentmenu/edit';
		$this->load->view('admin/template/master',$data);
	}

	//Delete one item
	public function delete($id)
	{
		$affected = $this->parentmenu->delete($id);
		if ($affected)
		{

			echo 1;
			//redirect('/admin/category','refresh');
		}

}
}

/* End of file parentmenu.php */
/* Location: ./application/controllers/admin/parentmenu/parentmenu.php */



