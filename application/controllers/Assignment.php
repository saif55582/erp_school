<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Assignment extends MY_Controller {

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
		$this->data['title'] = 'Assignment';
		$this->data['subview'] = 'academics/assignment';
		$this->data['script'] = 'academics/assignment_js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'assignment';
		$this->load->view('main_layout', $this->data);

	}

	function renderAdd() {
		$this->data['title'] = 'Add Assignment';
		$this->data['subview'] = 'academics/assignment_add';
		$this->data['script'] = 'academics/assignment_js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'assignment';
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
				
				redirect('assignment');

			}
		}
		else {
			$this->renderAdd();
		}
	}
}