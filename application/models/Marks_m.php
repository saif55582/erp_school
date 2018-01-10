<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Marks_m extends MY_Model {

	protected $_table_name = 'marks';
	protected $_primary_key = 'marksID';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';

	function __constuct() {

		parent::__constuct();
	}

	function insertMarks($array) {
		$id = parent::insert($array);
		return $id;
	}

	function get_order_by_marks($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_marks_single($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_marks_by_id($id=NULL,$single=NULL) {
		$query = parent::get($id,$single);
			return $query;
	}

	function updateMarks($array=NULL,$id=null) {
		return parent::update($array,$id);
	}

	function delete($id=NULL) {
		parent::delete($id);
	}

}