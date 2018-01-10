<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Subject_m extends MY_Model {

	protected $_table_name = 'subject';
	protected $_primary_key = 'subjectID';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'subject_name asc';

	function __constuct() {
		parent::__constuct();
	}

	function insertSubject($array) {
		$id = parent::insert($array);
		return true;
	}

	function get_order_by_subject($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_subject_single($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_subject_by_id($id=NULL,$single=NULL) {
		$query = parent::get($id,$single);
			return $query;
	}

	function editSubject($array=NULL,$id=null) {
		parent::update($array,$id);
	}

	function delete($id=NULL) {
		parent::delete($id);
	}

}