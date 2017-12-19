<?php
defined('BASEPATH') or exit('No direct script allowed');

class Attendance_teacher_m extends MY_Model {

	protected $_table_name = 'attendance_teacher';
	protected $_primary_key = 'attendance_teacherID';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';

	function __construct() {
		parent::__construct();
	}

	function insertAttendance($array=NULL) {
		parent::insert($array);
	}

	function get_single_attendance($array) {
		return parent::get_single($array);
	}

	function get_attendance_teacher_where($array=NULL) {
		return parent::get_order_by($array);
	}

	function array_get_attendance_teacher_where($array=NULL) {
		return parent::array_get_order_by($array);
	}

	function attendance_teacher_update($array,$id) {
		parent::update($array,$id);
	}

}

