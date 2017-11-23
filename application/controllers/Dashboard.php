<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			
			redirect('signin');
		}
	}
	
	public function index() {
		$this->data['title'] = 'Dashboard';
		$this->data['li1'] = 'dashboard';
		$this->data['subview'] = 'dashboard/index';
		$this->data['script'] = 'dashboard/index_js';
		$this->load->view('main_layout',$this->data);
	}

	function signout() {
		$this->session->sess_destroy();
		redirect('signin');
	}


}