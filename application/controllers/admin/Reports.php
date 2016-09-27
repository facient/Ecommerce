<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
	{		
		parent::__construct();

	}

	// List all your items
	public function index()
	{
		$startDate=date('d/m/y');
		//echo strtotime($startDate);

		$this->db->where('date',date('Y-m-d'));
		$this->db->group_by('mini_trans_id');		
		$data['purchases']=$this->reports->get_all();	
		$data['title']=' ECommerce | Reports';
		$data['mainContent']='admin/reports/index';
		$this->load->view('admin/template/master1',$data);
	}

		
	public function activity_reports()
	{
		$startDate=date('d/m/y');
		//echo strtotime($startDate);
		$this->db->where('date',date('Y-m-d'));
		$this->db->group_by('mini_trans_id');		
		$data['purchases']=$this->reports->get_all();

	
		$data['title']=' ECommerce | Reports';
		$data['mainContent']='admin/reports/index';
		$this->load->view('admin/template/master1',$data);
	}

	public function activity_reports_view()
	{
		
		if ($_SERVER['REQUEST_METHOD']=='GET') 
	 	{
		if (($this->input->get('inputStartDate'))&&($this->input->get('inputEndDate'))) 
		{
			$startDate=$this->input->get('inputStartDate');
			$endDate=$this->input->get('inputEndDate');
			$this->db->where('date >=', date('Y/m/d',strtotime($startDate)));
			$this->db->where('date <=', date('Y/m/d',strtotime($endDate)));			
			
			if ($this->input->get('inputTransId')) 
			{				
				$transId=$this->input->get('inputTransId');
				$this->db->where('mini_trans_id',$transId);
			}
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}		
		  }
		  elseif ($this->input->get('inputTransId')) 
			{				
				$transId=$this->input->get('inputTransId');
				$this->db->where('mini_trans_id',$transId);
			
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputTransType')) 
		   {			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
				
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}				
		  $this->db->group_by('mini_trans_id');
		  $purchases=$this->reports->get_all();
		 	if ($purchases!=false) {
		 	
		 	
		 $count=0;
		 foreach ($purchases as $key) {
			$count++;		
			
		 	 	$responseString= '<tr>'.
				 '<td>'.$count.'</td>	
				 <td>'.$key->mini_trans_id.'</td>
				 <td>'.date('d/m/Y',strtotime($key->date)).'</td>';
				 if($key->supplier_name!=null){
				 $responseString .='<td>'.$key->supplier_name.'</td>';
				 	}
				 	else{
				 $responseString .='<td>'.$key->customer_name.'</td>';				 		
				 	}
				 	($key->transaction=='purchase'||$key->transaction=='sales'||$key->transaction=='quotation')?$reportDetails='Details':$reportDetails='Detail';
				 
				 $responseString .='<td>'.$key->description.'</td>


				 <td>'.'<a name="'.$key->mini_trans_id.'" id="'.$key->transaction.'" href="#'.$reportDetails.'" data-toggle="modal" class="label label-primary reportDetails">View Details</a>'.'</td>';
				 
				if ($key->transaction=='purchase') {
					
				 $responseString .='<td><span class="label label-primary">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='sales') {
					
				 $responseString .='<td><span class="label label-success">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='quotation') {
					
				 $responseString .='<td><span class="label label-danger">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='payment') {
					
				 $responseString .='<td><span class="label label-info">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='receipt') {
					
				 $responseString .='<td><span class="label label-warning">'.$key->transaction.'</span></td>';
				}
				
				if ($key->transaction=='purchase') {
				$responseString.='<td>'.$key->purchase_grand_total.'</td>';
				}elseif(($key->transaction=="sales")||($key->transaction=="quotation")){
				$responseString.='<td>'.$key->sale_grand_total.'</td>';
				}elseif(($key->transaction=="payment")||($key->transaction=="receipt")){
					if ($key->payment_amount==null) {
					 $responseString.='<td>'.'<span class="label label-danger">'.$key->cheque_return.'</span>'.'</td>';	
					}
					else{
				  $responseString.='<td>'.$key->payment_amount.'</td>';
				}
				}
                 if ($key->status=='Active'){
                 $responseString.='<td>'.'<span class="label label-primary">Active</span></td>';
                   }elseif ($key->status=='Initial'){
                  $responseString.='<td>'.  '<span class="label label-default">'.$key->status.'</span></td>';
                    } elseif ($key->status=='Revised'){
                  $responseString.='<td>'.  '<span class="label label-info">'.$key->status.'</span></td>';
                   }elseif ($key->status=='InProcess'){
                  $responseString.='<td>'.  '<span class="label label-primary">'.$key->status.'</span></td>';
                     }elseif ($key->status=='Approved'){
                  $responseString.='<td>'.  '<span class="label label-success">'.$key->status.'</span></td>';
                   }elseif ($key->status=='Rejected'){
                  $responseString.='<td>'.  '<span class="label label-danger">'.$key->status.'</span></td> ';     
                   }else{ 
                  $responseString.='<td>'.  '<span class="label label-danger">Deacitve</span></td>';
                  }
                                    

				$responseString.='</tr>';
				 echo $responseString;
				 }
			 }else{
			 	echo "";
			 }			
		}
		
	}
	
	public function sale_purchase()
	{
		$startDate=date('d/m/y');
		//echo strtotime($startDate);
		//$this->db->where('date',date('Y-m-d'));
		$this->db->where("(transaction='purchase' OR transaction='sales')");			
		$this->db->group_by('mini_trans_id');		
		$data['purchases']=$this->reports->get_all();

	
		$data['title']=' ECommerce | Reports Sale | Purchase';
		$data['mainContent']='admin/reports/sale_purchase';
		$this->load->view('admin/template/master1',$data);
	}
	public function sale_purchase_view()
	{
		
		if ($_SERVER['REQUEST_METHOD']=='GET') 
	 	{
		if (($this->input->get('inputStartDate'))&&($this->input->get('inputEndDate'))) 
		{
			// $startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));
			$startDate = date('Y/m/d', strtotime($this->input->get('inputStartDate')));
			$endDate = date('Y/m/d', strtotime($this->input->get('inputEndDate')));
			// $endDate=date('Y-m-d',strtotime($this->input->get('inputEndDate')));
			// var_dump($endDate);
			// var_dump($this->input->get('inputEndDate'));

			// $this->db->where('date >= ', $startDate);
			// $this->db->where('daate <=', $endDate);	
			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');		
					
			
			if ($this->input->get('inputTransId')) 
			{				
				$transId=$this->input->get('inputTransId');
				$this->db->where('mini_trans_id',$transId);
			}
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}		
		  }
		  elseif ($this->input->get('inputTransId')) 
			{				
				$transId=$this->input->get('inputTransId');
				$this->db->where('mini_trans_id',$transId);
			
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputTransType')) 
		   {			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
				
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}				
		  $this->db->group_by('mini_trans_id');
		  $purchases=$this->reports->get_all();

		 if ($purchases!=false){
		 $count=0;
		 foreach ($purchases as $key) {
			$count++;		
			
		 	 	$responseString= '<tr>'.
				 '<td>'.$count.'</td>	
				 <td>'.$key->mini_trans_id.'</td>
				 <td>'.date('d/m/Y',strtotime($key->date)).'</td>';
				 if($key->supplier_name!=null){
				 $responseString .='<td>'.$key->supplier_name.'</td>';
				}elseif($key->customer_name!=null){
				 $responseString .='<td>'.$key->customer_name.'</td>';

				}
				$responseString .='<td>'.$key->description.'</td>';
				($key->transaction=='purchase'||$key->transaction=='sales'||$key->transaction=='quotation')?$reportDetails='Details':$reportDetails='Detail';
				 
				 $responseString .='<td>'.'<a name="'.$key->mini_trans_id.'" id="'.$key->transaction.'" href="#'.$reportDetails.'" data-toggle="modal" class="label label-primary reportDetails">View Details</a></td>';

				 if ($key->transaction=='purchase') {
					
				 $responseString .='<td><span class="label label-primary">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='sales') {
					
				 $responseString .='<td><span class="label label-success">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='quotation') {
					
				 $responseString .='<td><span class="label label-danger">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='payment') {
					
				 $responseString .='<td><span class="label label-info">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='receipt') {
					
				 $responseString .='<td><span class="label label-warning">'.$key->transaction.'</span></td>';
				}
				 
				
					
				if ($key->transaction=='purchase') {
				$responseString.='<td>'.$key->purchase_grand_total.'</td>';
				}elseif(($key->transaction=="sales")){
				$responseString.='<td>'.$key->sale_grand_total.'</td>';
				}
                if ($key->status=='Active'){
                 $responseString.='<td>'.'<span class="label label-primary">Active</span></td>';
                   }else{ 
                  $responseString.='<td>'.  '<span class="label label-danger">Deacitve</span></td>';
                  }                                  

				$responseString.='</tr>';
				 echo $responseString;
				 
				 }
			}else{
				echo "";
			}			
		}
		
	}

	public function payment_receipt()
	{
		
		//echo strtotime($startDate);
		$this->db->where('date',date('Y-m-d'));
		$this->db->where("(transaction='payment' OR transaction='receipt')");			
		$this->db->group_by('mini_trans_id');		
		$data['purchases']=$this->reports->get_all();		
		$data['title']=' ECommerce | Reports Payment | Receipt';
		$data['mainContent']='admin/reports/payment_receipt';
		$this->load->view('admin/template/master1',$data);
	}
	public function payment_receipt_view()
	{	
		
		if ($_SERVER['REQUEST_METHOD']=='GET') 
	 		{
		if (($this->input->get('inputStartDate'))&&($this->input->get('inputEndDate'))) 
			{
			$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));

			$endDate=date('Y-m-d',strtotime($this->input->get('inputEndDate')));
			

			
			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');		
			
			if ($this->input->get('inputTransId')) 
			{				
				$transId=$this->input->get('inputTransId');
				$this->db->where('mini_trans_id',$transId);
			}
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}		
		  }
		  elseif ($this->input->get('inputTransId')) 
			{				
				$transId=$this->input->get('inputTransId');
				$this->db->where('mini_trans_id',$transId);
			
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputTransType')) 
		   {			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
				
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}			
		  
		  $purchases=$this->reports->get_all();
		 	
		 	$count=0;
		 	if ($purchases!=false){
		 	
			 foreach ($purchases as $key) {
			$count++;		
			
 	 		$responseString= '<tr>
				 <td>'.$count.'</td>	
				 <td>'.$key->mini_trans_id.'</td>
				 <td>'.date('d/m/Y',strtotime($key->date)).'</td>';
			  if($key->supplier_name!=null){
				 $responseString .='<td>'.$key->supplier_name.'</td>';
				}elseif($key->customer_name!=null){
				 $responseString .='<td>'.$key->customer_name.'</td>';

				}

				$responseString .='<td>'.$key->description.'</td>';
				($key->transaction=='purchase'||$key->transaction=='sales'||$key->transaction=='quotation')?$reportDetails='Details':$reportDetails='Detail';
				 
				 $responseString .='<td>'.'<a name="'.$key->mini_trans_id.'" id="'.$key->transaction.'" href="#'.$reportDetails.'" data-toggle="modal" class="label label-primary reportDetails">View Details</a></td>';

				 if ($key->transaction=='purchase') {
					
				 $responseString .='<td><span class="label label-primary">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='sales') {
					
				 $responseString .='<td><span class="label label-success">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='quotation') {
					
				 $responseString .='<td><span class="label label-danger">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='payment') {
					
				 $responseString .='<td><span class="label label-info">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='receipt') {
					
				 $responseString .='<td><span class="label label-warning">'.$key->transaction.'</span></td>';
				}
				  if($key->payment_amount==null){
			   		$responseString.='<td>'.'<span class="label label-danger">'.$key->cheque_return.'</span>'.'</td>';	
					}
					else{
				  $responseString.='<td>'.$key->payment_amount.'</td>';
					}
				if ($key->status=='Active'){
                 $responseString.='<td><span class="label label-primary">Active</span></td>';
                   }else{ 
                  $responseString.='<td><span class="label label-danger">Deacitve</span></td>';
                  }                                  

				$responseString.='</tr>';
				 echo $responseString;
				 }
			 }else{
			 	echo "";
			 }			
		}
		
	}

	public function cash_book()
		{
			$this->db->where('date <',date('Y-m-d'));
			$this->db->where('payment_mode','cash');		
			$openingBal=$this->reports->get_all();
			$openingBalVari=0;
			foreach ($openingBal as $key) {
				

				 if($key->transaction=='receipt'){
				 	$openingBalVari=$openingBalVari+$key->payment_amount;
				 }
				elseif($key->transaction=='payment'){
				 	$openingBalVari=$openingBalVari-$key->payment_amount;
				 }
			}
				
			$data['openingBal']=$openingBalVari;
			

			$this->db->where('date',date('Y-m-d'));
			$this->db->where('payment_mode','cash');							
			$data['purchases']=$this->reports->get_all();
			// print_r($data['purchases']);
			// die();		
			$data['title']=' ECommerce | Reports Cash Book';
			$data['mainContent']='admin/reports/cash_book';
			$this->load->view('admin/template/master1',$data);
		}
	public function cash_book_view()
	{	
		$json=array();
		if ($_SERVER['REQUEST_METHOD']=='GET') 
	 		{
			$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));
	 			
			if (($this->input->get('inputStartDate'))&&($this->input->get('inputEndDate'))) 
			{
			$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));

			$endDate=date('Y-m-d',strtotime($this->input->get('inputEndDate')));
			
			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');		
			
			if ($this->input->get('inputTransId')) 
			{				
				$transId=$this->input->get('inputTransId');
				$this->db->where('mini_trans_id',$transId);
			}
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}		
		  }
		  elseif ($this->input->get('inputTransId')) 
			{				
				$transId=$this->input->get('inputTransId');
				$this->db->where('mini_trans_id',$transId);
			
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputTransType')) 
		   {			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
				
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}				
		  $this->db->where('payment_mode','cash');
		  $purchases=$this->reports->get_all();
		  
		  $this->db->where('date <', $startDate);
		  $this->db->where('payment_mode','cash');		  
		  $openingBal=$this->reports->get_all();
		   $openingBalVari=0;
		   if ($openingBal!=false) {
		   	
	   		foreach ($openingBal as $key) {
			 if(($key->transaction=='receipt')){
			 	if ($key->payment_mode=='cash') {			 		
			 	$openingBalVari=$openingBalVari+$key->payment_amount;
			 	// echo $key->payment_amount.'<br>';

			 	}
			 }
			elseif($key->transaction=='payment'){
				if ($key->payment_mode=='cash') {
			 	$openingBalVari=$openingBalVari-$key->payment_amount;
				 }
			 }
			}
				 $json['openingBalVari']= 'OPENING BALANCE: '.$openingBalVari;

		   }else{
		   	 $json['openingBalVari']= 'OPENING BALANCE: '. 0;
		   }
		   	if($purchases!=false){
		 	$count=0;		 	
		 	$calPreBal=$openingBalVari;
		 	$responseString='';
			 foreach ($purchases as $key) {
			$count++;		
			
			/* ser.no  id date transaction description debit credit balance user details
			*/
 	 		$responseString.= '<tr>
				 <td>'.$count.'</td>	
				 <td>'.$key->mini_trans_id.'</td>
				 <td>'.date('d/m/Y', strtotime($key->date)).'</td>';
				
				if ($key->transaction=='payment') {
					
				 $responseString .='<td><span class="label label-info">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='receipt') {
					
				 $responseString .='<td><span class="label label-warning">'.$key->transaction.'</span></td>';
				}
				 
				 $responseString .='<td>'.$key->description.'</td>';				 

				 if($key->transaction=='payment'): 
               		$responseString.='<td>'.$key->payment_amount.'</td><td></td>';
             	elseif ($key->transaction=='receipt'): 
              		$responseString.='<td></td><td>'.$key->payment_amount.'</td>'; 
           		 endif;                
          		if ($key->transaction=='receipt'){
          			if($key->payment_mode='cash'){
          				$calPreBal=$calPreBal+$key->payment_amount;
               	$responseString.= '<td>'.$calPreBal.'</td>';}
          		}
      			elseif ($key->transaction=='payment'){
      				if($key->payment_mode=='cash'){
      					$calPreBal=$calPreBal-$key->payment_amount;
               $responseString.= '<td>'.$calPreBal.'</td>';
           		}}      			
               $responseString.= '<td>'.$key->user_id.'</td>'; 

               	($key->transaction=='purchase'||$key->transaction=='sales'||$key->transaction=='quotation')?$reportDetails='Details':$reportDetails='Detail';
				 
				$responseString .='<td>'.'<a name="'.$key->mini_trans_id.'" id="'.$key->transaction.'" href="#'.$reportDetails.'" data-toggle="modal" class="label label-primary reportDetails">View Details</a></td>';

				$responseString.='</tr>';
				 
				 }
				 $json['rows']= $responseString;
				 echo json_encode($json);
				}
				else{
					$json['rows']= "";
				echo json_encode($json);
			}			
		}
		
	}
	public function bank_book()
		{
			// $startDate=new DateTime('first day of this month');
			$startDate=date('Y-m-01');
			$endDate=date('Y-m-t');

			$this->db->where('date <',$startDate);
			$this->db->where('payment_mode','bank'); 
			$this->db->where('bank_id','1');		
			$openingBal=$this->reports->get_all();
			$initialBal=$this->bank->view_by('1');

			$openingBalVari=0;
			if($openingBal!=false){

			foreach ($openingBal as $key) {
				 if($key->transaction=='receipt'){
				 	$openingBalVari=$openingBalVari-$key->payment_amount;
				 }
				elseif($key->transaction=='payment'){
				 	$openingBalVari=$openingBalVari+$key->payment_amount;
				 }
				}
							
			$data['openingBal']=$openingBalVari;
			}else{
			$data['openingBal']=$initialBal->initial_balance;

			}

			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');	
			$this->db->where('payment_mode','bank'); 
			$this->db->where('bank_id','1');									
			$data['purchases']=$this->reports->get_all();
			// print_r($data['purchases']);
			// die();		
			$data['title']=' ECommerce | Reports Bank Book';
			$data['mainContent']='admin/reports/bank_book';
			$this->load->view('admin/template/master1',$data);
		}
	public function bank_book_view()
	{	
		$json=array();
		if ($_SERVER['REQUEST_METHOD']=='GET') 
	 		{
			$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));
	 			
			if (($this->input->get('inputStartDate'))&&($this->input->get('inputEndDate'))) 
			{
			$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));

			$endDate=date('Y-m-d',strtotime($this->input->get('inputEndDate')));
			
			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');		
			
			if ($this->input->get('inputBank')) 
			{				
				$bank=$this->input->get('inputBank');
				$this->db->where('bank_id',$bank);
			}
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}		
		  }
		  elseif ($this->input->get('inputBank')) 
			{				
				$bank=$this->input->get('inputBank');
				$this->db->where('bank_id',$bank);
			
			if ($this->input->get('inputTransType')) 
			{			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
			}	
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputTransType')) 
		   {			
				$transType=$this->input->get('inputTransType');			
				$this->db->where('transaction',$transType);
				
			if ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}
		   }
		   elseif ($this->input->get('inputUser')) 
			{
			$this->db->where('user_id', $this->input->get('inputUser'));
			}				
		  $this->db->where('payment_mode','bank');		 
		  $purchases=$this->reports->get_all();
		  
		  $this->db->where('date <', $startDate);
		  $this->db->where('payment_mode','bank');		  
		  if ($this->input->get('inputBank')) {
		  $this->db->where('bank_id',$this->input->get('inputBank'));
		 		  }		  
		  $openingBal=$this->reports->get_all();
		  $initialBal=$this->bank->view_by($this->input->get('inputBank'));
		  $openingBalVari=$initialBal->initial_balance;
		   if ($openingBal!=false) {
		   	
	   		foreach ($openingBal as $key) {
			 if(($key->transaction=='receipt')){
			 	if ($key->payment_mode=='bank') {			 		
			 	$openingBalVari=$openingBalVari+$key->payment_amount;
	 			 	}
			 }
			elseif($key->transaction=='payment'){
				if ($key->payment_mode=='bank') {
			 	$openingBalVari=$openingBalVari-$key->payment_amount;
				 }
			 }
			}
				 $json['openingBalVari']= 'OPENING BALANCE: '.$openingBalVari;

		   }else{
		   	$openingBalVari=$initialBal->initial_balance;
		   	 $json['openingBalVari']= 'OPENING BALANCE: '. $initialBal->initial_balance;
		   }
		   	if($purchases!=false){
		 	$count=0;		 	
		 	$calPreBal=$openingBalVari;
		 	$responseString='';
			 foreach ($purchases as $key) {
			$count++;		
			
			/* ser.no  id date transaction description debit credit balance user details
			*/
 	 		$responseString.= '<tr>
				 <td>'.$count.'</td>	
				 <td>'.$key->mini_trans_id.'</td>
			  	 <td>'.date('d/m/Y', strtotime($key->date)).'</td>';
				
				if ($key->transaction=='payment') {
					
				 $responseString .='<td><span class="label label-info">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='receipt') {
					
				 $responseString .='<td><span class="label label-warning">'.$key->transaction.'</span></td>';
				}
				 
				 $responseString .='<td>'.$key->description.'</td>';
				 $responseString .='<td>'.$key->bank_name.'</td>';				 

				 if($key->transaction=='payment'): 
               		$responseString.='<td>'.$key->payment_amount.'</td><td></td>';
             	elseif ($key->transaction=='receipt'): 
              		$responseString.='<td></td><td>'.$key->payment_amount.'</td>'; 
           		 endif;                
          		if ($key->transaction=='receipt'){
          			if($key->payment_mode='bank'){
          				$calPreBal=$calPreBal+$key->payment_amount;
               	$responseString.= '<td>'.$calPreBal.'</td>';}
          		}
      			elseif ($key->transaction=='payment'){
      				if($key->payment_mode=='bank'){
      					$calPreBal=$calPreBal-$key->payment_amount;
               $responseString.= '<td>'.$calPreBal.'</td>';
           		}}      			
               $responseString.= '<td>'.$key->user_id.'</td>';

               	($key->transaction=='purchase'||$key->transaction=='sales'||$key->transaction=='quotation')?$reportDetails='Details':$reportDetails='Detail';
				 
				$responseString .='<td>'.'<a name="'.$key->mini_trans_id.'" id="'.$key->transaction.'" href="#'.$reportDetails.'" data-toggle="modal" class="label label-primary reportDetails">View Details</a></td>';
  

				$responseString.='</tr>';
				 
				 }
				 $json['rows']= $responseString;
				 echo json_encode($json);
				}
				else{
					$json['rows']= "No Record Found";
				echo json_encode($json);
			}			
		}
		
	}
	public function customer_ledger()
		{
			// $startDate=new DateTime('first day of this month');
			$startDate=date('Y-m-01');
			$endDate=date('Y-m-t');

			$this->db->where('date <',$startDate);
			$this->db->where("(transaction='sales' OR transaction='receipt')");			
			$this->db->where('customer_id','1');
			$this->db->group_by('mini_trans_id');	
			$openingBal=$this->reports->get_all();
			

			$initialBal=$this->customer->view_by('50');			
			$openingBalVari=0;
			if($openingBal!=false){
			$openingBalVari=$initialBal->initial_balance;	
			foreach ($openingBal as $key) {
				 if($key->transaction=='sales'){
				 	$openingBalVari=$openingBalVari+$key->sale_grand_total;
				 }
				elseif($key->transaction=='receipt'){
				 	$openingBalVari=$openingBalVari-$key->payment_amount;
				 }
				}
							
			$data['openingBal']=$openingBalVari;
			}else{
			$data['openingBal']=$initialBal->initial_balance;

			}

			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');	
			$this->db->where('(transaction="sales" OR transaction="receipt")'); 
			$this->db->where('customer_id','50');
			$this->db->group_by('mini_trans_id');
			$data['purchases']=$this->reports->get_all();
			// echo "<pre>";
			// print_r($data['purchases']);
			// echo "</pre>";

			// die();
			// print_r($data['purchases']);
			// die();		
			$data['title']=' ECommerce | Reports Bank Book';
			$data['mainContent']='admin/reports/customer_ledger';
			$this->load->view('admin/template/master1',$data);
		}
	public function customer_ledger_view()
		{	
			$json=array();
			if ($_SERVER['REQUEST_METHOD']=='GET') 
		 		{
				$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));
		 			
				if (($this->input->get('inputStartDate'))&&($this->input->get('inputEndDate'))) 
				{
				$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));

				$endDate=date('Y-m-d',strtotime($this->input->get('inputEndDate')));
				
				$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');		
				
				if ($this->input->get('inputCustomer')) 
				{				
					$customer=$this->input->get('inputCustomer');
					$this->db->where('customer_id',$customer);
				}
				if ($this->input->get('inputTransType')) 
				{			
					$transType=$this->input->get('inputTransType');			
					$this->db->where('transaction',$transType);
				}	
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}		
			  }
			  elseif ($this->input->get('inputCustomer')) 
				{				
					$customer=$this->input->get('inputCustomer');
					$this->db->where('customer_id',$customer);
				
				if ($this->input->get('inputTransType')) 
				{			
					$transType=$this->input->get('inputTransType');			
					$this->db->where('transaction',$transType);
				}	
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}
			   }
			   elseif ($this->input->get('inputTransType')) 
			   {			
					$transType=$this->input->get('inputTransType');			
					$this->db->where('transaction',$transType);
					
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}
			   }
			   elseif ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}				
			  $this->db->where("(transaction='sales' OR transaction='receipt')");
			  $this->db->group_by('mini_trans_id');		 
			  $purchases=$this->reports->get_all();

			  $this->db->where('date <', $startDate);			  	  
			  if ($this->input->get('inputCustomer')) {
			  $this->db->where('customer_id',$this->input->get('inputCustomer'));
			 		  }
	 		  $this->db->group_by('mini_trans_id');		  
			  $openingBal=$this->reports->get_all();
			  $initialBal=$this->customer->view_by($this->input->get('inputCustomer'));
			
			  $openingBalVari=0;
			   if ($openingBal!=false) {
			   $openingBalVari=$initialBal->initial_balance;
			  
		   		foreach ($openingBal as $key) {
				 if($key->transaction=='sales'){
				 	$openingBalVari=$openingBalVari+$key->sale_grand_total;
				 }
				elseif($key->transaction=='receipt'){
				 	$openingBalVari=$openingBalVari-$key->payment_amount;
				 }
				}
					 $json['openingBalVari']= 'INITIAL BALANCE: '.$openingBalVari;

			   }else{
			   	 $openingBalVari=$initialBal->initial_balance;
			   	 $json['openingBalVari']= 'INITIAL BALANCE:   '.'  '. $initialBal->initial_balance;
			   }
			   	if($purchases!=false){
			 	$count=0;		 	
			 	$calPreBal=$openingBalVari;
			 	$responseString='';
				 foreach ($purchases as $key) {
				$count++;		
			
			/* ser.no  id date transaction description debit credit balance user details
			*/
 	 		$responseString.= '<tr>
				 <td>'.$count.'</td>	
				 <td>'.$key->mini_trans_id.'</td>
				 <td>'.date('d/m/Y', strtotime($key->date)).'</td>';
				
				if ($key->transaction=='sales') {
					
				 $responseString .='<td><span class="label label-success">'.$key->transaction.'</span></td>';
				}if ($key->transaction=='receipt') {
					
				 $responseString .='<td><span class="label label-warning">'.$key->transaction.'</span></td>';
				}

				 $responseString.='<td>'.$key->description.'</td>';				 

				 if($key->transaction=='sales'): 
               		$responseString.='<td>'.$key->sale_grand_total.'</td><td></td>';
             	elseif ($key->transaction=='receipt'): 
              		$responseString.='<td></td><td>'.$key->payment_amount.'</td>'; 
           		 endif;                
          		if ($key->transaction=='sales'){
          			
          				$calPreBal=$calPreBal+$key->sale_grand_total;
               	$responseString.= '<td>'.$calPreBal.'</td>';
          		}
      			elseif ($key->transaction=='receipt'){
      				
      					$calPreBal=$calPreBal-$key->payment_amount;
               $responseString.= '<td>'.$calPreBal.'</td>';
           		}      			
               
               $responseString.= '<td>'.$key->user_id.'</td>';

              ($key->transaction=='purchase'||$key->transaction=='sales'||$key->transaction=='quotation')?$reportDetails='Details':$reportDetails='Detail';
				 
				$responseString .='<td>'.'<a name="'.$key->mini_trans_id.'" id="'.$key->transaction.'" href="#'.$reportDetails.'" data-toggle="modal" class="label label-primary reportDetails">View Details</a></td>';
  

				$responseString.='</tr>';
				 
				 }
				 $json['rows']= $responseString;
				 echo json_encode($json);
				}
				else{
					$json['rows']= "No Record Found";
				echo json_encode($json);
			}			
		}
	}
	public function supplier_ledger()
		{
			// $startDate=new DateTime('first day of this month');
			$startDate=date('Y-m-01');
			$endDate=date('Y-m-t');

			$this->db->where('date <',$startDate);
			$this->db->where("(transaction='purchase' OR transaction='payment')");			
			$this->db->where('supplier_id','50');
			$this->db->group_by('mini_trans_id');		
			$openingBal=$this->reports->get_all();

			$initialBal=$this->supplier->view_by('50');

			$openingBalVari=0;
			if($openingBal!=false){
			$openingBalVari=$initialBal->initial_balance;	

			foreach ($openingBal as $key) {
				 if($key->transaction=='purchase'){
				 	$openingBalVari=$openingBalVari+$key->purchase_grand_total;
				 }
				elseif($key->transaction=='payment'){
				 	$openingBalVari=$openingBalVari-$key->payment_amount;
				 }
				}
							
			$data['openingBal']=$openingBalVari;
			}else{
			$data['openingBal']=$initialBal->initial_balance;

			}

			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');	
			$this->db->where('(transaction="purchase" OR transaction="payment")'); 
			$this->db->where('supplier_id','50');
			$this->db->group_by('mini_trans_id');									
			$data['purchases']=$this->reports->get_all();
			// print_r($data['purchases']);
			// die();		
			$data['title']=' ECommerce | Reports Bank Book';
			$data['mainContent']='admin/reports/supplier_ledger';
			$this->load->view('admin/template/master1',$data);
		}

	public function supplier_ledger_view()
		{	
			$json=array();
			if ($_SERVER['REQUEST_METHOD']=='GET') 
		 		{
				$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));
		 			
				if (($this->input->get('inputStartDate'))&&($this->input->get('inputEndDate'))) 
				{
				$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));

				$endDate=date('Y-m-d',strtotime($this->input->get('inputEndDate')));
				
				$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');		
				
				if ($this->input->get('inputSupplier')) 
				{				
					$supplier=$this->input->get('inputSupplier');
					$this->db->where('supplier_id',$supplier);
				}
				if ($this->input->get('inputTransType')) 
				{			
					$transType=$this->input->get('inputTransType');			
					$this->db->where('transaction',$transType);
				}	
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}		
			  }
			  elseif ($this->input->get('inputSupplier')) 
				{				
					$supplier=$this->input->get('inputSupplier');
					$this->db->where('supplier_id',$supplier);
				
				if ($this->input->get('inputTransType')) 
				{			
					$transType=$this->input->get('inputTransType');			
					$this->db->where('transaction',$transType);
				}	
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}
			   }
			   elseif ($this->input->get('inputTransType')) 
			   {			
					$transType=$this->input->get('inputTransType');			
					$this->db->where('transaction',$transType);
					
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}
			   }
			   elseif ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}				
			  $this->db->where("(transaction='payment' OR transaction='purchase')");
			  $this->db->group_by('mini_trans_id');		 
			  $purchases=$this->reports->get_all();

			  $this->db->where('date <', $startDate);
			  	  
			  if ($this->input->get('inputSupplier')) {
			  $this->db->where('supplier_id',$this->input->get('inputSupplier'));
			 		  }		  
			  $openingBal=$this->reports->get_all();
			  $initialBal=$this->supplier->view_by($this->input->get('inputSupplier'));
			  $openingBalVari=$initialBal->initial_balance;
			   if ($openingBal!=false) {
			   	
		   		foreach ($openingBal as $key) {
				 if(($key->transaction=='payment')){
				 			 		
				 	$openingBalVari=$openingBalVari-$key->payment_amount;
		 			 
				 }
				elseif($key->transaction=='purchase'){
					
				 	$openingBalVari=$openingBalVari+$key->purchase_grand_total;
					 
				 }
				}
					 $json['openingBalVari']= 'INITIAL BALANCE: '.$openingBalVari;

			   }else{
			   	$openingBalVari=$initialBal->initial_balance;
			   	 $json['openingBalVari']= 'INITIAL BALANCE: '. $initialBal->initial_balance;
			   }
			   	if($purchases!=false){
			 	$count=0;		 	
			 	$calPreBal=$openingBalVari;
			 	$responseString='';
			 foreach ($purchases as $key) {
				$count++;		
			
				/* ser.no  id date transaction description debit credit balance user details
				*/
 	 		$responseString.= '<tr>
				 <td>'.$count.'</td>	
				 <td>'.$key->mini_trans_id.'</td>
				 <td>'.date('d/m/Y', strtotime($key->date)).'</td>';

				 if ($key->transaction=='purchase') {
					
				 $responseString .='<td><span class="label label-primary">'.'Purchase'.'</span></td>';
				}if ($key->transaction=='payment') {
					
				 $responseString .='<td><span class="label label-info">'.'Payment'.'</span></td>';
				}
				 
				 $responseString .='<td>'.$key->description.'</td>';				 

				 if($key->transaction=='payment'): 
               		$responseString.='<td>'.$key->payment_amount.'</td><td></td>';
             	elseif ($key->transaction=='purchase'): 
              		$responseString.='<td></td><td>'.$key->purchase_grand_total.'</td>'; 
           		 endif;                
          		if ($key->transaction=='payment'){
          			
          				$calPreBal=$calPreBal+$key->payment_amount;
               	$responseString.= '<td>'.$calPreBal.'</td>';
          		}
      			elseif ($key->transaction=='purchase'){
      				
      					$calPreBal=$calPreBal-$key->purchase_grand_total;
               $responseString.= '<td>'.$calPreBal.'</td>';
           		}      			
               $responseString.= '<td>'.$key->user_id.'</td>';

               ($key->transaction=='purchase'||$key->transaction=='sales'||$key->transaction=='quotation')?$reportDetails='Details':$reportDetails='Detail';
				 
				$responseString .='<td>'.'<a name="'.$key->mini_trans_id.'" id="'.$key->transaction.'" href="#'.$reportDetails.'" data-toggle="modal" class="label label-primary reportDetails">View Details</a></td>';
  

				$responseString.='</tr>';
				 
				 }
				 $json['rows']= $responseString;
				 echo json_encode($json);
				}
				else{
					$json['rows']= "No Record Found";
				echo json_encode($json);
			}
						

		}	
	}

	public function item_ledger()
		{
			//$startDate=new DateTime('first day of this month');
			$startDate=date('Y-m-01');
			$endDate=date('Y-m-t');

			 $this->db->where('date <',$startDate);
			 $this->db->where("(transaction='purchase' OR transaction='sales')");			
			 $this->db->where('item_id','1');
			// $this->db->group_by('mini_trans_id');		
			$openingBal=$this->reports->get_all();
			// echo "<pre>";
			// print_r($openingBal);
			// echo "</pre>";
			// die();
			$initialBal=$this->productlist->view_by('1');

			$openingBalVari=0;
			if($openingBal!=false){
			$openingBalVari=$initialBal->initial_quantity;	

			foreach ($openingBal as $key) {
				 if($key->transaction=='purchase'){
				 	$openingBalVari=$openingBalVari+$key->initial_quantity;
				 }
				elseif($key->transaction=='sales'){
				 	$openingBalVari=$openingBalVari-$key->initial_quantity;
				 }
				}
							
			$data['openingBal']=$openingBalVari;
			}else{
			$data['openingBal']=$initialBal->initial_quantity;

			}
			$this->db->select("*, sum(purchase_quantity) as pq, sum(sale_quantity) as sq");										
			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');	
			$this->db->where('(transaction="purchase" OR transaction="sales")'); 
			
			$this->db->where('item_id', '1');
			$this->db->group_by('mini_trans_id');							
			$data['purchases']=$this->reports->get_all();
			// echo "<pre>";
			
			// print_r($data['purchases']);
			// echo "</pre>";
			// die();		
			$data['title']=' ECommerce | Reports Bank Book';
			$data['mainContent']='admin/reports/item_ledger';
			$this->load->view('admin/template/master1',$data);
		}	
	
	public function item_ledger_view()
		{	
			$json=array();
			if ($_SERVER['REQUEST_METHOD']=='GET') 
		 		{
				$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));
				$this->db->select("*, sum(purchase_quantity) as pq, sum(sale_quantity) as sq");										
		 			
				if (($this->input->get('inputStartDate'))&&($this->input->get('inputEndDate'))) 
				{
				$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));

				$endDate=date('Y-m-d',strtotime($this->input->get('inputEndDate')));
				
				$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');		
				
				if ($this->input->get('inputItem')) 
				{				
					$item=$this->input->get('inputItem');
					$this->db->where('item_id',$item);
				}
				
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}		
			  }
			  elseif ($this->input->get('inputItem')) 
				{				
					$item=$this->input->get('inputItem');
					$this->db->where('item_id',$item);
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}
			   }			  
			   elseif ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}				
			  $this->db->where("(transaction='sales' OR transaction='purchase')");
			  $this->db->group_by('mini_trans_id');		 
			  $purchases=$this->reports->get_all();

			$this->db->select("*, sum(purchase_quantity) as opq, sum(sale_quantity) as osq");										

			  $this->db->where('date <', $startDate);		  	  
			  if ($this->input->get('inputItem')) 
			  {
			  $this->db->where("(transaction='sales' OR transaction='purchase')");	
			  $this->db->where('item_id',$this->input->get('inputItem'));
	 		  }	
		   	  $this->db->group_by('mini_trans_id');		 

			  $openingBal=$this->reports->get_all();

			  $initialBal=$this->productlist->view_by($this->input->get('inputItem'));
			  $openingBalVari=$initialBal->initial_quantity;
			   if ($openingBal!=false) {
			   	
		   		foreach ($openingBal as $key) {
				 if(($key->transaction=='purchase')){
				 			 		
				 	$openingBalVari=$openingBalVari+$key->opq;
		 			 
				 }
				elseif($key->transaction=='sales'){
					
				 	$openingBalVari=$openingBalVari-$key->osq;
					 
				 }
				}
					 $json['openingBalVari']= 'INITIAL BALANCE: '.$openingBalVari;

			   }else{
			   	$openingBalVari=$initialBal->initial_quantity;
			   	 $json['openingBalVari']= 'INITIAL BALANCE: '. $openingBalVari;
			   }
			   	if($purchases!=false){
			 	$count=0;		 	
			 	$calPreBal=$openingBalVari;
			 	$responseString='';
			 foreach ($purchases as $key) {
				$count++;		
			
				/* ser.no  id date transaction description debit credit balance user details
				*/
 	 		$responseString.= '<tr>
				 <td>'.$count.'</td>	
				 <td>'.$key->mini_trans_id.'</td>
				 <td>'.date('d/m/Y', strtotime($key->date)).'</td>';
				 if ($key->transaction=='purchase') {
					
				 $responseString .='<td><span class="label label-primary">'.'Purchase'.'</span></td>';
				 }if ($key->transaction=='sales') {
					
				 $responseString .='<td><span class="label label-success">'.'Sale'.'</span></td>';
				 }

				 $responseString .='<td>'.$key->item_name.'</td>';				 

				 if($key->transaction=='purchase'): 
               		$responseString.='<td>'.$key->pq.'</td><td></td>';
             	elseif ($key->transaction=='sales'): 
              		$responseString.='<td></td><td>'.$key->sq.'</td>'; 
           		 endif;                
          		if ($key->transaction=='sales'){
          			
          				$calPreBal=$calPreBal-$key->sq;
               	$responseString.= '<td>'.$calPreBal.'</td>';
          		}
      			elseif ($key->transaction=='purchase'){
      				
      					$calPreBal=$calPreBal+$key->pq;
               $responseString.= '<td>'.$calPreBal.'</td>';
           		}      			
               $responseString.= '<td>'.$key->user_id.'</td>';
                ($key->transaction=='purchase'||$key->transaction=='sales'||$key->transaction=='quotation')?$reportDetails='Details':$reportDetails='Detail';
				 
				$responseString .='<td>'.'<a name="'.$key->mini_trans_id.'" id="'.$key->transaction.'" href="#'.$reportDetails.'" data-toggle="modal" class="label label-primary reportDetails">View Details</a></td>';
  

				$responseString.='</tr>';
				 
				 }
				 $json['rows']= $responseString;
				 echo json_encode($json);
				}
				else{
					$json['rows']= "No Record Found";
				echo json_encode($json);
			}
						

		}	
	}

	public function stock_hand()
		{
			//$startDate=new DateTime('first day of this month');
			 $startDate=date('Y-m-01');
			 $endDate=date('Y-m-t');

			
			$this->db->select("*, sum(purchase_quantity) as pq, sum(sale_quantity) as sq");							
			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');	
			$this->db->where('(transaction="purchase" OR transaction="sales")'); 
			$this->db->group_by('item_name');
			
			$data['purchases']=$this->reports->get_all();			
			$data['title']=' ECommerce | Reports Bank Book';
			$data['mainContent']='admin/reports/stock_hand';
			$this->load->view('admin/template/master1',$data);
		}

	public function stockHand_ledger_view()
		{	
			$json=array();
			if ($_SERVER['REQUEST_METHOD']=='GET') 
		 		{
				
				$this->db->select("*, sum(purchase_quantity) as pq, sum(sale_quantity) as sq");										
		 			
				if (($this->input->get('inputStartDate'))&&($this->input->get('inputEndDate'))) 
				{
				$startDate=date('Y-m-d',strtotime($this->input->get('inputStartDate')));

				$endDate=date('Y-m-d',strtotime($this->input->get('inputEndDate')));
				
				$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');		
				
				
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}		
			  }
			 
			   }			  
			   elseif ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}				
			  $this->db->where("(transaction='sales' OR transaction='purchase')");
			  $this->db->group_by('item_name');		 
			  $purchases=$this->reports->get_all();		   	
			  // echo "<pre>";
			  // print_r($purchases);
			  // echo "</pre>";
			  // die();
		   	if($purchases!=false){
			 	$count=0;		 	
			 	
			 	$responseString='';
			 foreach ($purchases as $key) {
				$count++;		
			
				/* ser.no  id date transaction description debit credit balance user details
				*/
 	 		$responseString.= '<tr>
				 <td>'.$count.'</td>	
				 <td>'.$key->item_id.'</td>
				 <td>'.$key->item_name.'</td>';
				  $item_initial=$this->productlist->view_by($key->item_id);
           		 $calPreBal=$item_initial->initial_quantity;    
			
					
				 $responseString .='<td>'.$calPreBal.'</td>';
						 

				
               		$responseString.='<td>'.$key->pq.'</td>';
             	
              		$responseString.='<td>'.$key->sq.'</td>'; 
           		

          		
               $responseString.= '<td>'.$calPreBal+=$key->pq-$key->sq.'</td>';
           		      			
               $responseString.= '<td>'.$key->user_id.'</td>';
                ($key->transaction=='purchase'||$key->transaction=='sales'||$key->transaction=='quotation')?$reportDetails='secondDetails':$reportDetails='secondDetails';
				 
				$responseString .='<td>'.'<a name="'.$key->item_id.'" id="'.$key->transaction.'" href="#'.$reportDetails.'" data-toggle="modal" class="label label-primary secondreportDetails">View Details</a></td>';
  

				$responseString.='</tr>';
				 
				 }
				 $json['rows']= $responseString;
				 echo json_encode($json);
				}
				else{
					$json['rows']= "No Record Found";
				echo json_encode($json);
			}
						

		}	
	

	public function account_receivable()
	{
			
			
			
			$this->db->select("*, sum(sale_total) as st, sum(payment_amount) as rt");							
			// $this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');	
			$this->db->where('(transaction="sales" OR transaction="receipt")');
			 $this->db->where('customer_id', '48'); 
			$this->db->group_by('customer_name');			
			$data['purchases']=$this->reports->get_all();

			$data['title']=' ECommerce | Reports Account Receivable';
			$data['mainContent']='admin/reports/account_receivable';
			$this->load->view('admin/template/master1',$data);
		}	
	
	public function account_receivable_view()
	{	
			$json=array();
			if ($_SERVER['REQUEST_METHOD']=='GET') 
		 		{
				
			$this->db->select("*, sum(sale_total) as st, sum(payment_amount) as pa");							

				if ($this->input->get('inputCustomer')) 
				{				
					$customer=$this->input->get('inputCustomer');
					$this->db->where('customer_id',$customer);
					
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}
			   }
			 
			   elseif ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}

			  $this->db->where("(transaction='sales' OR transaction='receipt')");
			  $this->db->group_by('customer_name');		 
			  
			  $purchases=$this->reports->get_all();

			 
			  $initialBal=$this->customer->view_by($this->input->get('inputCustomer'));
			
			   	 $json['openingBalVari']= 'INITIAL BALANCE:   '.'  '. $initialBal->initial_balance;
			   
		   	if($purchases!=false){
			 	$count=0;		 	
			 	
			 	$responseString='';
				 foreach ($purchases as $key) {
				$count++;		
			
			
 	 			$responseString.= '<tr>
				 <td>'.$count.'</td>	
				 <td>'.$key->customer_id.'</td>				 
				 <td>'.$key->customer_name.'</td>';				 

				 $receivable=($key->st+$initialBal->initial_balance)-$key->pa;
           		$responseString.='<td>'.$receivable.'</td>';
				
               $responseString.= '<td>'.$key->user_id.'</td><td><a name="'.  $key->id.'" href="purchase" data-toggle="modal" class="label label-primary purchasedet">View Details</a></td>
				<td>'    ;  

				$responseString.='</tr>';
				 
				 }
				 $json['rows']= $responseString;
				 echo json_encode($json);
				}
				else{
					$json['rows']= "No Record Found";
				echo json_encode($json);
			}			
		}
	}

	public function account_payable()
	{
		
		$this->db->select("*, sum(purchase_total) as pt, sum(payment_amount) as payt");							
		// $this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');	
		$this->db->where('(transaction="purchase" OR transaction="payment")'); 
		$this->db->where('supplier_id', '50');
		$this->db->group_by('supplier_name');			
		$data['purchases']=$this->reports->get_all();
				
		// echo "<pre>";
		// print_r($data['purchases']);
		// echo "</pre>";
		// die();
		
		$data['title']=' ECommerce | Reports Account Payable';
		$data['mainContent']='admin/reports/account_payable';
		$this->load->view('admin/template/master1',$data);
	}

	public function account_payable_view()
	{	
			$json=array();
			if ($_SERVER['REQUEST_METHOD']=='GET') 
		 		{
				
			$this->db->select("*, sum(purchase_total) as pt, sum(payment_amount) as pa");							

				if ($this->input->get('inputSupplier')) 
				{				
					$supplier=$this->input->get('inputSupplier');
					$this->db->where('supplier_id',$supplier);
					
				if ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}
			   }
			 
			   elseif ($this->input->get('inputUser')) 
				{
				$this->db->where('user_id', $this->input->get('inputUser'));
				}

			  $this->db->where("(transaction='purchase' OR transaction='payment')");
			  $this->db->group_by('supplier_name');		 
			  
			  $purchases=$this->reports->get_all();

			  // echo "<pre>";
			  // print_r($purchases);
			  // echo "</pre>";
			 	// die();

			  $initialBal=$this->supplier->view_by($this->input->get('inputSupplier'));
			
			   	 $json['openingBalVari']= 'INITIAL BALANCE:   '.'  '. $initialBal->initial_balance;
			   
		   	if($purchases!=false){
			 	$count=0;		 	
			 	
			 	$responseString='';
				 foreach ($purchases as $key) {
				$count++;		
			
			
 	 			$responseString.= '<tr>
				 <td>'.$count.'</td>	
				 <td>'.$key->supplier_id.'</td>				 
				 <td>'.$key->supplier_name.'</td>';				 

				 $receivable=($key->pt+$initialBal->initial_balance)-$key->pa;
           		$responseString.='<td>'.$receivable.'</td>';
				
               $responseString.= '<td>'.$key->user_id.'</td><td><a name="'.  $key->id.'" href="purchase" data-toggle="modal" class="label label-primary purchasedet">View Details</a></td>
				<td>'    ;  

				$responseString.='</tr>';
				 
				 }
				 $json['rows']= $responseString;
				 echo json_encode($json);
				}
				else{
					$json['rows']= "No Record Found";
				echo json_encode($json);
			}			
		}
	}

}


/* End of file Reports.php */
/* Location: ./application/controllers/admin/Reports.php */



