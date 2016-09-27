<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {

		public function create( $data )
		{
			$this->db->insert(TABLE_ITEM_CATEGORY, $data);
			return $this->db->insert_id();
		}
	
		// Add a new item
		public function view_all()
		{		
				$this->db->order_by('id', 'desc');
				$query=$this->db->get(TABLE_ITEM_CATEGORY);
				return $query->result();
		}
		public function view_by($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get(TABLE_ITEM_CATEGORY);
			return $query->row();
		}
	
	
		//Update one item
		public function edit($id)
		{
			$query=$this->db->where('id',$id)
				->get(TABLE_ITEM_CATEGORY);	
		return $query->row();
		}
		public function update($id,$data)
		{
			$this->db->where('id',$id);
			$this->db->update(TABLE_ITEM_CATEGORY,$data);
			return $this->db->affected_rows();
		}
			//Delete one item
		public function delete($id)
		{	$this->db->where('id', $id);
			$this->db->delete(TABLE_ITEM_CATEGORY);
			return $this->db->affected_rows();
		}
		public function active_item()
		{
			$this->db->where('status','active');
			$query=$this->db->get(TABLE_ITEM_CATEGORY);
			return $query->result();
		}
	}
	
	