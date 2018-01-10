<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Exam_schedule_m extends MY_Model {

	protected $_table_name = 'exam_schedule';
	protected $_primary_key = 'exam_scheduleID';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';

	function __constuct() {
		parent::__constuct();
	}

	function insertExamSchedule ($array) {
		$id = parent::insert($array);
		return true;
	}

	function get_order_by_exam_schedule($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_exam_schedule_single($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_exam_schedule_by_id($id=NULL,$single=NULL) {
		$query = parent::get($id,$single);
			return $query;
	}

	function editExamSchedule($array=NULL,$id=null) {
		parent::update($array,$id);
	}

	function delete($id=NULL) {
		parent::delete($id);
	}

}