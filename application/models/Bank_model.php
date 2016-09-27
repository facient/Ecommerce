<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_model extends CI_Model {

		public function create( $data )
		{
			$this->db->insert(TABLE_BANK, $data);
			return $this->db->insert_id();
		}
	
		// Add a new item
		public function view_all()

		{		
				$this->db->from(TABLE_BANK);
				$this->db->order_by('id', 'desc');
				$query=$this->db->get();
				return $query->result();
		}
		public function view_all_active()

		{		
				$this->db->from(TABLE_BANK);
				$this->db->where('status','active');
				$this->db->order_by('id', 'desc');
				$query=$this->db->get();
				return $query->result();
		}
		public function view_by($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get(TABLE_BANK);
			return $query->row();
		}
			
		//Update one item
		public function edit($id)
		{
			$query=$this->db->where('id',$id)
				->get(TABLE_BANK);	
		return $query->row();
		}
		public function update($id,$data)
		{
			$this->db->where('id',$id);
			$this->db->update(TABLE_BANK,$data);
			return $this->db->affected_rows();
		}
			//Delete one item
		public function delete($id)
		{	$this->db->where('id', $id);
			$this->db->delete(TABLE_BANK);
			return $this->db->affected_rows();
		}

		public function bank_array()
		{
			$banks = array();
			foreach ($this->view_all() as $key => $bank) {
				$banks[$bank->id]=$bank->name;
			}
			return $banks;
		}
	}
	
	