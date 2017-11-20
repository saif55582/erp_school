<?php
defined('BASEPATH') or die('No Direct Scripting allowed');

class Register extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	function rules() {
		$rules = array(
			array(
				'field'=>'first_name',
				'label'=>'First Name',
				'rules'=>'required|xss_clean|trim|alpha_numeric_spaces'
			),
			array(
				'field'=>'last_name',
				'label'=>'Last Name',
				'rules'=>'required|xss_clean|trim|alpha_numeric_spaces'
			),
			array(
				'field'=>'school_name',
				'label'=>'School Name',
				'rules'=>'required|xss_clean|trim|alpha_numeric_spaces'
			),
			array(
				'field'=>'school_pincode',
				'label'=>'Pin Code',
				'rules'=>'required|xss_clean|trim|numeric'
			),
			array(
				'field'=>'phone',
				'label'=>'Phone Number',
				'rules'=>'required|xss_clean|trim|numeric'
			),
			array(
				'field'=>'email',
				'label'=>'Email',
				'rules'=>'required|xss_clean|trim|valid_email|callback_unique[email]'
			),
			array(
				'field'=>'no_of_students',
				'label'=>'Number of students',
				'rules'=>'required|xss_clean|trim'
			),
			array(
				'field'=>'password',
				'label'=>'Password',
				'rules'=>'required'
			)
		);

		return $rules;

	}

	function unique($param,$field) {
		$array = array(
			$field=>$param
		);
		$check = $this->institute_m->get_institute_single($array);
		if(count($check)) {
			$this->form_validation->set_message('unique','Account already exists with this email');
			return false;
		}
		else
			return true;
	}

	public function index() {
		if($_POST) {
			$rules = $this->rules();
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == FALSE) {
				$this->load->view('register');
			} 
			else {
				$array = array(
					'first_name'=> $this->input->post('first_name') ,
					'last_name'=> $this->input->post('last_name') ,
					'school_name'=>  $this->input->post('school_name') ,
					'school_pincode'=> $this->input->post('school_pincode') ,
					'phone'=> $this->input->post('phone') ,
					'email'=> $this->input->post('email') ,
					'no_of_students'=> $this->input->post('no_of_students') 
				);
				 

				$instituteID = $this->institute_m->insert($array);
				$admin = array(
					'instituteID'=>$instituteID,
					'name'=>$array['first_name']." ".$array['last_name'],
					'email'=>$array['email'],
					'phone'=>$array['phone'],
					'username'=>$array['email'],
					'password'=>md5($this->input->post('password'))
					);

				$dest = './main_asset/school_docs/'.$instituteID;
				if(mkdir($dest)) {
					$subfolders = array('/student','/teacher','/staff','/admin');
					foreach ($subfolders as $folder) {
						$sub_folder = $dest.$folder;
						mkdir($sub_folder);
					}
				}
				$this->admin_m->insert_admin($admin);
				redirect('signin');
			}
		}
		else {
			$this->load->view('register');
		}
		


	}

}
