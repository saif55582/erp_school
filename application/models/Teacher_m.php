<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class teacher_m extends MY_Model {

	protected $_table_name = 'teacher';
	protected $_primary_key = 'teacherID';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'name asc';

	function __constuct() {
		parent::__constuct();
	}

	function insertTeacher($array) {
		$id = parent::insert($array);
		return true;
	}

	function get_order_by_teacher($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_teacher_single($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_teacher_by_id($id=NULL,$single=NULL) {
		$query = parent::get($id,$single);
			return $query;
	}

	function delete($id=NULL) {
		parent::delete($id);
	}

	function insert($array=NULL) {
		parent::insert($array);
	}

	function updateTeacher($array= NULL,$id=NULL) {
		parent::update($array,$id);
	}




}