<?php

defined('BASEPATH') OR exit('Scripting not allowed');

class Mylibrary {

	protected $CI;

	public function __construct() {

		$this->CI = & get_instance();
	}

	public function isLoggedIn() {

		return (bool) $this->CI->session->userdata('loggedin');
	}

	
}