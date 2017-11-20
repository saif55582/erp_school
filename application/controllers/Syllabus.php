<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Syllabus extends MY_Controller {

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
		$this->data['title'] = 'Syllabus';
		$this->data['subview'] = 'academics/syllabus';
		$this->data['script'] = 'academics/syllabus_js';
		$this->data['active'] = 'academics';
		$this->data['subactive'] = 'syllabus';
		$this->load->view('main_layout', $this->data);

	}

	function renderAdd() {
		$this->data['title'] = 'Add Syllabus';
		$this->data['subview'] = 'academics/syllabus_add';
		$this->data['script'] = 'academics/syllabus_js';
		$this->data['active'] = 'academics';
		$this->data['subactive']='syllabus';
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
				
				redirect('syllabus');

			}
		}
		else {
			$this->renderAdd();
		}
	}
}