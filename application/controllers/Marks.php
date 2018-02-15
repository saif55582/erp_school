<?php

defined('BASEPATH') or exit('No direct scripting allowed');

class Marks extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}

	
	function index() {
		$where = array('instituteID'=>$this->session->userdata('instituteID'));
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['students'] = '';
		$this->data['title'] = 'Marks';
		$this->data['subview'] = 'marks/mark';
		$this->data['script'] = 'marks/marks_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'mark';
		$this->load->view('main_layout', $this->data);
	}

	function class($ci = null) {

		$where_class = array(
			'instituteID'	=> $this->session->userdata('instituteID')
		);
		$where = array(
			'instituteID'	=> $this->session->userdata('instituteID'),
			'classesID'		=> base64_decode($ci)
		);

		$this->data['classesID'] = '';
		$this->data['section'] = '';
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where_class);
		if($ci) {
			$this->data['students'] = $this->student_m->get_order_by_student($where);
			$this->data['clas'] = (string) base64_decode($ci);
			$this->session->set_flashdata('class', $ci);
		}

		$this->data['title'] = 'Marks';
		$this->data['subview'] = 'marks/mark';
		$this->data['script'] = 'marks/marks_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'mark';
		$this->load->view('main_layout', $this->data);
	}


	function view($sid, $cid) {
		$studentID = base64_decode($sid)/786786;
		$classesID = base64_decode($cid);
		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;

		$where = array(
			'instituteID'		=> $instituteID,
			'academic_yearID'	=> $academic_yearID,
			'studentID'			=> $studentID,
			'classesID'			=> $classesID
		);

		$marks_list = $this->marks_list_m->get_marks_list_single($where);
		if($marks_list)
			$marks_listID = $marks_list->marks_listID;
		else
			$marks_listID = 0;

		$where_marks = array(
			'marks_listID'	=> $marks_listID
		);
		$marks = $this->marks_m->get_order_by_marks($where_marks);

		$array = array('instituteID'=>$instituteID, 'studentID'=>$studentID );
		$where = array(
			'instituteID'=>$instituteID, 
			'studentID'=>$studentID,
			'academic_yearID'=>$academic_yearID
		);
		$where_exam = array(
			'instituteID'	=> $instituteID
		);
		$this->data['studentID'] = $studentID;
		$this->data['classesID'] = $classesID;
		$this->data['marks_listID'] = $marks_listID;
		$this->data['exams'] = $this->exam_m->get_order_by_exam($where_exam);
		$this->data['student'] = $this->student_m->get_single_student($array);
		$this->data['attendances'] = $this->attendance_stud_m->get_attendance_stud_where($where);
		$this->data['title'] = 'View Marks';
		$this->data['subview'] = 'marks/marks_view';
		$this->data['script'] = 'marks/marks_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'mark';
		$this->load->view('main_layout', $this->data);
	}

	function getMarks() {
		$examID = base64_decode($this->input->post('ei'));
		$marks_listID = $this->input->post('mli');
		$where = array(
			'marks_listID'	=> $marks_listID,
			'examID'		=> $examID,
		);
		$marks = $this->marks_m->get_order_by_marks($where);
		if(!$marks) {
			echo "
					<tr>
						<td></td>
						<td class='text-center td-actions'><center><p class='text-danger'> Marks Not found</p></center></td>
						<td></td>
					</tr>
				";
		}
		$result = '';
		foreach ($marks as $mark) {
			$result .= "
				<tr>
					<td>".$mark->subjectID."</td>
					<td>".$this->mylibrary->getParam('subject_m', $mark->subjectID, 'subject_name')."</td>
					<td class='text-center td-actions'>".$mark->mark."</td>
				</tr>
			";
		}
		echo $result;
	}

	// Add marks page render
	function add_marks($classesID=null, $sectionID=null, $examID=null, $subjectID=null) {

		$this->data['students'] = '';
		$this->data['classesID'] = '';
		$this->data['section'] = '';
		$this->data['subjects'] = '';
		$this->data['examID'] = '';
		$this->data['subjectID'] = '';
		$this->data['marks'] = '';
		$this->data['m_array'] = array();

		if($classesID && $sectionID && $examID && $subjectID) {

			$where = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'classesID'=>base64_decode($classesID),
				'sectionID'=>base64_decode($sectionID)
			);

			$sub = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'classesID'=>base64_decode($classesID)
			);

			$this->data['clas'] = (string) base64_decode($classesID);
			$this->data['section'] = (string) base64_decode($sectionID);
			$this->session->set_flashdata('class', $classesID);
			$this->session->set_flashdata('section', $sectionID);
			$this->session->set_flashdata('subject', $subjectID);
			$this->data['subjects'] = $this->subject_m->get_order_by_subject($sub);
			$this->data['students'] = $this->student_m->get_order_by_student($where);

			if($examID){
			 	$this->data['examID'] = base64_decode($examID);
			 }

			if($subjectID){
			 	$this->data['subjectID'] = base64_decode($subjectID);
			 }

			$instituteID = $this->session->userdata('instituteID');
			$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
			$academic_yearID = $institute->academic_yearID;

			$marks_listID = array();
			$marks = array();

			foreach ($this->data['students'] as $student) {
			 	$array = array(
					'instituteID'		=> $instituteID,
					'academic_yearID'	=> $academic_yearID,
					'studentID'			=> $student->studentID,
					'classesID'			=> $student->classesID,
					'sectionID'			=> $student->sectionID
				);

			 	$a = $this->marks_list_m->get_marks_list_single($array);
				if($a) {
					$marks_listID[] = $a->marks_listID;

				}
				else {
					$marks_listID[] = $this->marks_list_m->insertMarksList($array);
				}
			 }

			 foreach($marks_listID as $ml) {
			 	 $marks_array = array(
						'marks_listID' 	=> $ml,
						'examID' 		=> $this->data['examID'],
						'subjectID'		=> $this->data['subjectID']
					);
				$marks_row = $this->marks_m->get_marks_single($marks_array);
				if($marks_row) {
					$marks[] = $marks_row->mark;
				}
				else{
					$marks[] = 0;
					$this->marks_m->insertMarks($marks_array);
				}
			 }
			$this->data['m_array'] = $marks;
		}

		$where = array('instituteID'=>$this->session->userdata('instituteID'));
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['exams'] = $this->exam_m->get_order_by_exam($where);
		$this->data['title'] = 'Add Marks';
		$this->data['subview'] = 'marks/marks_add';
		$this->data['script'] = 'marks/marks_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'exam';
		$this->data['a1'] = 'exam';
		$this->data['div1'] = 'exam';
		$this->data['li2'] = 'mark';
		$this->load->view('main_layout', $this->data);
	}

	//get students row and insert into marks table
	function gStAddMarks() {
		$classesID = base64_decode($this->input->post('y'));
		$sectionID = base64_decode($this->input->post('z'));
		$subjectID = base64_decode($this->input->post('s'));
		$subject_array = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'subjectID'=>$subjectID
		);
		$subject = $this->subject_m->get_subject_single($subject_array);
		$result = "";
		if($classesID && $sectionID) {
			$where = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'classesID'=>$classesID,
				'sectionID'=>$sectionID
			);
		}
		else {

			$where = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'classesID'=>$classesID
			);
		}
	
		$students = $this->student_m->get_order_by_student($where);
		 foreach ($students as $student) {

		 
		 	$result .= "
				<tr id='".$student->studentID."'>
                    <td>";
                            if($student->photo == 'default.png') {
                            	$result .= "<img  src='".base_url()."/main_asset/assets/img/default.png' alt='' class='img img-' style='width:50px;margin:-10px;'>";
                            }
                            else {
                            	$result .= "<img src='".base_url()."/main_asset/school_docs/".$this->session->userdata('instituteID')."/student/".$student->photo."' alt='' class='img' style='width:60px;margin:-10px;'>";
                            }
        $result .= "</td>
                    <td>".strtoupper($student->f_name.' '.$student->l_name)."</td>
                    <td>".$student->roll_no."</td>
                    <td>".$student->reg_no."</td>
                    <td class='text-center td-actions'>
                        <input type='text' id='marks_obtained'>
                        <input type='hidden' id='student' value='".base64_encode($student->studentID*786786)."'>
                    </td>
                </tr>";
		 }
		 
		 echo $result;
	}   

	## ad marks for student 
	function aM() {

		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;

		$examID 	= base64_decode($this->input->post('a'));
		$classesID 	= base64_decode($this->input->post('b'));
		$sectionID 	= base64_decode($this->input->post('c'));
		$subjectID 	= base64_decode($this->input->post('d'));
		$student 	= $this->input->post('e');
		$mark  	= $this->input->post('f');

		$marks = explode(',', $mark);
		$arr = explode(',', $student);
		$students = array();
		$check = array();

		foreach($arr as $student) {
			$students[] = base64_decode($student)/786786;
		}

		for($i=0; $i<count($students);$i++) {

			$array = array(
				'instituteID'		=> $instituteID,
				'academic_yearID'	=> $academic_yearID,
				'studentID'			=> $students[$i],
				'classesID'			=> $classesID,
				'sectionID'			=> $sectionID
			);
			$marks_list = $this->marks_list_m->get_marks_list_single($array);
			$marks_listID =  $marks_list->marks_listID;
			
			##Checking if a row exists in marks table for corresponding marks_list
			$check_marks = array(
				'marks_listID' 	=> $marks_listID,
				'examID' 		=> $examID,
				'subjectID'		=> $subjectID
			);

			$marks_row = $this->marks_m->get_marks_single($check_marks);
			if($marks_row) {
				$marksID = $marks_row->marksID;
				$marks_array = array(
					'mark'			=> $marks[$i]
				);
				$check[$i] = $this->marks_m->updateMarks($marks_array, $marksID);
			}
		}
		if(array_sum($check) == count($students))
			echo 'done';
	}

}