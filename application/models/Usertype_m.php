<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usertype_m extends MY_Model {

	protected $_table_name = 'usertype';
	protected $_primary_key = 'usertypeID';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'usertypeID desc';

	function __construct() {
		parent::__construct();
	}

	function get_usertype($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}
}