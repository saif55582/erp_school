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

	
}