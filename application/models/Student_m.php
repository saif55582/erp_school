<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Student_m extends MY_Model {

	protected $_table_name = 'student';
	protected $_primary_key = 'studentID';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'f_name';

	function __constuct() {
		parent::__constuct();
	}

	function insertStudent($array) {

		$id = parent::insert($array);
		return $id;
	}

	function get_order_by_student($array=NULL) {

		$query = parent::get_order_by($array);
		return $query;
	}

	function get_single_student($array=NULL) {

		$query = parent::get_single($array);
		return $query;
	}

	function get_student($id=NULL,$single=NULL) {

		$query = parent::get($id,$single);
			return $query;

	}

	function updateStudent($array= NULL,$id=NULL) {
		
		parent::update($array,$id);
	}

	function delete($id=NULL) {
		
		parent::delete($id);
	}

}