<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Classes extends MY_Controller {

	function __construct() {

		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			
			redirect('signin');
		}
	}

	function rules() {

		$rules = array(
			array(
				'field' =>'class_name',
				'label' =>'Class Name',
				'rules' =>'trim|required|xss_clean|max_length[40]|alpha_numeric|callback_check_unique[class_name]'
			),
			array(
				'field' =>'teacherID',
				'label' =>'Class Incharge',
				'rules' =>'trim|xss_clean|max_length[50]'
			),
			array(
				'field' =>'max_student',
				'label' =>'Max Students',
				'rules' =>'trim|required|xss_clean|max_length[20]|integer'
			),
			array(
				'field' =>'note',
				'label' =>'Note',
				'rules' =>'trim|xss_clean|max_length[150]|alpha_numeric_spaces'
			)
		);

		return $rules;
	}

	function check_unique($param,$column) {
		if($param === '0') {
			$this->form_validation->set_message('check_unique','The %s field is required');
			return false;
		}
		else {
			$where = array($column => $param,'instituteID'=>$this->session->userdata('instituteID'));
			$row = $this->classes_m->get_single(array($column => $param,'instituteID'=>$this->session->userdata('instituteID')));
			if($row) {
				$this->form_validation->set_message('check_unique', '%s already exists.');
				return false;
			}
			else
				return true;
		}
	}

	function rulesEdit() {

		$rules = array(
			array(
				'field' =>'class_name',
				'label' =>'Class Name',
				'rules' =>'trim|required|xss_clean|max_length[40]|alpha_numeric|callback_check_unique_with_id[class_name]'
			),
			array(
				'field' =>'teacherID',
				'label' =>'Class Incharge',
				'rules' =>'trim|xss_clean|max_length[50]'
			),
			array(
				'field' =>'max_student',
				'label' =>'Max Students',
				'rules' =>'trim|required|xss_clean|max_length[20]|integer'
			),
			array(
				'field' =>'note',
				'label' =>'Note',
				'rules' =>'trim|xss_clean|max_length[150]|alpha_numeric_spaces'
			)
		);

		return $rules;
	}

	function check_unique_with_id($param,$column) {
		$classesID =  $this->input->post('perm');
		if($param === '0') {
			$this->form_validation->set_message('check_unique_with_id','The %s field is required');
			return false;
		}
		else {
			$h = "class_name = '".$param."' and classesID != ".$classesID." and instituteID = ".$this->session->userdata('instituteID');

			$row = $this->classes_m->get_single($h);
			if($row) {
				$this->form_validation->set_message('check_unique_with_id', '%s already exists.');
				return false;
			}
			else {
				return true;
			}
		}
	}

	function index() {
		$instituteID = $this->session->userdata('instituteID');
		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$instituteID));
		$this->data['teachers'] = $this->teacher_m->get_order_by_teacher(array('instituteID'=>$instituteID));
		$this->data['title'] = 'Class';
		$this->data['subview'] = 'academics/class';
		$this->data['script'] = 'academics/class_js';
		$this->data['active'] = 'academics';
		$this->data['subactive'] = 'class';
		$this->load->view('main_layout', $this->data);
	}

	function addClass() {
		$rules = $this->rules();
		$this->data['form_validation'] = '';
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('reply','error');
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
			//print_r($array);die();
			$this->classes_m->insert_class($array);
			$this->session->set_flashdata('reply','success');
			redirect('classes');
		}
	}

	function editClass() {
		$classesID = $this->input->post('perm');
		$rules = $this->rulesEdit();
		$this->data['form_validation'] = '';
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('reply_edit','error');
			$this->session->set_flashdata('open_modal',$this->input->post('perm'));

			//collecting form data and setting it in session an mark is as temp data
			$class_name = form_error('class_name');
			$max = form_error('max_student');
			$note_edit = form_error('note');
			$this->session->set_userdata('class_name_edit', $class_name);
			$this->session->set_userdata('max_student_edit', $max);
			$this->session->set_userdata('note_edit',$note_edit);
			$this->session->mark_as_temp('class_name_edit', 20);
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
			$this->classes_m->update_class($array,$classesID);
			$this->session->set_flashdata('reply_edit','success');
			redirect('classes');
		}

	}

	function sendEditForm() {
		$class_name = $this->session->userdata('class_name_edit');
		$max_student = $this->session->userdata('max_student_edit');
		$note = $this->session->userdata('note_edit');

		$classesID = $this->input->post('id');
		$row = $this->classes_m->get_class_by_id($classesID,true);
		$result = '';
		$result .= "<form method='post' class='classform2' action='".base_url('classes/editClass')."'>
					<input type='hidden' value='".$row->classesID."' name='perm'>
                    <div class='form-group label-floating'>
                        <label class='control-labe'>Class Name: <span class='text-danger'>*</span></label>
                        <input type='text' class='form-control up_case' name='class_name' id='class_name' value='".$row->class_name."'>
                        <h7 id='class_name_edit' class='text-danger'>".$class_name."</h7>
                    </div>

                    <div class='form-group label-floating'>
                        <label class='control-labe'>Class Incharge: <span class='text-danger'>*</span></label>
                        <select name='teacherID'  data-live-search='true' class='selectpicker' data-style='select-with-transition' title=' '>
                        	 <option value=''>---</option>";
                        	$teachers = $this->teacher_m->get_order_by_teacher(array('instituteID'=>$this->session->userdata('instituteID')));
                            foreach ($teachers as $teacher) {
                            	if($teacher->teacherID == $row->teacherID) {
                            		$result .= "<option selected value='".$teacher->teacherID."'>".$teacher->name."</option>";
                            	}
                            	else {
                            		$result .= "<option value='".$teacher->teacherID."'>".$teacher->name."</option>";
                            	}
                        		
                            }
             $result .= "</select>
                        <h7 class='text-danger'><?= form_error('teacherID')?></h7>
                    </div>                       
                    <div class='form-group label-floating'>
                        <label class='control-labe'>Max Students: <span class='text-danger'>*</span></label>
                        <input type='text' class='form-control up_case' name='max_student' value='".$row->max_student."'>
                        <h7 id='max_student_edit' class='text-danger'>".$max_student."</h7>
                    </div>
                    <div class='form-group label-floating'>
                        <label class='control-labe'>Note: </label>
                        <input type='text' class='form-control up_case' name='note' value='".$row->note."'>
                        <h7 id='note_edit' class='text-danger'>".$note."</h7>
                    </div>
                    <button id='sub' type='submit' class='btn btn-success btn-sm'>Update</button>
                </form>";
            echo $result;
	}

	function deleteClass() {
		$id = $this->input->post('id');
		$this->classes_m->delete_class($id);
	}

	

}

