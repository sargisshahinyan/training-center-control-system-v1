<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_branches()
	{
		$this->db->select('id, name');
		$result = $this->db->get('branches');

		return $result->num_rows() ? $result->result_array() : [];
	}
}
