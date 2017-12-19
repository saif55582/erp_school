<?php

defined('BASEPATH') OR exit('Scripting not allowed');

class Mylibrary {

	protected $CI;

	public function __construct() {

		$this->CI = & get_instance();
		$this->CI->load->library('session');
		$this->CI->load->model('classes_m');
		$this->CI->load->model('section_m');
		$this->CI->load->model('teacher_m');
		$this->CI->load->model('student_m');
	}

	public function isLoggedIn() {

		return (bool) $this->CI->session->userdata('loggedin');
	}

	public function getClassName($classesID) {
        $where = array(
            'instituteID'=>$this->CI->session->userdata('instituteID'),
            'classesID'=>$classesID
        );
        $classes = $this->CI->classes_m->get_single_class($where);
        return $classes->class_name;
	}

	public function getSectionName($sectionID) {
		$where = array(
            'instituteID'=>$this->CI->session->userdata('instituteID'),
            'sectionID'=>$sectionID
        );
        $section = $this->CI->section_m->get_single_section($where);
        return $section->section_name;
	}

	public function getTeacherName($teacherID) {
		$where = array(
            'instituteID'=>$this->CI->session->userdata('instituteID'),
            'teacherID'=>$teacherID
        );
        $teacher = $this->CI->teacher_m->get_teacher_single($where);
        return $teacher->name;
	}

	public function getTeacherParam($teacherID, $col) {
		$where = array(
            'instituteID'=>$this->CI->session->userdata('instituteID'),
            'teacherID'=>$teacherID
        );
        $teacher = $this->CI->teacher_m->get_teacher_single($where);
        return isset($teacher->$col) ? $teacher->$col : '---';

	}

	public function getStudentParam($studentID, $col1) {
		$where = array(
            'instituteID'=>$this->CI->session->userdata('instituteID'),
            'studentID'=>$studentID
        );
    	$student = $this->CI->student_m->get_single_student($where);
    	//return isset($student->$col1) ? $student->$col1 : '---';
    	if($student->$col1) {
    		return $student->$col1;
    	}else {
    		return '--';
    	}

	}

	
}