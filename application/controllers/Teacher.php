<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Teacher extends MY_Controller {


	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}

	function rulesAdd() {
		$rules = array(
			array(
				'field'=>'name',
				'label'=>'Name',
				'rules'=>'required|trim|xss_clean|alpha_numeric_spaces'
			),
			array(
				'field'=>'designation',
				'label'=>'Designation',
				'rules'=>'required|trim|xss_clean|alpha_numeric_spaces'
			),
			array(
				'field'=>'dob',
				'label'=>'DOB',	
				'rules'=>'required|trim|xss_clean'
			),
			array(
				'field'=>'sex',
				'label'=>'Gender',
				'rules'=>'required|trim|xss_clean'
			),
			array(
				'field'=>'religion',
				'label'=>'Religion',
				'rules'=>'trim|xss_clean|alpha_numeric_spaces'
			),
			array(
				'field'=>'email',
				'label'=>'Email',
				'rules'=>'required|trim|xss_clean|valid_email|callback_unique[email]'
			),
			array(
				'field'=>'phone',
				'label'=>'Phone',
				'rules'=>'required|trim|xss_clean|numeric'
			),
			array(
				'field'=>'doj',
				'label'=>'Joining Date',
				'rules'=>'required|trim|xss_clean'
			),
			array(
				'field'=>'address',
				'label'=>'Address',
				'rules'=>'required|trim|xss_clean|alpha_numeric_spaces'
			),
			array(
				'field'=>'photo',
				'label'=>'Teacher Image',
				'rules'=>'callback_upload'
			)
		);
		return $rules;
	}

	function unique($param,$field) {
		$array = array(
			$field=>$param,
			'instituteID'=>$this->session->userdata('instituteID')
		);
		$check = $this->teacher_m->get_teacher_single($array);
		if(count($check)) {
			$this->form_validation->set_message('unique','Email Already exists');
			return false;
		}
		else
			return true;
	}

	function upload($param) {
		if($_FILES["photo"]['name'] !="") {
			$file_name = $_FILES["photo"]['name'];
            $explode = explode('.', $file_name);
            $file_name_rename = random_string('alpha',15);
            if(count($explode) >= 2) {
	            $new_file = $file_name_rename.'.'.end($explode);
				$config['upload_path'] = "./main_asset/school_docs/".$this->session->userdata('instituteID').'/teacher';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
			$this->upload_data['file']['file_name'] = 'default.png';
			return true;
			
		}
	}

	function index() {
		$instituteID = $this->session->userdata('instituteID');
		$this->data['teachers'] = $this->teacher_m->get_order_by_teacher(array('instituteID'=>$instituteID));
		$this->data['title'] = 'Teacher';
		$this->data['subview'] = 'teacher/teacher';
		$this->data['script'] = 'teacher/teacher_js';
		$this->data['active'] = 'teacher';
		$this->data['subactive'] = '';
		$this->load->view('main_layout', $this->data);
	}

	function renderAdd() {
		$this->data['title'] = 'Add Teacher';
		$this->data['subview'] = 'teacher/teacher_add';
		$this->data['script'] = 'teacher/teacher_js';
		$this->data['active'] = 'teacher';

		$this->load->view('main_layout', $this->data);
	}


	function renderEdit($id=NULL) {
		$this->data['teacher'] = $this->teacher_m->get_teacher_by_id($id,true);
		if($this->data['teacher']) {
			$this->data['title'] = 'Edit Teacher';
			$this->data['subview'] = 'teacher/teacher_edit';
		}
		else {
			$this->data['title'] = 'Page Not Found';
			$this->data['subview'] = 'not_found';
		}
		$this->data['script'] = 'teacher/teacher_js';
		$this->data['active'] = 'teacher';
		$this->load->view('main_layout', $this->data);
	}


	function deleteTeacher($id=NULL) {
		$teacherID = $this->input->post('id');
		$instituteID = $this->session->userdata('instituteID');
		$teacher = $this->teacher_m->get_teacher_single(array('teacherID'=>$teacherID,'instituteID'=>$instituteID));
		
		$path = 'main_asset/school_docs/'.$this->session->userdata('instituteID').'/teacher/';
		if($teacher->photo != 'default.png') {
			unlink($path.$teacher->photo);
		}
		if($teacher->documents) {
			$documents = unserialize($teacher->documents);
			foreach($documents as $docs) {
				foreach($docs as $name=>$file) {
					unlink($path.$file);
				}
			}
		}
		$this->teacher_m->delete($teacherID);
	}

	function do_upload() {      
	    $this->load->library('upload');
	    $files = $_FILES;
	    $cpt = count($_FILES['doc_file']['name']);
	    for($i=0; $i<$cpt; $i++)
	    {           
	        $_FILES['doc_file']['name']= $files['doc_file']['name'][$i];
	        $_FILES['doc_file']['type']= $files['doc_file']['type'][$i];
	        $_FILES['doc_file']['tmp_name']= $files['doc_file']['tmp_name'][$i];
	        $_FILES['doc_file']['error']= $files['doc_file']['error'][$i];
	        $_FILES['doc_file']['size']= $files['doc_file']['size'][$i];    

	        $config = array();
		    $config['upload_path'] = 'main_asset/school_docs/'.$this->session->userdata('instituteID').'/teacher';
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


	function add() {
		if($_POST) {
			$rules = $this->rulesAdd();
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == FALSE) {
				$this->renderAdd();
			}
			else {
				$array = array();
				$array['instituteID'] = $this->session->userdata('instituteID');
				$array['name'] = $this->input->post('name');
				$array['designation'] = $this->input->post('designation');
				$array['dob'] = $this->input->post('dob');
				$array['sex'] = $this->input->post('sex');
				$array['religion'] = $this->input->post('religion');
				$array['email'] = $this->input->post('email');
				$array['phone'] = $this->input->post('phone');
				$array['doj'] = $this->input->post('doj');
				$array['photo'] = $this->upload_data['file']['file_name'];
				$array['username'] = $this->input->post('email');
				$array['password'] = random_string('alnum',10);
				$array['address'] = $this->input->post('address');
				# preparing documents
				$doc_name = $this->input->post('doc_name');
				$documents = array();
				if(array_filter($doc_name)) {
					$doc_file = $this->do_upload();
					for($i=0;$i<count($doc_name);$i++) {
						$documents[$i] = array(
							$doc_name[$i]=>$doc_file[$i]
						);
					}
					$array['documents'] = serialize($documents);
				}
				//print_r($array);die();
				$this->teacher_m->insertTeacher($array);
				redirect('teacher');

			}
		}
		else {
			$this->renderAdd();
		}
	}

	function edit($id=NULL) {
		
		if($_POST) {
			if(!$this->form_validation->run() == FALSE) {
				$this->renderEdit($id);
			}
			else {

				$array = array();
				$id = $this->input->post('tui');
				$array['name'] = $this->input->post('name');
				$array['designation'] = $this->input->post('designation');
				$array['dob'] = $this->input->post('dob');
				$array['sex'] = $this->input->post('gender');
				$array['religion'] = $this->input->post('religion');
				$array['email'] = $this->input->post('email');
				$array['phone'] = $this->input->post('phone');
				$array['doj'] = $this->input->post('doj');
				$array['username'] = $this->input->post('username');
				$array['address'] = $this->input->post('address');
				//print_r($array);echo $id;die();
				$this->teacher_m->updateTeacher($array,$id);
				redirect('teacher/edit/'.$id);
			}
		}
		else {
			$this->renderEdit($id);
		}
	}
}