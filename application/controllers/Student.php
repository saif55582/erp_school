<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Student extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}

	function rulesAdd() {
		$rules = array(
			array(
				'field'=>'f_name',
				'label'=>'First Name',
				'rules'=>'required'
			),
			array(
				'field'=>'l_name',
				'label'=>'Last Name',
				'rules'=>'required'
			),
			array(
				'field'=>'photo',
				'label'=>'Student Photo',
				'rules'=>'callback_upload'
			)
		);
		return $rules;
	}

	function index() {
		$this->data['students'] = $this->student_m->get_order_by_student();
		$this->data['title'] = 'Student';
		$this->data['subview'] = 'student/student';
		$this->data['script'] = 'student/student_js';
		$this->data['active'] = 'student';
		$this->data['subactive'] = '';
		$this->load->view('main_layout', $this->data);

	}

	function renderAdd() {
		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['sections'] = $this->section_m->get_section_by(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['title'] = 'Add Student';
		$this->data['subview'] = 'student/student_add';
		$this->data['script'] = 'student/student_js';
		$this->data['active'] = 'student';
		$this->load->view('main_layout', $this->data);
	}

	function deleteStudent($id=NULL) {
		$teacherID = $this->input->post('id');
		$this->student_m->delete($teacherID);
	}

	function doc_upload() {
		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['doc_file']['name']);
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['doc_file']['name'] = $files['doc_file']['name'][$i];
			$_FILES['doc_file']['type']= $files['doc_file']['type'][$i];
			$_FILES['doc_file']['tmp_name']= $files['doc_file']['tmp_name'][$i];
			$_FILES['doc_file']['error']= $files['doc_file']['error'][$i];
			$_FILES['doc_file']['size']= $files['doc_file']['size'][$i];    

			$config = array();
			$config['upload_path'] = 'main_asset/school_docs/'.$this->session->userdata('instituteID').'/student';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = '2045';
			$config['file_name'] = date('Y-m-d-H-i-s').random_string('alpha',15);
			$config['overwrite'] = true;

			$this->upload->initialize($config);
			if($this->upload->do_upload('doc_file')) {
				$fileData = $this->upload->data();
				$uploadData[$i] = $fileData['file_name'];
			}
		}
		return $uploadData;
	}

	function upload() {
		if($_FILES["photo"]['name'] !="") {
			$file_name = $_FILES["photo"]['name'];
			$explode = explode('.', $file_name);
			$file_name_rename = random_string('alpha',15);
			if(count($explode) >= 2) {
				$new_file = $file_name_rename.'.'.end($explode);
				$config['upload_path'] = "./main_asset/school_docs/".$this->session->userdata('instituteID').'/student';
				$config['allowed_types'] = "gif|jpg|png|jpeg";
				$config['file_name'] = date('Y-m-d-H-i-s').$new_file;
				$config['max_size'] = '2048';
				$config['max_width'] = '3000';
				$config['max_height'] = '3000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload("photo")) {
					$this->form_validation->set_message("upload", $this->upload->display_errors());
	     			return FALSE;
				} else {
					$this->upload_data['file'] =  $this->upload->data();
					return TRUE;
				}
			} else {
				$this->form_validation->set_message("upload", "Invalid file");
	     		return FALSE;
			}
		} else {
			//$this->form_validation->set_message('upload','Image is required.');
			//return false;
			$this->upload_data['file']['file_name'] = 'default.png';
			return true;
			
		}
	}

	function add() {
		if($_POST) {
			$rules = $this->rulesAdd();
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == FALSE) {
				 $path =  "./main_asset/school_docs/".$this->session->userdata('instituteID').'/student/'.$this->upload_data['file']['file_name'];
				 unlink($path);
				$this->renderAdd();
			}
			else {
				$array = array(
					'f_name'=>$this->input->post('f_name'),
					'l_name'=>$this->input->post('l_name'),
					'dob'=>$this->input->post('dob'),
					'gender'=>$this->input->post('gender'),
					'blood'=>$this->input->post('blood'),
					'age'=>$this->input->post('age'),
					'address'=>$this->input->post('address'),
					'father_name'=>$this->input->post('father_name'),
					'father_phone'=>$this->input->post('father_phone'),
					'father_job'=>$this->input->post('father_job'),
					'father_aadhar'=>$this->input->post('father_aadhar'),
					'mother_name'=>$this->input->post('mother_name'),
					'mother_phone'=>$this->input->post('mother_phone'),
					'mother_job'=>$this->input->post('mother_job'),
					'mother_aadhar'=>$this->input->post('mother_aadhar'),
					'reg_no'=>$this->input->post('reg_no'),
					'roll_no'=>$this->input->post('roll_no'),
					'sectionID'=>$this->input->post('sectionID'),
					'classesID'=>$this->input->post('classesID'),
					'doj'=>$this->input->post('doj')
				);
				$array['photo'] = $this->upload_data['file']['file_name'];
				//echo $this->upload();
				#preparing documents
				$doc_name = $this->input->post('doc_name');
				$documents = array();
				if(array_filter($doc_name)) {
					$doc_file = $this->doc_upload();
					for($i=0;$i<count($doc_name);$i++) {
						$documents[$i] = array(
							$doc_name[$i]=>$doc_file[$i]
						);
					}
					$array['documents'] = serialize($documents);
				}
				//print_r($array);die();
				
				$this->student_m->insertStudent($array);
				redirect('student');

			}
		}
		else {
			$this->renderAdd();
		}
	}



}