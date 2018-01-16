<?php

defined('BASEPATH') or exit('No direct scripting allowed');

class Admin extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	function rules() {
		$array = array(
			array(
				'field'=>'username',
				'label'=>'Username',
				'rules'=>'required|trim|xss_clean'
			),
			array(
				'field'=>'password',
				'label'=>'Password',
				'rules'=>'required|trim|xss_clean'
			)
		);
		return $array;
	}

	function index() {

			if($this->mylibrary->isLoggedInSuper()) {
				redirect('superdashboard');
			} 
			else {
				$this->data['form_validation'] = '';
				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if($this->form_validation->run() == FALSE) {
						$this->load->view('signin', $this->data);
					}
					else {
						$checkArray = $this->signin_m->signin_superadmin();
						if($checkArray['return'] == true ) {
							redirect('superdashboard');
						}
						else {
							$this->data['form_validation'] = $checkArray['message'];
							$this->load->view('signin', $this->data);
						}
					}
				}
				else {

					$this->load->view('signin', $this->data);	
				}
			}
			
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('admin');
	}

}

?>