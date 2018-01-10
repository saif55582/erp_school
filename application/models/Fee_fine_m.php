<?php



defined('BASEPATH') or exit('No direct scripting allowed');







class Fee_fine_m extends MY_Model {







	protected $_table_name = 'fee_fine';



	protected $_primary_key = 'fee_fineID';



	protected $_primary_filter = 'intval';



	protected $_order_by = '';







	function __constuct() {



		parent::__constuct();



	}







	function fee_fine_insert($array) {



		$id = parent::insert($array);



		return $id;



	}



	function get_fee_fine_by_where($array=Null){



		return parent::get_order_by($array);

	}



	function get_fee_fine_single($array=Null){



		return parent::get_single($array);

	}



	function update_fee_fine($array=NULL,$id=null) {

		

		parent::update($array,$id);

	}



	function delete_fee_fine($id=NULL) {



		parent::delete($id);

	}



}