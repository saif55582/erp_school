<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Marks_list_m extends MY_Model {

	protected $_table_name = 'marks_list';
	protected $_primary_key = 'marks_listID';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';

	function __constuct() {

		parent::__constuct();
	}

	function insertMarksList($array) {
		$id = parent::insert($array);
		return $id;
	}

	function get_order_by_marks_list($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_marks_list_single($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_marks_list_by_id($id=NULL,$single=NULL) {
		$query = parent::get($id,$single);
			return $query;
	}

	function editMarksList($array=NULL,$id=null) {
		parent::update($array,$id);
	}

	function delete($id=NULL) {
		parent::delete($id);
	}

}