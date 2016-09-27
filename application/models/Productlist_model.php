<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productlist_model extends CI_Model {

		public function create( $data )
		{
			$this->db->insert(TABLE_ITEM, $data);
			return $this->db->insert_id();
		}
	
		// Add a new item
		public function view_all()
		{
				$query=$this->db->get(TABLE_ITEM);
				return $query->result();
		}
		
		public function view_all_active()
		{	
				$this->db->where('status', 'active');	
				$query=$this->db->get(TABLE_ITEM);
				return $query->result();
		}
		public function view_by($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get(TABLE_ITEM);
			return $query->row();
		}
	
	
		//Update one item
		public function edit($id)
		{
			$query=$this->db->where('id',$id)
				->get(TABLE_ITEM);	
		return $query->row();
		}
		public function update($id,$data)
		{
			$this->db->where('id',$id);
			$this->db->update(TABLE_ITEM,$data);
			return $this->db->affected_rows();
		}
			//Delete one item
		public function delete($id)
		{	$this->db->where('id', $id);
			$this->db->delete(TABLE_ITEM);
			return $this->db->affected_rows();
		}

		public function product_array()
		{
			$items=array();
			foreach ($this->view_all() as $key => $item) 
				$items[$item->id]=$item->name;
			
			return $items;
		}
	}
	
	