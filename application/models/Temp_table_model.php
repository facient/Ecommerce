<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temp_table_model extends CI_Model {

		public function create( $data )
		{
			
			$this->db->insert(TABLE_TEMP, $data);
			return $this->db->insert_id();
		}
		public function onEdit( $data )
		{
			
			$this->db->insert(TABLE_TEMP, $data);
			return $this->db->insert_id();
		}
	
		// Add a new item
		public function view_all()

		{		
				$this->db->from(TABLE_TEMP);
				$this->db->order_by('id', 'desc');
				$query=$this->db->get();
				if ($this->db->affected_rows()) {
				return $query->result();
				}else
				{
					return false;
				}
		}
		public function view_by($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get(TABLE_TEMP);
			return $query->row();
		}
	
		//Update one item
		public function edit($id)
		{	
			$this->db->order_by('id', 'desc');
			$query=$this->db->where('hidden_id',$id)
				->get(TABLE_TEMP);	
			return $query->result();
		}
		public function update($id,$data)
		{
			$this->db->where('id',$id);
			$this->db->update(TABLE_TEMP,$data);
			return $this->db->affected_rows();
		}
			//Delete one item
		public function updatedelete($id)
		{	$this->db->where('id', $id);
			$this->db->delete(TABLE_TEMP);
			return $this->db->affected_rows();
		}
		public function delete($id)			
		{	
			$this->db->where('hidden_id', $id);
			$this->db->delete(TABLE_TEMP);
			return $this->db->affected_rows();
		}
		public function by_hidden($hidden)
		{
			$query=$this->db->where('hidden_id', $hidden)
			                ->get(TABLE_TEMP);
			return $query->result_array();

		}
		 public function addDelete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete(TABLE_TEMP);
			return $this->db->affected_rows();
		}
	}
	
	