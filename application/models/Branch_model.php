<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends CI_Model {

		public function create( $data )
		{
			$this->db->insert(TABLE_BRANCH, $data);
			return $this->db->insert_id();
		}
	
		// Add a new item
		public function view_all()

		{		
				$this->db->from(TABLE_BRANCH);
				$this->db->order_by('id', 'desc');
				$query=$this->db->get();
				return $query->result();
		}
		public function view_by($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get(TABLE_BRANCH);
			return $query->row();
		}
	
	
		//Update one item
		public function edit($id)
		{
			$query=$this->db->where('id',$id)
				->get(TABLE_BRANCH);	
		return $query->row();
		}
		public function update($id,$data)
		{
			$this->db->where('id',$id);
			$this->db->update(TABLE_BRANCH,$data);
			return $this->db->affected_rows();
		}
			//Delete one item
		public function delete($id)
		{	$this->db->where('id', $id);
			$this->db->delete(TABLE_BRANCH);
			return $this->db->affected_rows();
		}
	}
	
	