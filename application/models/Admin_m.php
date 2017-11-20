<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Admin_m extends MY_Model {

	protected $_table_name = 'admin';
	protected $_primary_key = 'adminID';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'name asc';

	function __construct() {
		parent::__construct();
	}

	function insert_admin($array=NULL) {
		parent::insert($array);
	}
}