<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Setting_m extends MY_Model {

	protected $_table_name = 'institute_details';
	protected $_primary_key = '';
	protected $_primary_filter = '';
	protected $_order_by = '';

	function __construct() {
		parent::__construct();
		$this->load->model('usertype_m');
	}

	function insert_or_update($array) {

		foreach ($array as $key => $value) {

			$this->db->query("INSERT INTO institute_details(feild_name, feild_value) VALUES ('".$key."', '".$value."') ON DUPLICATE KEY UPDATE feild_name='".$key."' , feild_value='".$value."'");
		}
	}

}


?>