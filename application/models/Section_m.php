<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Section_m extends MY_Model {

	protected $_table_name = 'section';
	protected $_primary_key = 'sectionID';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';

	function __constuct() {
		parent::__constuct();
	}

	function get_section($id=NULL,$single=NULL) {
		$query = parent::get($id,$single);
		return $query;
	}

	function get_section_by($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_single_section($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function insertSection($array=NULL) {
		parent::insert($array);
	}

	function deleteSection($id) {
		parent::delete($id);

	}

	function updateSection($array=NULL,$id=NULL) {
		parent::update($array,$id);
	}

	function getLimit($array=NULL) {
		$res = parent::get_order_by($array);
		return count($res);

	}
	
}