<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Exam_m extends MY_Model {

	protected $_table_name = 'exam';
	protected $_primary_key = 'examID';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'name asc';

	function __constuct() {
		parent::__constuct();
	}

	function insertExam($array) {
		$id = parent::insert($array);
		return true;
	}

	function get_order_by_exam($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_exam_single($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_exam_by_id($id=NULL,$single=NULL) {
		$query = parent::get($id,$single);
			return $query;
	}

	function editExam($array=NULL,$id=null) {
		parent::update($array,$id);
	}

	function delete($id=NULL) {
		parent::delete($id);
	}

}