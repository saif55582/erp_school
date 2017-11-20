<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institute_Details_m extends CI_Model {

	function __construct() {

		parent::__construct();

	}

	public function get() {
			
		return $this->db->get('institute_details')->result();

	}

}