<?php

defined('BASEPATH') or exit('NO direct scripting allowed');

class Sms extends MY_Controller{

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['title'] = 'SMS';
		$this->data['subview'] = 'sms/sms';
		$this->data['script'] = 'sms/sms_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'sms';
		$this->load->view('main_layout', $this->data);
	}

	public function send() {
		$this->data['users'] = $this->usertype_m->get_usertype();
		$this->data['title'] = 'Send SMS';
		$this->data['subview'] = 'sms/send_sms';
		$this->data['script'] = 'sms/sms_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'sms';
		$this->load->view('main_layout', $this->data);
	}
}