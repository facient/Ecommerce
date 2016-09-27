<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parentmenu_model extends CI_Model {

		public function create( $data )
		{
			$this->db->insert(TABLE_PARENTMENU, $data);
			return $this->db->insert_id();
		}
	
		// Add a new item
		public function view_all()

		{		
				$this->db->from(TABLE_PARENTMENU);
				$this->db->order_by('id', 'desc');
				$query=$this->db->get();
				return $query->result();
		}
	
		//Update one item
		public function edit($id)
		{
			$query=$this->db->where('id',$id)
				->get(TABLE_PARENTMENU);	
		return $query->row();
		}
		public function update($id,$data)
		{
			$this->db->where('id',$id);
			$this->db->update(TABLE_PARENTMENU,$data);
			return $this->db->affected_rows();
		}
			//Delete one item
		public function delete($id)
		{	$this->db->where('id', $id);
			$this->db->delete(TABLE_PARENTMENU);
			return $this->db->affected_rows();
		}
	}
	
	