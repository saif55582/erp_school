<?php

defined('BASEPATH') or exit('No direct scripting allowed');

class Fees extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE)
			redirect('signin');
	}

	function index() {
		$this->data   = array(
			'title'   => 'Fee Category',
			'subview' => 'test',
			'script'  => '',
			'li1'     => 'finance',
			'a1'      => 'finance',
			'div1'    => 'finance',
			'li2'     => 'fee',
			'a2'      => 'fee',
			'div2'    => 'fee',
			'li3'     => 'fee-category'
		);
		$this->load->view('main_layout',$this->data);
	}
}