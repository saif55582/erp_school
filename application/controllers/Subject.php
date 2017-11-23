<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Subject extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}

	function rulesAdd() {
		
	}

	function index() {
		//$this->data['subject'] = $this->subject_m->get_subject_by_id();
		$this->data['title'] = 'Subject';
		$this->data['subview'] = 'academics/subject';
		$this->data['script'] = 'academics/subject_js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'subject';
		$this->load->view('main_layout', $this->data);

	}

	function renderAdd() {
		$this->data['title'] = 'Add Subject';
		$this->data['subview'] = 'academics/subject_add';
		$this->data['script'] = 'academics/subject_js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'section';
		$this->load->view('main_layout', $this->data);
	}

	function deleteSubject($id=NULL) {
		$teacherID = $this->input->post('id');
		$this->teacher_m->delete($teacherID);

	}

	function add() {
		
		if($_POST) {
			if(!$this->form_validation->run() == FALSE) {
				$this->renderAdd();
			}
			else {
				
				redirect('student');

			}
		}
		else {
			$this->renderAdd();
		}
	}



}