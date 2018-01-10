<?php

defined('BASEPATH') or exit('No direct scripting allowed');

class Exam extends MY_Controller {


	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}

	function index() {

		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;

		$where_exam = array(
			'instituteID'		=>$this->session->userdata('instituteID'),
			'academic_yearID' 	=> $academic_yearID
		);
		$where_classes = array(
			'instituteID'		=>$this->session->userdata('instituteID')
		);

		$this->data['classes'] = $this->classes_m->get_order_by_classes($where_classes);
		$this->data['exams'] = $this->exam_m->get_order_by_exam($where_exam);
		$this->data['title'] = 'Exam';
		$this->data['subview'] = 'exam/exam';
		$this->data['script'] = 'exam/exam_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'exam_name';
		$this->load->view('main_layout', $this->data);
	}

	function renderAdd() {
	
		$this->data['title'] = 'Add Exam';
		$this->data['subview'] = 'exam/exam_add';
		$this->data['script'] = 'exam/exam_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'exam_name';
		$this->load->view('main_layout', $this->data);
	}

	function schedule() {

		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;

		$where_classes = array(
			'instituteID'=>$this->session->userdata('instituteID')
		);
		$where_exam = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'academic_yearID'=>$academic_yearID
		);

		$this->data['classes'] = $this->classes_m->get_order_by_classes($where_classes);
		$this->data['exam_schedules'] = $this->exam_schedule_m->get_order_by_exam_schedule($where_exam);
		$this->data['title'] = 'Exam Schedule';
		$this->data['subview'] = 'exam/exam_schedule';
		$this->data['script'] = 'exam/exam_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'exam_schedule';
		$this->load->view('main_layout', $this->data);
	}

	//add exam schedule
	function add_schedule() {

		if($_POST) {
			$instituteID = $this->session->userdata('instituteID');
			$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
			$academic_yearID = $institute->academic_yearID;
			$array = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'academic_yearID'=>$academic_yearID,
				'examID'=>base64_decode($this->input->post('examID')),
				'classesID'=>base64_decode($this->input->post('classesID')),
				'sectionID'=>base64_decode($this->input->post('sectionID')),
				'subjectID'=>base64_decode($this->input->post('subjectID')),
				'date'=>$this->input->post('exam_date'),
				'time_from'=>$this->input->post('time_from'),
				'time_to'=>$this->input->post('time_to'),
				'room'=>$this->input->post('room')
			);

			$this->exam_schedule_m->insertExamSchedule($array);
			$this->session->set_flashdata('exam_schedule_add','success');
			redirect('exam/add_schedule');
		}

		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;

		$where_classes = array(
			'instituteID'=>$this->session->userdata('instituteID')
		);

		$where_exam = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'academic_yearID'=>$academic_yearID
		);

		$this->data['classes'] = $this->classes_m->get_order_by_classes($where_classes);
		$this->data['exams'] = $this->exam_m->get_order_by_exam($where_exam);
		$this->data['title'] = 'Add Exam Schedule';
		$this->data['subview'] = 'exam/exam_schedule_add';
		$this->data['script'] = 'exam/exam_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'exam_schedule';
		$this->load->view('main_layout', $this->data);

	}

	//add exam
	function add() {

		if($_POST) {
			$instituteID = $this->session->userdata('instituteID');
			$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
			$academic_yearID = $institute->academic_yearID;
			$data = array(
				'instituteID'		=>$instituteID,
				'academic_yearID'	=>$academic_yearID,
				'name'				=>$this->input->post('exam_name'),
				'date'				=>$this->input->post('exam_date'),
				'description'		=>$this->input->post('description')
			);

			$this->exam_m->insertExam($data);
			redirect('exam');
		}
		else {

			$this->renderAdd();
		}
	}

	function edit($i=null) {

		if($_POST) {
			$instituteID = $this->session->userdata('instituteID');
			$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
			$academic_yearID = $institute->academic_yearID;
			$data = array(
				'instituteID'		=>$instituteID,
				'academic_yearID'	=>$academic_yearID,
				'name'				=>$this->input->post('exam_name'),
				'date'				=>$this->input->post('exam_date'),
				'description'		=>$this->input->post('description')
			);
			$examID = base64_decode($this->input->post('i'));
			$this->exam_m->editExam($data, $examID);
			redirect('exam/edit/'.base64_encode($examID));
		}

		$examID = base64_decode($i);
		$this->data['exam'] = $this->exam_m->get_exam_by_id($examID,true);
		$this->data['title'] = 'Edit Exam';
		$this->data['subview'] = 'exam/exam_edit';
		$this->data['script'] = 'exam/exam_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'exam_name';
		$this->load->view('main_layout', $this->data);
	}

	function schedule_edit($i=null) {

		if($_POST) {

			$instituteID = $this->session->userdata('instituteID');
			$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
			$academic_yearID = $institute->academic_yearID;
			$array = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'academic_yearID'=>$academic_yearID,
				'examID'=>base64_decode($this->input->post('examID')),
				'classesID'=>base64_decode($this->input->post('classesID')),
				'sectionID'=>base64_decode($this->input->post('sectionID')),
				'subjectID'=>base64_decode($this->input->post('subjectID')),
				'date'=>$this->input->post('exam_date'),
				'time_from'=>$this->input->post('time_from'),
				'time_to'=>$this->input->post('time_to'),
				'room'=>$this->input->post('room')
			);
			$exam_scheduleID = base64_decode($this->input->post('i'));
			$this->exam_schedule_m->editExamSchedule($array, $exam_scheduleID);
			redirect('exam/schedule_edit/'.base64_encode($exam_scheduleID));
		}

		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;

		$where_classes = array(
			'instituteID'=>$this->session->userdata('instituteID')
		);

		$where_exam = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'academic_yearID'=>$academic_yearID
		);


		$examschedule = base64_decode($i);
		$this->data['exam_schedule'] = $this->exam_schedule_m->get_exam_schedule_by_id($examschedule, true);
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where_classes);
		$this->data['exams'] = $this->exam_m->get_order_by_exam($where_exam);

		//setting classesID as flash data to get section
		$this->session->set_flashdata('class', base64_encode($this->data['exam_schedule']->classesID));

		//setting sectionID as flash data to select section
		$this->session->set_flashdata('section', base64_encode($this->data['exam_schedule']->sectionID));

		//setting subjectID as flash data to select subject
		$this->session->set_flashdata('subject', base64_encode($this->data['exam_schedule']->subjectID));


		$this->data['title'] = 'Edit Exam Schedule';
		$this->data['subview'] = 'exam/exam_schedule_edit';
		$this->data['script'] = 'exam/exam_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'exam_schedule';
		$this->load->view('main_layout', $this->data);
	}

	function gES() {

		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;
		$classesID = base64_decode($this->input->post('y'));
		$sectionID = base64_decode($this->input->post('z'));
		$result = "";
		if($classesID && $sectionID) {
			$where = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'academic_yearID'=>$academic_yearID,
				'classesID'=>$classesID,
				'sectionID'=>$sectionID
			);
		}
		else {
			$where = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'academic_yearID'=>$academic_yearID,
				'classesID'=>$classesID
			);
		}
	
		$exam_schedules = $this->exam_schedule_m->get_order_by_exam_schedule($where);
		 foreach ($exam_schedules as $exam) {
		 	$result .= "
				<tr id='".$exam->exam_scheduleID."'>
                    <td>".$this->mylibrary->getExamParam($exam->examID, 'name')."</td>
                    <td>".$this->mylibrary->getClassName($exam->classesID)."</td>
                    <td>".$this->mylibrary->getSectionName($exam->sectionID)."</td>
                    <td>".$this->mylibrary->getSubjectParam($exam->subjectID, 'subject_name')."</td>
                    <td>".date('d-M-y', strtotime($exam->date))."</td>
                    <td>".date('h:i A', strtotime($exam->time_from)).' - '.date('h:i A', strtotime($exam->time_to))."</td>
                    <td>".$exam->room."</td>
                    <td class='text-center td-actions'>
                        <a href='".base_url()."exam/schedule_edit/".base64_encode($exam->exam_scheduleID)."'>
                            <button type='button' class='btn btn-info'>
                            	<i class='material-icons'>edit</i>
                            </button>
                        </a>
                        <button id='".$exam->exam_scheduleID."' base='".base_url()."' cm='exam/dest_schedule' type='button' 
                        rel='tooltip' class='btn btn-danger pop'>
                            <i class='material-icons'>close</i>
                        </button>
                    </td>
                </tr>";
		
		 }

		 echo $result;
	}

	// delete exam
	function dest($id=NULL) {

		$examID = $this->input->post('param');
		$this->exam_m->delete($examID);
	}

	//delete exam schedule
	function dest_schedule($id=NULL) {

		$examID = $this->input->post('param');
		$this->exam_schedule_m->delete($examID);
	}

}