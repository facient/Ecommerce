<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quot_status extends CI_Model {

		
		public function view_all()

		{		
				$this->db->from(TABLE_STATUS);				
				$query=$this->db->get();
				return $query->result();
				
		}
		
	}
	
	