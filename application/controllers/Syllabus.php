<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Syllabus extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}


	function  getRules() {
		$array = array(
					array(
						'field'=>'photo',
						'label'=>'File',
						'rules'=>'callback_upload'
					)
		);
		return $array;
	}

	function  getRules_edit() {
		$array = array(
					array(
						'field'=>'photo',
						'label'=>'File',
						'rules'=>'callback_reupload'
					)
		);
		return $array;
	}


	function upload() {
		if($_FILES["photo"]['name'] !="") {
			$file_name = $_FILES["photo"]['name'];
			$explode = explode('.', $file_name);
			$file_name_rename = random_string('alpha',15);
			if(count($explode) >= 2) {
				$new_file = $file_name_rename.'.'.end($explode);
				$config['upload_path'] = "./main_asset/school_docs/".$this->session->userdata('instituteID').'/data';
				$config['allowed_types'] = "gif|jpg|png|jpeg";
				$config['file_name'] = date('Y-m-d-H-i-s').$new_file;
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
			$this->form_validation->set_message('upload','Image is required.');
			return false;
		}
	}

	function reupload() {
		if($_FILES["photo"]['name'] !="") {
			$file_name = $_FILES["photo"]['name'];
			$explode = explode('.', $file_name);
			$file_name_rename = random_string('alpha',15);
			if(count($explode) >= 2) {
				$new_file = $file_name_rename.'.'.end($explode);
				$config['upload_path'] = "./main_asset/school_docs/".$this->session->userdata('instituteID').'/data';
				$config['allowed_types'] = "gif|jpg|png|jpeg";
				$config['file_name'] = date('Y-m-d-H-i-s').$new_file;
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload("photo")) {
					$this->form_validation->set_message("reupload", $this->upload->display_errors());
	     			return FALSE;
				} else {
					$this->upload_data['file'] =  $this->upload->data();
					return TRUE;
				}
			} else {
				$this->form_validation->set_message("reupload", "Invalid file");
	     		return FALSE;
			}
		} else {
			$this->upload_data['file']['file_name'] = 'same';
			return true;
		}
	}

	function index() {
		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['syllabuses'] = $this->syllabus_m->get_order_by_syllabus(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['title'] = 'Syllabus';
		$this->data['subview'] = 'academics/syllabus';
		$this->data['script'] = 'academics/syllabus_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'syllabus';
		$this->load->view('main_layout', $this->data);

	}

	function renderAdd() {
		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['title'] = 'Add Syllabus';
		$this->data['subview'] = 'academics/syllabus_add';
		$this->data['script'] = 'academics/syllabus_js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'syllabus';
		$this->load->view('main_layout', $this->data);
	}

	function renderEdit($si) {
		$syllabusID = base64_decode($si);
		$array = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'syllabusID'=>$syllabusID
		);
		$this->data['syllabus'] = $this->syllabus_m->get_single_syllabus($array);

		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['title'] = 'Edit Syllabus';
		$this->data['subview'] = 'academics/syllabus_edit';
		$this->data['script'] = 'academics/syllabus_js';
		$this->data['li1'] = 'academics';
		$this->data['a1'] = 'academics';
		$this->data['div1'] = 'academics';
		$this->data['li2'] = 'syllabus';
		$this->load->view('main_layout', $this->data);
		
	}


	function dest($id=NULL) {
		$syllabusID = $this->input->post('param');
		$this->syllabus_m->delete($syllabusID);
	}

	function add() {
		if($_POST) {
			$rules = $this->getRules();
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run()==FALSE) {
				$this->renderAdd();
			}
			else {

				$array = array(
					'instituteID'=>$this->session->userdata('instituteID'),
					'classesID'=>base64_decode($this->input->post('classesID')),
					'title'=>$this->input->post('title'),
					'description'=>$this->input->post('description'),
					'file'=>$this->upload_data['file']['file_name']
				);
				
				$this->syllabus_m->insertSyllabus($array);
				redirect('syllabus');
			}
			
		}
		else {
			$this->renderAdd();
		}
	}
	function edit() {
		if($_POST) {
			$syllabusID = base64_decode($this->input->post('syi'));
			$rules = $this->getRules_edit();
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run()==FALSE) {
				$this->renderAdd();
			}
			else {

				$array = array(
					'instituteID'=>$this->session->userdata('instituteID'),
					'classesID'=>base64_decode($this->input->post('classesID')),
					'title'=>$this->input->post('title'),
					'description'=>$this->input->post('description')
				);
				if($this->upload_data['file']['file_name'] != 'same')
					$array['file'] = $this->upload_data['file']['file_name'];

				$this->syllabus_m->editSyllabus($array, $syllabusID);
				redirect('syllabus');
			}
		}
		else {
			$this->renderAdd();
		}
	}


	function getRows() {
		$classesID =  base64_decode($this->input->post('y'));
		$array = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'classesID'=>$classesID
		);
		$instituteID = $this->session->userdata('instituteID');
		$syllabus = $this->syllabus_m->get_order_by_syllabus($array);
		foreach($syllabus as $syll) :
		$result .= "
                <tr id=".$syll->syllabusID.">	
                    <td>".$syll->title."</td>
                    <td>".$this->mylibrary->getClassName($syll->classesID)."</td>
                    <td>".$syll->description."</td>
                    <td>
                    	<a href='".base_url()."main_asset/school_docs/".$instituteID."/data/".$syll->file."' download='".$syll->file."' >
                            <span style='color:seagreen'  class='material-icons'>file_download</span>
                        </a>
                    </td>
                    <td class='text-center'>
						<a href='".base_url()."syllabus/edit/".base64_encode($syll->syllabusID)."'>
                            <button type='button' rel='tooltip' class='btn btn-info mybtn'>
                            <i class='material-icons'>edit</i>
                            </button>
                        </a>
                        <button id='".$syll->syllabusID."' cm='syllabus/dest' base='".base_url()."' type='button' rel='tooltip' class='btn btn-danger mybtn pop'>
                            <i class='material-icons'>close</i>
                        </button>
                    </td>
                </tr>
                ";
        endforeach;
        echo $result;

	}

	
}