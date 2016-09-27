<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();	
	}

	// List all your items
	public function index()
	{
		$data['sales']=$this->purchase->distinct_view_all_quotation();		
		$data['title']='ECommerce | Quotation';
		$data['mainContent']='admin/quotation/index';
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
				$customer_name_array=$this->customer->customer_array();

				$customer_name=$customer_name_array[$this->input->post('inputCustomer')];

				foreach ($values as $key) {
				$options = array(
				'mini_trans_id'=>$temptable,
				'date'=>date('Y/m/d',strtotime($this->input->post('inputDate'))),
				'customer_id'=>$this->input->post('inputCustomer'),
				'customer_name'=>$customer_name,
				'item_id'=>$key['item_id'],					
				'item_name'=>$key['item_name'],					
				'description'=>$this->input->post('inputDescription'),
				'sale_quantity'=>$key['quantity'],					
				'sale_price'=>$key['price'],					
				'sale_total'=>$key['total'],					
				'sale_grand_total'=>$this->input->post('inputGrandTotal'),
				'status'=>$this->input->post('inputQuotStatus'),
				'transaction'=>'quotation',
				'user_id'=>'1',
				'branch_id'=>'01',
				'group_id'=>'001',
				'created_at'=>date('d/m/y')
				);
				$affected=$this->purchase->create($options);
				if ($affected) 
					$this->temp->delete($key['id']);
				}				
				echo json_encode(1);

				//$this->session->set_flashdata('success','Record has been added successfully.');

				//redirect('/admin/purchase','refresh');
			 
		}
		redirect('/admin/quotation','refresh');

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
				'item_name'=>$item_name_array[$detail['item_id']],
				'quantity'=>$detail['sale_quantity'],
				'price'=>$detail['sale_price'],
				'total'=>$detail['sale_total'],				
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
						<td><a class="deleteQuotEditTransaction"><button  type="button" class="btn btn-xs btn-danger">Delete</button></a></td>
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
					'branch_id' => $this->input->post('inputBranch'), 
					'group_id' =>  $this->input->post('inputGroup'), 
					'created_at' =>  date('y')
				);


				$affected=$this->purchase->update($id,$options);
				if ($affected) {
					$this->session->set_flashdata('success','Record has been Updated successfully.');
					redirect('/admin/purchase','refresh');
				}
			 
		}
		$data['purchases']=$this->purchase->edit($id);

		$data['title']='ECommerce | Edit Purchase';
		$data['mainContent']='admin/purchase/edit';
		$this->load->view('admin/template/master',$data);
	}

		public function status($id)
		{
			$row = $this->purchase->view_by_status($id);
			$newStatus = ($row->status == 'Active') ? 'Deactive' : 'Active';

			$options = [
				'status' => $newStatus
			];

			$affected = $this->purchase->update($row->mini_trans_id, $options);
			if ($affected) 
				echo $newStatus;
		}
		
		public function addtempDelete($id)
		{
			 $this->temp->updatedelete($id);
			
			echo 1;		
		}

	//Delete one item
	public function delete($id)
	{
		$affected = $this->purchase->delete($id);
		if ($affected)
		{

			echo 1;
			//redirect('/admin/purchase','refresh');
		}
	}
}

/* End of file quotation.php */
/* Location: ./application/controllers/admin/quotation.php */