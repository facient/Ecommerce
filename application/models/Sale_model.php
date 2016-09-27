<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_model extends CI_Model {

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
		public function distinct_view_all_sales()
		{
			
			$this->db->select('id,mini_trans_id,date,supplier_name,description,purchase_grand_total,
								status');
			$this->db->from(TABLE_PURCHASE);
			$this->db->where('transaction', 'sales');
			$this->db->group_by('mini_trans_id');
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
			$this->db->where('id',$id);
			$this->db->update(TABLE_PURCHASE,$data);
			return $this->db->affected_rows();
		}
			//Delete one item
		public function delete($id)
		{	$this->db->where('id', $id);
			$this->db->delete(TABLE_PURCHASE);
			return $this->db->affected_rows();
		}
	}
	
	