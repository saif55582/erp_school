<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Syllabus_m extends MY_Model {

	protected $_table_name = 'syllabus';
	protected $_primary_key = 'syllabusID';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'title asc';

	function __constuct() {
		parent::__constuct();
	}

	function insertSyllabus($array) {
		$id = parent::insert($array);
		return true;
	}

	function get_order_by_syllabus($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_by_syllabus_name($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_syllabus_by_id($id=NULL,$single=NULL) {
		$query = parent::get($id,$single);
			return $query;

	}

	function editSyllabus($array=NULL,$id=null) {
		parent::update($array,$id);
	}

	function delete($id=NULL) {
		parent::delete($id);
	}

}