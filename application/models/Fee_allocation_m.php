<?php

defined('BASEPATH') or exit('No direct scripting allowed');



class Fee_allocation_m extends MY_Model {



	protected $_table_name = 'fee_allocation';

	protected $_primary_key = 'fee_allocationID';

	protected $_primary_filter = 'intval';

	protected $_order_by = '';



	function __constuct() {

		parent::__constuct();

	}



	function allocate_fee_insert($array) {

		$id = parent::insert($array);

		return $id;

	}

	function get_fee_allocation_by_where($array=Null){

		return parent::get_order_by($array);
	}

	function get_fee_allocation_single($array=Null){

		return parent::get_single($array);
	}

	function update_fee_allocation($array=NULL,$id=null) {
		
		parent::update($array,$id);
	}

	function delete_fee_allcation($id=NULL) {

		parent::delete($id);
	}

	function deleteFeeAlloc($id=NULL) {

		parent::delete($id);

	}


}