<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receipt extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();	
	}

	// List all your items
	public function index()
	{
		$data['payments']=$this->purchase->distinct_view_all_receipt();		
		$data['title']='ECommerce | Receipt';
		$data['mainContent']='admin/receipt/index';
		$this->load->view('admin/template/master1',$data);

			//echo json_encode($data['purchases']);		
	}
	public function add()
	{	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{		
				$temptable=$this->input->post('inputHiddenId');
				$this->purchase->delete($temptable);				
				$customer_name_array=$this->customer->customer_array();
				$customer_name=$customer_name_array[$this->input->post('inputSupplier')];			
				$bank_name_array=$this->bank->bank_array();
				$bank_name=null;
				$amount=$this->input->post('inputBankCash');
				if ($this->input->post('inputChequeReturn')=='return') {
					$amount=null;
				}
				if ($this->input->post('inputBank')!=null) {									
				$bank_name=$bank_name_array[$this->input->post('inputBank')];
				}


				$date=strtr($this->input->post('inputDate'),'/', '-');
				if ($this->input->post('inputChequeDate')!=null) {
				$chequeDate=strtr($this->input->post('inputChequeDate'),'/', '-');
					
				}

				
				$options = array(
				'mini_trans_id'=>$temptable,
				'date'=>date('Y-m-d',strtotime($date)),
				'customer_id'=>$this->input->post('inputSupplier'),
				'customer_name'=>$customer_name,							
				'description'=>$this->input->post('inputDescription'),
				'status'=>($this->input->post('inputStatus'))?'Active':($this->input->post('inputBankStatus'))?'Active':'Deactive',
				'bank_id'=>$this->input->post('inputBank'),
				'bank_name'=>($bank_name)?$bank_name:null,
				'cheque_no'=>($this->input->post('inputChequeNumber'))?$this->input->post('inputChequeNumber'):null,
				'cheque_date'=>($this->input->post('inputChequeDate'))?(date('Y/m/d',strtotime($chequeDate))):null,				
				'cheque_return'=>($this->input->post('inputChequeReturn'))?'return '.$this->input->post('inputBankCash'):null,
				'payment_mode'=>$this->input->post('inputPaymentMode'),
				'payment_amount'=>($this->input->post('inputCash'))?$this->input->post('inputCash'):$amount,				
				'transaction'=>'receipt',
				'user_id'=>'1',
				'branch_id'=>'01',
				'group_id'=>'001'
				);
				$affected=$this->purchase->create($options);
				
				// echo json_encode(1);

				$this->session->set_flashdata('success','Record has been added successfully.');

				redirect('/admin/receipt','refresh');
			 
		}
		
	}
	public function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{		
				$temptable=$id;				
				$customer_name_array=$this->customer->customer_array();
				$customer_name=$customer_name_array[$this->input->post('inputSupplier')];				
				$bank_name_array=$this->bank->bank_array();
				$bank_name=null;

				if ($this->input->post('inputBank')!=null) {									
				$bank_name=$bank_name_array[$this->input->post('inputBank')];
				}
				$amount=$this->input->post('inputBankCash');
				if ($this->input->post('inputChequeReturn')=='return') {
					$amount=null;
				}				
				$date=strtr($this->input->post('inputDate'),'/', '-');
				if ($this->input->post('inputChequeDate')!=null) {
				$chequeDate=strtr($this->input->post('inputChequeDate'),'/', '-');
					
				}	

				$options = array(
				'mini_trans_id'=>$temptable,
				'date'=>date('Y-m-d',strtotime($date)),
				'customer_id'=>$this->input->post('inputSupplier'),
				'customer_name'=>$customer_name,							
				'description'=>$this->input->post('inputDescription'),
				'status'=>($this->input->post('inputStatus'))?'Active':($this->input->post('inputBankStatus'))?'Active':'Deactive',
				'bank_id'=>$this->input->post('inputBank'),
				'bank_name'=>($bank_name)?$bank_name:null,
				'cheque_no'=>($this->input->post('inputChequeNumber'))?$this->input->post('inputChequeNumber'):null,
				'cheque_date'=>($this->input->post('inputChequeDate'))?(date('Y-m-d',strtotime($chequeDate))):null,				
				'cheque_return'=>($this->input->post('inputChequeReturn'))?'return '.$this->input->post('inputBankCash'):null,
				'payment_mode'=>$this->input->post('inputPaymentMode'),
				'payment_amount'=>($this->input->post('inputCash'))?$this->input->post('inputCash'):$amount,				
				'transaction'=>'receipt',
				'user_id'=>'1',
				'branch_id'=>'01',
				'group_id'=>'001'
				);
				$affected=$this->purchase->singleRowUpdate($id,$options);
				if ($affected) {
					echo 1;
				}
				
		}
	}

	public function status($id)
		{
			$row = $this->purchase->view_by_status($id);
			//print_r($row);
			$newStatus = ($row->status == 'Active') ? 'Deactive' : 'Active';

			$options = [
				'status' => $newStatus
			];

			$affected = $this->purchase->singleRowUpdate($id, $options);
			if ($affected) 
				echo $newStatus;
		}

	public function delete($id)
	{
		$affected = $this->purchase->singleDelete($id);		
		if ($affected)
		{
			echo 1;			
		}
	}	

}

/* End of file Paymet.php */
/* Location: ./application/controllers/admin/Paymet.php */