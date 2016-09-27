<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

		public function create( $data )
		{
			$this->db->insert(TABLE_CUSTOMER, $data);
			return $this->db->insert_id();
		}
	
		// Add a new item
		public function view_all()
		{		
			$this->db->order_by('id', 'desc');
			$query=$this->db->get(TABLE_CUSTOMER);
			return $query->result();
		}
		public function view_by($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get(TABLE_CUSTOMER);
			return $query->row();
		}
	
		//Update one item
		public function edit($id)
		{
			$query=$this->db->where('id',$id)
				->get(TABLE_CUSTOMER);	
			return $query->row();
		}
		public function update($id,$data)
		{
			$this->db->where('id',$id);
			$this->db->update(TABLE_CUSTOMER,$data);
			 if ($this->db->affected_rows()>0) {
			 	return True;
			 }else{
			 	return false;
			 }
			
		}
			//Delete one item
		public function delete($id)
		{	$this->db->where('id', $id);
			$this->db->delete(TABLE_CUSTOMER);
			return $this->db->affected_rows();
		}
		//customer Name Array

		public function customer_array()
		{
		$customers = array();
		foreach ($this->view_all() as $key => $customer) 
			$customers[$customer->id] = $customer->name;

		return $customers;
		}
	}
	
	