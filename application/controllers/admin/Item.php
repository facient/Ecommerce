<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Item_model','item');

	}

	// List all your items
	public function index(  )
	{
		$data['items']=$this->item->view_all();
		$data['title']='ECommerce | Item';
		$data['mainContent']='admin/item/index';
		$this->load->view('admin/template/master1',$data);
	}

	// Add a new item
	public function add()
	{	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(
					'category_name' => $this->input->post('inputName'), 
					'status' => 'Deactive', 
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001
				);

				$this->session->set_flashdata('success','Record has been Added successfully.');

				$this->item->create($options);
				redirect('/admin/item','refresh');
			 
		}
		$data['title']=' ECommerce | Add Item';
		$data['mainContent']='admin/item/add';
		$this->load->view('admin/template/master1',$data);
	}

	//Update one item
	public function edit( $id)
	{	

		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			
				$options = array(

					'category_name' => $this->input->post('inputName'), 					
					'user_id' =>  1,
					'branch_id' => 01,
					'group_id' =>  001
				);


				$affected=$this->item->update($id,$options);
				if ($affected) {
					echo json_encode(1);
				}
			 
		}
		$customers=$this->item->edit($id);
		echo json_encode($customers);
		
	}
		public function status($id)
		{
			$row = $this->item->view_by($id);
			$newStatus = ($row->status == 'Active') ? 'Deactive' : 'Active';

			$options = [
				'status' => $newStatus
			];

			$affected = $this->item->update($id, $options);
			if ($affected) 
				echo $newStatus;

			
		}

	//Delete one item
	public function delete($id)
	{
		$affected = $this->item->delete($id);
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
				'category_name' => $faker->catchPhrase, 
				'status' => 'Active', 
				'user_id' =>  1,
				'branch_id' => 01,
				'group_id' =>  001
			
			);
            $this->item->create($options);

        }
	}
}

/* End of file item.php */
/* Location: ./application/controllers/admin/item/item.php */



