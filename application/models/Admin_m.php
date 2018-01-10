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



	function get_admin_where($array=null) {

		$query = parent::get_single($array);

		return $query;

	}

	function get_admin_by_id($id=NULL, $single=NULL) {



		$query = parent::get($id,$single);



			return $query;



	}

	function update_admin($array=NULL, $id=null) {



		parent::update($array,$id);



	}


	function get_all_admin($array=Null){


		return parent::get_order_by($array);

	}



	function insert_admin($array=NULL) {

		parent::insert($array);

	}

}