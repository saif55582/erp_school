<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn extends MY_Controller {


	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}


	protected function rules() {
		$rules = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required|max_length[40]|xss_clean'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required|max_length[40]|xss_clean'
			)
		);
		return $rules;
	}


	public function index() {
		if($this->mylibrary->isLoggedIn())
			redirect('dashboard');
		else {
			$this->data['form_validation'] = '';
			if($_POST) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if($this->form_validation->run() == FALSE) {
					$this->data['form_validation'] = validation_errors();
					$this->load->view('signin2',$this->data);	
				}
				else {
					$checkArray = $this->signin_m->signin();
					if($checkArray['return'] == TRUE)
						redirect(base_url('dashboard'));
					else {
						$this->session->set_flashdata('errors',$checkArray['message']);
						$this->data['form_validation'] = $checkArray['message'];
						$this->load->view('signin2',$this->data);
					}
				}
			}
			else {
				$this->load->view('signin2',$this->data);
				$this->session->sess_destroy();
			}
		}
	}

	function forgotPassword() {
	    echo $this->input->post('f_email');
    }



}
