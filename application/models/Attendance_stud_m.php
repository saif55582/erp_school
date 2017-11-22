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

	function getSattendence() {
		
	}

}

