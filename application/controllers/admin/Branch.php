<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Branch_model','branch');

	}

	// List all your items
	public function index(  )
	{
		$data['branchs']=$this->branch->view_all();
		$data['title']='ECommerce | Branch';
		$data['mainContent']='admin/branch/index';
		$this->load->view('admin/template/master1',$data);
	}

	// Add a new item
	public function add()
	{	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(
					'branch_name' => $this->input->post('inputBranchName'), 
					'branch_location' => $this->input->post('inputBranchLocation'), 
					'branch_address' =>  $this->input->post('inputBranchAddress'), 
					'branch_admin' =>  $this->input->post('inputBranchAdmin'),					
					'status' => 'Deactive', 
					'user_id' =>  1,					
					'group_id' =>  001
				);

				$this->session->set_flashdata('success','Record has been added successfully.');

				$this->branch->create($options);
				redirect('/admin/branch','refresh');
			 
		}
		$data['title']=' ECommerce | Add Branch';
		$data['mainContent']='admin/branch/add';
		$this->load->view('admin/template/master1',$data);
	}

	//Update one item
	public function edit( $id)
	{	

		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(

				'branch_name' => $this->input->post('inputBranchName'), 
				'branch_location' => $this->input->post('inputBranchLocation'), 
				'branch_address' =>  $this->input->post('inputBranchAddress'), 
				'branch_admin' =>  $this->input->post('inputBranchAdmin'),					
				'user_id' =>  1,					
				'group_id' =>  001,
				'created_at' =>  date('y')
				);


				$affected=$this->branch->update($id,$options);
				if ($affected) {
					echo json_encode(1);
				}
			 
		}
		$branchs=$this->branch->edit($id);
		 echo json_encode($branchs);

		// $data['title']='ECommerce | Edit Branch';
		// $data['mainContent']='admin/branch/edit';
		// $this->load->view('admin/template/master1',$data);
	}
	public function status($id)
		{
			$row = $this->branch->view_by($id);
			$newStatus = ($row->status == 'Active') ? 'Deactive' : 'Active';

			$options = [
				'status' => $newStatus
			];

			$affected = $this->branch->update($id, $options);
			if ($affected) 
				echo $newStatus;

			
		}

	//Delete one item
	public function delete($id)
	{
		$affected = $this->branch->delete($id);
		if ($affected)
		{

			echo 1;
			//redirect('/admin/category','refresh');
		}

	}
	public function _seed()
	{
		$faker=Faker\Factory::create('en_EN');
		for ($i = 0; $i < 50; $i++) {        
 			$options = array(
				'branch_name' => $faker->company, 
				'branch_location' => $faker->city, 
				'branch_address' =>  $faker->address, 
				'branch_admin' =>  $faker->firstName,					
				'status' => 'Active', 
				'user_id' =>  1,					
				'group_id' =>  001
			);

            $this->branch->create($options);
        }
			redirect('/admin/branch','refresh');
	}
}

/* End of file Branch.php */
/* Location: ./application/controllers/admin/branch/branch.php */



