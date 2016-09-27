<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productlist extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
	}

	// List all your items
	public function index(  )
	{
		$data['products']=$this->productlist->view_all();
		$data['title']='ECommerce | Product List';
		$data['mainContent']='admin/productlist/index';
		$this->load->view('admin/template/master1',$data);
	}

	// Add a new item
	public function add()
	{	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(
					'name' => $this->input->post('inputName'), 
					'category_id' => $this->input->post('inputItemCategory'), 
					'price_sale' =>  $this->input->post('inputSalePr'), 
					'price_cost' =>  $this->input->post('inputCostPr'), 
					'barcode' =>  $this->input->post('inputBarcode'), 
					'min_quantity' =>  $this->input->post('inputMinQnt'), 
					'max_quantity' => $this->input->post('inputMaxQnt'), 
					'initial_quantity' =>  $this->input->post('inputIntQnt'), 
					'status' => 'Deactive', 
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001,
					'created_at' =>  date('y')
				);

				$this->session->set_flashdata('success','Record has been added successfully.');

				$this->productlist->create($options);
				redirect('/admin/productlist','refresh');
			 
		}
		$data['title']=' ECommerce | Add Product Item';
		$data['mainContent']='admin/productlist/add';
		$this->load->view('admin/template/master1',$data);
	}

	//Update one item
	public function edit( $id)
	{	

		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(
					'name' => $this->input->post('inputName'), 
					'category_id' => $this->input->post('inputItemCategory'), 
					'price_sale' =>  $this->input->post('inputSalePr'), 
					'price_cost' =>  $this->input->post('inputCostPr'), 
					'barcode' =>  $this->input->post('inputBarcode'), 
					'min_quantity' =>  $this->input->post('inputMinQnt'), 
					'max_quantity' => $this->input->post('inputMaxQnt'), 
					'initial_quantity' =>  $this->input->post('inputIntQnt'), 				
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001,
					'created_at' =>  date('y')
				);


				$affected=$this->productlist->update($id,$options);
				if ($affected) {
					echo json_encode(1);
					
				}
			 
		}
		$products=$this->productlist->edit($id);
		echo json_encode($products);
	}
		public function status($id)
		{
			$row = $this->productlist->view_by($id);
			$newStatus = ($row->status == 'Active') ? 'Deactive' : 'Active';

			$options = [
				'status' => $newStatus
			];

			$affected = $this->productlist->update($id, $options);
			if ($affected) 
				echo $newStatus;

			
		}

	//Delete one item
	public function delete($id)
	{
		$affected = $this->productlist->delete($id);
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
		$cost=$faker->randomNumber(10,2000);
		$sale=$cost+$faker->randomNumber(1,200);
		$options = array(
			
					'name' => $faker->firstName, 
					'category_id' => $faker->randomNumber(1,50), 
					'price_sale' => $sale,  
					'price_cost' =>  $cost,  
					'barcode' => $faker->randomNumber(30000,40000), 
					'min_quantity' =>  $faker->randomNumber(1,100),  
					'max_quantity' => $faker->randomNumber(1,300), 
					'initial_quantity' => $faker->randomNumber(1,50),  
					'status' => 'Active', 
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001
				);

				$this->productlist->create($options);
        }
	}
}

/* End of file productlist.php */
/* Location: ./application/controllers/admin/productlist.php */



