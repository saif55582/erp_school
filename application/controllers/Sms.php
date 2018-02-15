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


		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			if($_POST['message']) {

				$message = base64_decode($_POST['message']);
				$xml = '
						<MESSAGE>
						    <AUTHKEY>9567AsfUuGN9HJ539fe769</AUTHKEY>
						    <ROUTE>1</ROUTE>
						    <COUNTRY>91</COUNTRY>
						    <SENDER>MYSCHL</SENDER>
						    <SMS TEXT="Hi this is a test message">
						        <ADDRESS TO="8252516065"></ADDRESS>
						    </SMS>
						</MESSAGE>
						';

				$url = "http://smsp.vaultuptechnologies.com/api/postsms.php";
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POSTFIELDS, 'data='.$xml);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
				$data = curl_exec($ch);
				curl_close($ch);

				echo $data;
			}

		}

		$where = array(
			'instituteID'	=> $this->session->userdata('instituteID')
		);
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['users'] = $this->usertype_m->get_usertype();
		$this->data['title'] = 'Send SMS';
		$this->data['subview'] = 'sms/send_sms';
		$this->data['script'] = 'sms/sms_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'sms';
		$this->load->view('main_layout', $this->data);
	}

}