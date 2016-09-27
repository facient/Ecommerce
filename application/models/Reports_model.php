<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {

	private $reports = array();
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		
	}

	// List all your items
	public function get_all()
	{	
		$this->db->order_by('date', 'acs');
		$query=$this->db->get(TABLE_PURCHASE);
		if ($query->num_rows()>0) {			
		return $query->result();
		}else
		{
			return false;
		}
	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}

}

/* End of file Reports_model.php */
/* Location: ./application/models/Reports_model.php */