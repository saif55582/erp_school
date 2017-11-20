<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Classes_m extends MY_Model {

	protected $_table_name = 'classes';
	protected $_primary_key = 'classesID';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';

	function __construct() {
		parent::__construct();
	}

	function insert_class($array) {
		$id = parent::insert($array);
		return true;
	}

	function get_order_by_classes($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_class_by_id($id=NULL,$single=NULL) {
		$query = parent::get($id,$single);
		return $query;
	}

	function delete_class($id) {
		parent::delete($id);

	}

	function update_class($array=NULL,$id=NULL) {
		parent::update($array,$id);
	}
}