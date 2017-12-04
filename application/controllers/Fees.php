<?php

defined('BASEPATH') or exit('No direct scripting allowed');

class Fees extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE)
			redirect('signin');
	}

	//changed
	//made new changes
	//made fir se new changes
	function index() {
		$this->data['title']      = 'Fee';
		$this->data['subview']    = 'test';
		$this->data['script']     = '';
		$this->data['app_script'] = 'general.js';
		$this->data['li1']        = 'finance';
		$this->data['a1']         = 'finance';
		$this->data['div1']       = 'finance';
		$this->data['li2']        = 'fee';
		$this->data['a2']         = 'fee';
		$this->data['div2']       = 'fee';
		$this->data['li3']        = 'fee-category';
		$this->load->view('main_layout',$this->data);
	}
}