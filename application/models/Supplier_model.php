<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

		public function create( $data )
		{
			$this->db->insert(TABLE_SUPPLIER, $data);
			return $this->db->insert_id();
		}
	
		// Add a new item
		public function view_all()
		{		
				$this->db->order_by('id', 'asc');
				$query=$this->db->get(TABLE_SUPPLIER);
				return $query->result();
		}
		
		public function view_all_active()
		{	
			$this->db->where('status', 'active');	
			$query=$this->db->get(TABLE_SUPPLIER);
			return $query->result();
		}
		public function all_suppliers()
		{	
			$query=$this->db->get(TABLE_SUPPLIER);
			return $query->result();
		}
		public function view_by($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get(TABLE_SUPPLIER);
			return $query->row();
		}
	
		//Update one item
		public function edit($id)
		{
			$query=$this->db->where('id',$id)
				->get(TABLE_SUPPLIER);	
			return $query->row();
		}
		public function update($id,$data)
		{
			$this->db->where('id',$id);
			$this->db->update(TABLE_SUPPLIER,$data);
			return $this->db->affected_rows();
		}
			//Delete one item
		public function delete($id)
		{	$this->db->where('id', $id);
			$this->db->delete(TABLE_SUPPLIER);
			return $this->db->affected_rows();
		}
		public function supplier_array()
		{
		$suppliers = array();
		foreach ($this->all_suppliers() as $key => $supplier) 
			$suppliers[$supplier->id] = $supplier->name;

		return $suppliers;
		}

	}
	
	