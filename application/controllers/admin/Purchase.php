<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();	
	}

	// List all your items
	public function index()
	{
		$data['purchases']=$this->purchase->distinct_view_all();		
		$data['title']='ECommerce | Purchase';
		$data['mainContent']='admin/purchase/index';
		$this->load->view('admin/template/master1',$data);

			//echo json_encode($data['purchases']);		
	}

		/*public function view_all()
		{
			$data['purchases']=$this->purchase->view_all();
			echo json_encode( $data);
		}*/

	// Add a new item
		public function add()
		{	
			if ($_SERVER['REQUEST_METHOD'] == 'POST') 
			{		
				$temptable=$this->input->post('inputHiddenId');
				$this->purchase->delete($temptable);
				$values=$this->temp->by_hidden($temptable);
				$this->temp->delete($temptable);	
				$supplier_name_array=$this->supplier->supplier_array();
				$supplier_name=$supplier_name_array[$this->input->post('inputSupplier')];				
				
				foreach ($values as $key) {
					$options = array(
						'mini_trans_id'=>$temptable,
						'date'=>date('Y/m/d',strtotime($this->input->post('inputDate'))),
						'supplier_id'=>$this->input->post('inputSupplier'),
						'supplier_name'=>$supplier_name,
						'item_id'=>$key['item_id'],					
						'item_name'=>$key['item_name'],					
						'description'=>$this->input->post('inputDescription'),
						'purchase_quantity'=>$key['quantity'],					
						'purchase_price'=>$key['price'],					
						'purchase_total'=>$key['total'],					
						'purchase_grand_total'=>$this->input->post('inputGrandTotal'),
						'status'=>'deactive',
						'transaction'=>'purchase',
						'user_id'=>'1',
						'branch_id'=>'01',
						'group_id'=>'001'

						);
					$affected=$this->purchase->create($options);
					if ($affected) 
						$this->temp->delete($key['id']);
				}				
				echo json_encode(1);

				//$this->session->set_flashdata('success','Record has been added successfully.');

				//redirect('/admin/purchase','refresh');

			}
		/*$data['title']=' ECommerce | Add Purchase';
		$data['mainContent']='admin/purchase/add';
		$this->load->view('admin/template/master',$data);*/
	}

	public function temptable()
	{

		$item_name_array=$this->productlist->product_array();
		
		$item_name=$item_name_array[$this->input->post('inputProduct')];
		$data = array(
			'hidden_id'=>$this->input->post('inputHiddenId'),
			'item_id'=>$this->input->post('inputProduct'),
			'item_name'=>$item_name,
			'quantity'=>$this->input->post('inputQuantity'),
			'price'=>$this->input->post('inputPrice'),
			'total'=>$this->input->post('inputTotal'),				
			'created_at'=>date('d/m/y')

			);
		$affected=$this->temp->create($data);

		if ($affected) {
			echo json_encode($affected);
		}
	}

	public function gettemptableEdit($id)
	{
		$getdata=$row=$this->temp->edit($id);			 
		echo json_encode($getdata);
	}

	public function gettemptable($id)
	{
		$getdata=$row=$this->temp->view_by($id);			 
		echo json_encode($getdata);
	}


	public function view_by($id)
	{
		$details=$this->purchase->view_by($id);
		echo json_encode($details);
	}




	public function view_by_edit($id)
	{
		$item_name_array=$this->productlist->product_array();		

		$details=$this->purchase->view_by($id);


		$this->temp->delete($id);

		foreach ($details as $detail) {
			$data = array(
				'id'=>$detail['id'],
				'hidden_id'=>$detail['mini_trans_id'],
				'item_id'=>$detail['item_id'],
				'item_name'=>$detail['item_name'],
				'quantity'=>$detail['purchase_quantity'],
				'price'=>$detail['purchase_price'],
				'total'=>$detail['purchase_total'],				
				'created_at'=>$detail['created_at']
				);
			$this->temp->create($data);

		}			
		echo json_encode($details);
	}
	public function gettemptable_edit($id)
	{
		$getdata=$this->temp->edit($id);
				//$this->temp->delete($id);
		$grand=0;
		foreach ($getdata as $key) {

			echo '<tr>
			<td>'.$key->id.'</td>
			<td>'.$key->item_name.'</td>
			<td>'.$key->quantity.'</td>
			<td>'.$key->price.'</td>
			<td>'.$key->total.'</td>
			<td><a class="deleteEditTransaction"><button  type="button" class="btn btn-xs btn-danger">Delete</button></a></td>
		</tr>';
		$grand+=$key->total;
	}
	echo '<tr>				                        
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td style="float:right;"> Grand Total</td>
	<td>
		<div class="form-group">                         
			<div class="col-md-11">
				<input id="inputEditGrand" type="number" name="inputEditGrand" class="form-control" value="'.$grand.'" readonly>
			</div>
		</div>
	</td>
</tr>';       



}

	//Update one item
public function edit($hidden_id)
{	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{			
		$supplier_name_array=$this->supplier->supplier_array();
		$supplier_name=$supplier_name_array[$this->input->post('inputEditSupplier')];
		$temptable=$hidden_id;
		$values=$this->temp->by_hidden($temptable);
			// print_r($values);
		foreach ($values as $key) {
			$options = array(
				'mini_trans_id'=>$temptable,
				'date'=>$this->input->post('inputEditDate'),
				'supplier_id'=>$this->input->post('inputEditSupplier'),
				'supplier_name'=>$supplier_name,
				'item_id'=>$key['item_id'],					
				'item_name'=>$key['item_name'],					
				'description'=>$this->input->post('inputEditDescription'),
				'purchase_quantity'=>$key['quantity'],					
				'purchase_price'=>$key['price'],					
				'purchase_total'=>$key['total'],					
				'purchase_grand_total'=>$this->input->post('inputEditGrandTotal'),			
				'transaction'=>'purchase',
				'user_id'=>'1',
				'branch_id'=>'01',
				'group_id'=>'001',
				'created_at'=>date('d/m/y')

				);
			// dd($options);
			//var_dump($options);
			$this->purchase->update($key['id'],$options);		
			$this->temp->updatedelete($key['id']);
		}				

	}
	echo json_encode(1);

}

public function status($id)
{
	$row = $this->purchase->view_by_status($id);
			//print_r($row);
	$newStatus = ($row->status == 'Active') ? 'Deactive' : 'Active';

	$options = [
	'status' => $newStatus
	];

	$affected = $this->purchase->update($row->mini_trans_id, $options);
	if ($affected) 
		echo $newStatus;
}

	//Delete one item

public function delete($id)
{
	$affected = $this->purchase->delete($id);

	if ($affected)
	{
		echo 1;

	}
}

	//deleting from temptable
public function addtempDelete($id)
{
	$this->temp->updatedelete($id);

	echo 1;		
}

public function tempDelete($id)
{
	$affected = $this->temp->delete($id);
	if ($affected)
		echo 1;		
}
public function onEdit()
{

	$item_name_array=$this->productlist->product_array();		

	$item_name=$item_name_array[$this->input->post('inputProduct')];
	$data = array(
		'hidden_id'=>$this->input->post('inputHiddenId'),
		'item_id'=>$this->input->post('inputProduct'),
		'item_name'=>$item_name,
		'quantity'=>$this->input->post('inputQuantity'),
		'price'=>$this->input->post('inputPrice'),
		'total'=>$this->input->post('inputTotal'),				
		'created_at'=>date('d/m/y')
		);
	$affected=$this->temp->onEdit($data);
	if ($affected) {
		echo json_encode($affected);
	}
}

		//details

public function view_by_item()
{
	$id=$this->input->get('id');

		//$TempDate=strtr($this->input->get('startDate'), '-', '-');
	$startDate=date('Y-m-d',strtotime($this->input->get('startDate')));

		//$TempDate=strtr($this->input->get('endDate'), '-', '-');
	$endDate=date('Y-m-d',strtotime($this->input->get('endDate')));

	$details=$this->purchase->view_by_item($id,$startDate,$endDate);
		// echo "<pre>"; 
	 // 	print_r($details);
	 // 	echo "</pre>";
		// die();
	echo json_encode($details);
}
public function view_by_customer()
	{
		$id=$this->input->get('id');

		
		$details=$this->purchase->view_by_customer($id);
		// echo "<pre>"; 
	 // 	print_r($details);
	 // 	echo "</pre>";
		// die();
		echo json_encode($details);
	}

}

/* End of file purchase.php */
/* Location: ./application/controllers/admin/purchase/Customer.php */



