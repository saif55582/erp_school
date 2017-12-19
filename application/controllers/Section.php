<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Section extends MY_Controller {



	function __construct() {

		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}

	}

	function index() {
		$instituteID = $this->session->userdata('instituteID');
		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$instituteID));
		$this->data['sections'] = $this->section_m->get_section_by(array('instituteID'=>$instituteID));
		$this->data['teachers'] = $this->teacher_m->get_order_by_teacher(array('instituteID'=>$instituteID));
		$this->data['title'] = 'Section';
		$this->data['subview'] = 'academics/section';
		$this->data['script'] = 'academics/section_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'section';
		$this->load->view('main_layout', $this->data);
	}

	function rules_insert() {

		$rules = array(
			array(
				'field'=>'classesID',
				'label'=>'Class',
				'rules'=>'trim|required|xss_clean'
			),
			array(
				'field'=>'section_name',
				'label'=>'Section Name',
				'rules'=>'trim|required|xss_clean|alpha_numeric|callback_check_unique[classesID]'
			),
			array(
				'field'=>'teacherID',
				'label'=>'Teacher',
				'rules'=>'trim|required|xss_clean'
			),
			array(
				'field'=>'max_student',
				'label'=>'Max Students',
				'rules'=>'trim|xss_clean|required|numeric'
			),
			array(
				'field'=>'note',
				'label'=>'Note',
				'rules'=>'trim|xss_clean|alpha_numeric_spaces'
			),
		);
		return $rules;
	}

	function check_unique($param,$column) {
		$classesID = $this->input->post('classesID');
		if(!$param and !$classesID) {
			$this->form_validation->set_message('check_unique','The %s field is required');
			return false;
		}
		else {
			if(!$classesID){
				$this->form_validation->set_message('check_unique','');
				return false;
			}
			$where = "section_name = '".$param."' and classesID = ".$classesID." and instituteID = ".$this->session->userdata('instituteID');
			$row = $this->section_m->get_single($where);
			print_r($row);
			if($row) {
				$this->form_validation->set_message('check_unique', '%s already exists.');
				return false;
			}
			else
				return true;
		}
	}


	function rules_edit() {

		$rules = array(
			array(
				'field'=>'section_name',
				'label'=>'Section Name',
				'rules'=>'trim|required|xss_clean|alpha_numeric|callback_check_unique_with_id'
			),
			array(
				'field'=>'classesID',
				'label'=>'Class',
				'rules'=>'trim|required|xss_clean'
			),
			array(
				'field'=>'teacherID',
				'label'=>'Teacher',
				'rules'=>'trim|required|xss_clean'
			),
			array(
				'field'=>'max_student',
				'label'=>'Max Students',
				'rules'=>'trim|xss_clean|required|numeric'
			),
			array(
				'field'=>'note',
				'label'=>'Note',
				'rules'=>'trim|xss_clean|alpha_numeric_spaces'
			)
		);

		return $rules;
	}	

	

	function check_unique_with_id($param) {

		$sectionID =  $this->input->post('perm');
		$classesID = $this->input->post('classesID');
		if($param === '0') {
			$this->form_validation->set_message('check_unique_with_id','The %s field is required');
			return false;
		}
		else {
			$h = "section_name = '".$param."' and sectionID != ".$sectionID. " and classesID = ".$classesID." and instituteID = ".$this->session->userdata('instituteID');

			$row = $this->section_m->get_single($h);
			if($row) {
				$this->form_validation->set_message('check_unique_with_id', '%s already exists.');
				return false;
			}
			else {
				return true;
			}
		}
	}


	function getSection() {
		$classesID = $this->input->post('classesID');
		$index = 1;
		$result = '';
		$sections = $this->section_m->get_section_by(array('classesID'=>$classesID,'instituteID'=>$this->session->userdata('instituteID')));

		if(!$sections)
			echo 'nosection';
		else {
			foreach ($sections as $section) :
		$result .= "    
				<tr id='".$section->sectionID."'>
				<td>".strtoupper($section->section_name)."</td>
				<td>";
				    $teacher = $this->teacher_m->get_teacher_by_id($section->teacherID);
				    if(($teacher->name)) {
				        $result .= strtoupper($teacher->name);
				    }
				    else
				        $result .= '----';
	$result .= "</td>
				<td>".$section->max_student."</td>
				<td>".$section->note."</td>
				<td class='text-center'>
				<a href='#' onclick='getEdit(".$section->sectionID.");' data-toggle='modal' data-target='#supportModal' class='btn mybtn btn-info btn-icon'><i class='material-icons'>edit</i></a>
				<a href='#' id='". $section->sectionID."' onclick='del(this.id);;' class='btn mybtn btn-danger btn-icon remove'><i class='material-icons'>close</i></a>
				</td>
				</tr>";
			endforeach;

				echo $result;
		}
		
	}

	function insertSection() {

		$rules = $this->rules_insert();
		$classesID =  $this->input->post('classesID');
		//$this->form_validation->set_rules($rules);
		$this->data['form_validation'] = '';
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('reply_insert','error');
			// $this->session->set_flashdata('classesID',$classesID);
			$this->session->set_flashdata('section_name',set_value('section_name'));
			$this->index();
			//redirect('classes');
		}
		else {
			$array = array();
			for($i=0;$i<count($rules);$i++) {
				if($this->input->post($rules[$i]['field']) == FALSE) {
					$array[$rules[$i]['field']] = NULL;
				}
				else {
						$array[$rules[$i]['field']] = $this->input->post($rules[$i]['field']);
				}
			}
			
			$array['instituteID'] = $this->session->userdata('instituteID');
			$classesID =  $array['classesID'];
			$this->session->set_flashdata('classesID',$classesID);
			$this->section_m->insertSection($array);
			$this->session->set_flashdata('reply_insert','success');
			redirect('section');
		}
	}

	function deleteSection() {
		$sectionID = $this->input->post('id');
		$this->section_m->deleteSection($sectionID);
	}

	function editSection() {
		$sectionID = $this->input->post('perm');
		$classesID =  $this->input->post('classesID');
		$rules = $this->rules_edit();
		$this->data['form_validation'] = array();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('reply_edit','error');
			$this->session->set_flashdata('open_modal',$this->input->post('perm'));
			$this->session->set_flashdata('classesID',$classesID);
			//collecting form data and setting it in session an mark is as temp data
			$s_n_edit = form_error('section_name');
			$max = form_error('max_student');
			$note_edit = form_error('note');
			$this->session->set_userdata('section_name_edit', $s_n_edit);
			$this->session->set_userdata('max_student_edit', $max);
			$this->session->set_userdata('note_edit',$note_edit);
			$this->session->mark_as_temp('section_name_edit', 20);
			$this->session->mark_as_temp('max_student_edit',20);
			$this->session->mark_as_temp('note_edit',20);
			$this->index();
			//redirect('classes');
		}
		else {
			$array = array();
			for($i=0;$i<count($rules);$i++) {
				if($this->input->post($rules[$i]['field']) == FALSE) {
					$array[$rules[$i]['field']] = NULL;
				}
				else {
						$array[$rules[$i]['field']] = $this->input->post($rules[$i]['field']);
				}
			}

			$classesID =  $array['classesID'];
			$this->session->set_flashdata('classesID',$classesID);
			$this->section_m->updateSection($array,$sectionID);
			$this->session->set_flashdata('reply_edit','success');
			redirect('section');
		}

	}

	function editForm() {
		$section_name_edit =  $this->session->userdata('section_name_edit');
		$max_student_edit =  $this->session->userdata('max_student_edit');
		$note_edit = $this->session->userdata('note_edit');
		$sessionID = $this->input->post('sectionID');
		$section = $this->section_m->get_section($sessionID,TRUE);
		$result = "";
		$result .= "
		<form method='post' class='classform form-horizontal' action='".base_url('section/editSection')."'>
			<input type='hidden' value='".$section->sectionID."' name='perm'>
            <div class='form-group label-floating'>
                <label class='label-on-left'>Section Name: <span class='text-danger'>*</span></label>
                <input type='text' value='".$section->section_name."' class='form-control up_case' name='section_name' id='section_name'>
                <h7 id='section_name_edit' class='text-danger'>". $section_name_edit ."</h7>
            </div>

            <div onclick='setFocus();' class='form-group label-floating'>
                <label class='control-labe'>Class: <span class='text-danger'>*</span></label>
                <select name='classesID'  data-live-search='true' class='selectpicker' data-style='select-with-transition' title=' '>";
                $classes = $this->classes_m->get_order_by_classes(array('instituteID'=>$this->session->userdata('instituteID')));
                    foreach ($classes as $class) {
                    	if($class->classesID == $section->classesID) {
                        	$result .= "<option selected value='".$class->classesID."'>".strtoupper($class->class_name)."</option>";
                        }
                        else {
                        	$result .= "<option value='".$class->classesID."'>".strtoupper($class->class_name)."</option>";
                        }	
                    }
    $result .="</select>
                <h7 class='text-danger'><?= form_error('classesID')?></h7>
            </div>    

            <div class='form-group label-floating'>
                <label class='control-labe'>Teacher: <span class='text-danger'>*</span></label>
                <select name='teacherID'  data-live-search='true' class='selectpicker' data-style='select-with-transition' title=' '>";
                $instituteID = $this->session->userdata('instituteID');
                	$teachers = $this->teacher_m->get_order_by_teacher(array('instituteID'=>$instituteID));
                    foreach ($teachers as $teacher) {
                    	if($teacher->teacherID == $section->teacherID) {
	                        $result .= "<option selected value='".$teacher->teacherID."'>".$teacher->name." (".$teacher->teacherID.")</option>";
	                    }
	                    else {
	                    	$result .= "<option  value='".$teacher->teacherID."'>".$teacher->name." (".$teacher->teacherID.")</option>";
	                    }
                    }
               $result .= "</select>
                <h7 class='text-danger'><?= form_error('teacherID')?></h7>
            </div>     

            <div class='form-group label-floating'>
                <label class='control-labe'>Max Students: <span class='text-danger'>*</span></label>
                <input value='".$section->max_student."' type='text' class='form-control up_case' name='max_student'>
                <h7 id='max_student_edit' class='text-danger'>". $max_student_edit ."</h7>
            </div>
            <div class='form-group label-floating'>
                <label class='control-labe'>Note: </label>
                <input value='".$section->note."' type='text' class='form-control up_case' name='note'>
                <h7 id='note_edit' class='text-danger'>".$note_edit."</h7>
            </div>
            <button type='submit' class='btn btn-success btn-sm'>Add</button>
        </form>";
        echo $result;
	}

	function gS() {
		$classesID =  base64_decode($this->input->post('ci'));
		$instituteID = $this->session->userdata('instituteID');
		$sections = $this->section_m->get_section_by(array('classesID'=>$classesID,'instituteID'=>$instituteID));
		$section = array();
		foreach ($sections as $sec) {
			$section[] = array(
				'section_name'=>$sec->section_name,
				'sectionID'=>base64_encode($sec->sectionID),
				'classesID'=>$sec->classesID
			);
		}
		echo json_encode($section);
	}
}
