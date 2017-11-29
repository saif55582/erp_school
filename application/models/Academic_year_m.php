<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Academic_year_m extends MY_Model {

	protected $_table_name = 'academic_year';
	protected $_primary_key = 'academic_yearID';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'name asc';

	function __construct() {
		parent::__construct();
	}

	function insert_academic_year($array=NULL) {
		parent::insert($array);
	}

	function get_academic_year_where($array=null) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_academic_year_single($array=null) {
		return parent::get_single($array);
	}

	function delete_academic_year($id) {
		parent::delete($id);
	}


}