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
		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['subjects'] = $this->subject_m->get_order_by_subject(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['title'] = 'Subject';
		$this->data['subview'] = 'academics/subject';
		$this->data['script'] = 'academics/subject_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'subject';
		$this->load->view('main_layout', $this->data);

	}

	function renderAdd() {
		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['teachers'] = $this->teacher_m->get_order_by_teacher(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['title'] = 'Add Subject';
		$this->data['subview'] = 'academics/subject_add';
		$this->data['script'] = 'academics/subject_js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'subject';
		$this->load->view('main_layout', $this->data);
	}

	function dest($id=NULL) {
		$subjectID = $this->input->post('param');
		$this->subject_m->delete($subjectID);

	}

	function add() {
		
		if($_POST) {
			$array = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'classesID'=>base64_decode($this->input->post('classesID')),
				'teacherID'=>base64_decode($this->input->post('teacherID')),
				'subject_name'=>$this->input->post('name'),
				'subject_code'=>$this->input->post('code'),
				'optional'=>$this->input->post('option'),
				'pass_marks'=>$this->input->post('pass_marks'),
				'final_marks'=>$this->input->post('final_marks')
			);
			

			$this->subject_m->insertSubject($array);
			redirect('subject');
		}
		else {
			$this->renderAdd();
		}
	}

	function edit() {
		
		if($_POST) {
			$subjectID = base64_decode($this->input->post('sui'));
			$array = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'classesID'=>base64_decode($this->input->post('classesID')),
				'teacherID'=>base64_decode($this->input->post('teacherID')),
				'subject_name'=>$this->input->post('name'),
				'subject_code'=>$this->input->post('code'),
				'optional'=>$this->input->post('option'),
				'pass_marks'=>$this->input->post('pass_marks'),
				'final_marks'=>$this->input->post('final_marks')
			);
			$this->subject_m->editSubject($array, $subjectID);
			redirect('subject');
		}
		else {
			$this->renderAdd();
		}
	}


	function get() {

		$classesID = base64_decode($this->input->post('y'));
		$result = '';
		$where = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'classesID'=>$classesID
		);
		$subjects = $this->subject_m->get_order_by_subject($where);
		foreach($subjects as $subject) :
		$result .= "
                <tr id=".$subject->subjectID.">	
                	<td>".$this->mylibrary->getClassName($subject->classesID)."</td>
                    <td>".$subject->subject_name."</td>
                    <td>".$subject->subject_code."</td>
                    <td>".$this->mylibrary->getTeacherParam($subject->teacherID, 'name')."</td>
                    <td>".$subject->pass_marks."</td>
                    <td>".$subject->final_marks."</td>
                    <td>".($subject->optional == 1 ? 'Optional':'Mandatory')."</td>
                    <td>
						<a href='".base_url()."subject/edit/".base64_encode($subject->subjectID)."'>
                            <button type='button' rel='tooltip' class='btn btn-info mybtn'>
                            <i class='material-icons'>edit</i>
                            </button>
                        </a>
                        <button id='".$subject->subjectID."' cm='subject/dest' base='".base_url()."' type='button' rel='tooltip' class='btn btn-danger mybtn pop'>
                            <i class='material-icons'>close</i>
                        </button>
                    </td>
                </tr>
                ";
        endforeach;
        echo $result;

	}


	function lookup($p) {
		$subjectID = base64_decode($p);
		$where = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'subjectID'=>$subjectID
		);

		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['teachers'] = $this->teacher_m->get_order_by_teacher(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['subject'] = $this->subject_m->get_by_subject_name($where);
		$this->data['title'] = 'Edit Subject';
		$this->data['subview'] = 'academics/subject_edit';
		$this->data['script'] = 'academics/subject_js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'subject';
		$this->load->view('main_layout', $this->data);
	}

}