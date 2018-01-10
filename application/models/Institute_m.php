<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Institute_m extends MY_Model {

	protected $_table_name = 'institute';
	protected $_primary_key = 'instituteID';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';

	function __construct() {

		parent::__construct();
	}

	function get_institute_by($array=NULL) {
		return parent::get_order_by($array);
	}

	function get_institute($id=NULL) {

		$query =  parent::get($id);
		return $query;
	}

	function register($array=NULL) {

		return parent::insert($array);
	}

	function get_institute_single($array=NULL) {
		return parent::get_single($array);
	}

	function updateInstitute($array=NULL,$id=NULL) {
		return parent::update($array,$id);
	}

}