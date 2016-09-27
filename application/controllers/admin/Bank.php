<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Bank_model','bank');

	}

	// List all your items
	public function index(  )
	{
		$data['banks']=$this->bank->view_all();
		$data['title']='ECommerce | Bank';
		$data['mainContent']='admin/bank/index';
		$this->load->view('admin/template/master1',$data);
	}

	// Add a new item
	public function add()
	{	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(
					'name' => $this->input->post('inputBankName'), 
					'branch_name' => $this->input->post('inputBranchName'), 
					'account_no' =>  $this->input->post('inputAccountNumber'), 
					'initial_balance' =>  $this->input->post('inputInitialBalance'), 
					'status' => 'Deactive', 
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001
				);

				$this->session->set_flashdata('success','Record has been added successfully.');

				$this->bank->create($options);
				redirect('/admin/bank','refresh');
			 
		}
		$data['title']=' ECommerce | Add Bank';
		$data['mainContent']='admin/bank/add';
		$this->load->view('admin/template/master1',$data);
	}

	//Update one item
	public function edit( $id)
	{	

		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(
					'name' => $this->input->post('inputBankName'), 
					'branch_name' => $this->input->post('inputBranchName'), 
					'account_no' =>  $this->input->post('inputAccountNumber'), 
					'initial_balance' =>  $this->input->post('inputInitialBalance'), 					
					
				);


				$affected=$this->bank->update($id,$options);
				if ($affected) {
					echo json_encode(1);
				}
			 
		}
		$banks=$this->bank->edit($id);
		echo json_encode($banks);
	}
		public function status($id)
		{
			$row = $this->bank->view_by($id);
			$newStatus = ($row->status == 'Active') ? 'Deactive' : 'Active';

			$options = [
				'status' => $newStatus
			];

			$affected = $this->bank->update($id, $options);
			if ($affected) 
				echo $newStatus;

			
		}

	//Delete one item
	public function delete($id)
	{
		$affected = $this->bank->delete($id);
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
					'name' => $faker->company,
					'branch_name' =>$faker->city, 
					'account_no' =>$faker->randomNumber(15555,2566689),  
					'initial_balance' => $faker->randomNumber(30000,50000),
					'status' => 'Active', 
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001
				);
            $this->bank->create($options);
        }
			redirect('/admin/bank','refresh');
	}
}

/* End of file Bank.php */
/* Location: ./application/controllers/admin/bank/bank.php */



