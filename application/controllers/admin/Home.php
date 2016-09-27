<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		
		/*$this->load->model('Customer_model','customer');*/

	}

	// List all your items
	public function index(  )
	{
		//$data['customers']=$this->customer->view_all();
		$data['title']='ECommerce | Home';
		$data['mainContent']='admin/home/index';
		$this->load->view('admin/template/master1',$data);
		
	}
	public function view_by($id)
	{
		
		$data['cust_by']=$this->customer->view_by($id);

		echo json_encode($data['cust_by']);

			
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
					'status' => 'Active', 
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001,
					'created_at' =>  date('y')
				);

				$this->session->set_flashdata('success','Record has been added successfully.');

				$this->customer->create($options);
				redirect('/admin/customer','refresh');
			 
		}
		$data['title']=' ECommerce | Add Customer';
		$data['mainContent']='admin/customer/add';
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
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001,
					'created_at' =>  date('y')
				);


				$affected=$this->customer->update($id,$options);
				if ($affected) {
					$this->session->set_flashdata('success','Record has been Updated successfully.');
					redirect('/admin/customer','refresh');
				}
			 
		}
		$data['customers']=$this->customer->edit($id);

		$data['title']='ECommerce | Edit Customer';
		$data['mainContent']='admin/customer/edit';
		$this->load->view('admin/template/master',$data);
	}

		public function status($id)
		{
			$row = $this->customer->view_by($id);
			$newStatus = ($row->status == 'Active') ? 'Deactive' : 'Active';

			$options = [
				'status' => $newStatus
			];

			$affected = $this->customer->update($id, $options);
			if ($affected) 
				echo $newStatus;

			
		}

	//Delete one item
	public function delete($id)
	{
		$affected = $this->customer->delete($id);
		if ($affected)
		{

			echo 1;
			//redirect('/admin/customer','refresh');
		}

}
}

/* End of file Customer.php */
/* Location: ./application/controllers/admin/customer/Customer.php */



