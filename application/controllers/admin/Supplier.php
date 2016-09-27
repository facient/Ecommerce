<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('supplier_model','supplier');

	}

	// List all your items
	public function index(  )
	{
		$data['customers']=$this->supplier->view_all();
		$data['title']='ECommerce | supplier';
		$data['mainContent']='admin/supplier/index';
		$this->load->view('admin/template/master1',$data);
	}
	public function view_by($id)
	{
		
		$data['supp_by']=$this->supplier->view_by($id);

		echo json_encode($data['supp_by']);

			
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
					'status' => 'Deactive', 
					'user_id' =>  1, 
					'branch_id' => 01,
					'group_id' =>  001
				);

				$this->session->set_flashdata('success','Record has been added successfully.');

				$this->supplier->create($options);
				redirect('/admin/supplier','refresh');
			 
		}
		$data['title']=' ECommerce | Add supplier';
		$data['mainContent']='admin/supplier/add';
		$this->load->view('admin/template/master1',$data);
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
					'group_id' =>  001
				);


				$affected=$this->supplier->update($id,$options);
				if ($affected) {
					echo json_encode(1);
				}
			 
		}
		$suppliers=$this->supplier->edit($id);
		echo json_encode($suppliers);
		
	}

	public function status($id)
		{
			$row = $this->supplier->view_by($id);
			$newStatus = ($row->status == 'Active') ? 'Deactive' : 'Active';

			$options = [
				'status' => $newStatus
			];

			$affected = $this->supplier->update($id, $options);
			if ($affected) 
				echo $newStatus;

			
		}

	//Delete one item
	public function delete($id)
	{
		$affected = $this->supplier->delete($id);
		if ($affected)
		{

			echo 1;
			//redirect('/admin/category','refresh');
		}

	}
	public function _seed()
	{
		$faker=Faker\Factory::create();
		for ($i = 0; $i < 50; $i++) {        
 
           
            $options = array(
					'name' => $faker->name, 
					'contact_person' => $faker->name, 
					'landline_no' =>   $faker->phoneNumber,            
					'mobile_no' =>  $faker->phoneNumber, 
					'email' =>  $faker->email, 
					'gst_no' =>  $faker->randomNumber(111, 9995656), 
					'ntn_no' => $faker->randomNumber(111, 9995656),
					'initial_balance' =>  $faker->randomNumber(111, 9995656), 
					'status' => 'Active', 
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001
					
				);
            $this->supplier->create($options);

        }
	}
}

/* End of file supplier.php */
/* Location: ./application/controllers/admin/supplier/supplier.php */



