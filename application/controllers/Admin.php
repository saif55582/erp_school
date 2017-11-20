<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Admin extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		if($this->session->userdata('loginusertypeID')==1) {
			echo 'done';
		}
		else {
			$this->not_found();
		}		

	}
}

?>