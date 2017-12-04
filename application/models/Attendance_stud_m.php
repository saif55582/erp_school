<?php
defined('BASEPATH') or exit('No direct script allowed');

class Attendance_stud_m extends MY_Model {

	protected $_table_name = 'attendance_stud';
	protected $_primary_key = 'attendance_studID';
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

	function get_attendance_stud_where($array=NULL) {
		return parent::get_order_by($array);
	}

	function attendance_stud_update($array,$id) {
		parent::update($array,$id);
	}

}

