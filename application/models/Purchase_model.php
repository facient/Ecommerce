<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_model extends CI_Model {

		public function create( $data )
		{
			$this->db->insert(TABLE_PURCHASE, $data);
			return $this->db->insert_id();
		}
	
		// Add a new item
		public function view_all()

		{		
				$this->db->from(TABLE_PURCHASE);
				$this->db->order_by('id', 'desc');
				$query=$this->db->get();
				if ($this->db->affected_rows()) {
				return $query->result();
				}else
				{
					return false;
				}
		}
		public function distinct_view_all()
		{
			
			$this->db->select('id,mini_trans_id,date,supplier_name,description,
				purchase_grand_total,status');
			$this->db->from(TABLE_PURCHASE);
			$this->db->where('transaction','purchase');
			$this->db->group_by('mini_trans_id');
			$this->db->order_by('id', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
		public function distinct_view_all_sales()
		{
			
			$this->db->select('id,mini_trans_id,date,customer_name,description,
				sale_grand_total,status');
			$this->db->from(TABLE_PURCHASE);
			$this->db->where('transaction', 'sales');
			$this->db->group_by('mini_trans_id');
			$this->db->order_by('id', 'desc');			
			$query = $this->db->get();
			return $query->result();
		}

		public function distinct_view_all_payment()
		{
			
			// $this->db->select('id,mini_trans_id,date,supplier_name,description,
			// 	payment_mode,bank_id,bank_name,cheque_return,cheque_no,cheque_date,payment_amount,status');
			$this->db->from(TABLE_PURCHASE);
			$this->db->where('transaction', 'payment');
			//$this->db->or_where('payment_mode', 'bank');
			$this->db->order_by('id', 'desc');			
			$query = $this->db->get();
			return $query->result();
		}
		public function distinct_view_all_receipt()
		{
			
			// $this->db->select('id,mini_trans_id,date,supplier_name,description,
			// 	payment_mode,bank_id,bank_name,cheque_return,cheque_no,cheque_date,payment_amount,status');
			$this->db->from(TABLE_PURCHASE);
			$this->db->where('transaction', 'receipt');
			//$this->db->or_where('payment_mode', 'bank');
			$this->db->order_by('id', 'desc');			
			$query = $this->db->get();
			return $query->result();
		}

		public function distinct_view_all_quotation()
		{
			
			$this->db->select('id,mini_trans_id,date,customer_name,description,
				sale_grand_total,status');
			$this->db->from(TABLE_PURCHASE);
			$this->db->where('transaction', 'quotation');
			$this->db->group_by('mini_trans_id');
			$this->db->order_by('id', 'desc');			
			$query = $this->db->get();
			return $query->result();
		}
		public function view_by($id)
		{
			$this->db->where('mini_trans_id', $id);
			$query = $this->db->get(TABLE_PURCHASE);
			return $query->result_array();
		}
		public function view_by_status($id)
		{
			$query=$this->db->where('id',$id)
				        ->get(TABLE_PURCHASE);	
			return $query->row();
		}
	
		//Update one item
		public function edit($id)
		{
			$query=$this->db->where('id',$id)
				        ->get(TABLE_PURCHASE);	
			return $query->row();
		}
		public function update($id,$data)
		{
			$this->db->where('mini_trans_id',$id);
			$this->db->update(TABLE_PURCHASE,$data);
			return 1;
		}
		public function singleRowUpdate($id,$data)
		{
			$this->db->where('id',$id);
			$query=$this->db->update(TABLE_PURCHASE,$data);
			return $query;
		}
			//Delete one item
		public function delete($id)
		{	$this->db->where('mini_trans_id', $id);
			$this->db->delete(TABLE_PURCHASE);
			return 1;
		}
		public function singleDelete($id)
		{	$this->db->where('id', $id);
			$query=$this->db->delete(TABLE_PURCHASE);
			return $query;
		}
		//showing details of stock in hand
		public function view_by_item($id,$startDate,$endDate)
		{	
			$this->db->where('date BETWEEN "'. $startDate. '" and "'. $endDate.'"');
			$this->db->where('item_id', $id);
			$query=$this->db->get(TABLE_PURCHASE);
			return $query->result_array();
		}
		public function view_by_customer($id)
		{	
			
			$this->db->where('customer_id', $id);
			$this->db->group_by('mini_trans_id');
			$query=$this->db->get(TABLE_PURCHASE);
			return $query->result_array();
		}
	}
	
	