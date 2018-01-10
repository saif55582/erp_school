<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Student extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}

	function view($sid) {

		$studentID = base64_decode($sid)/786786;
		$instituteID = $this->session->userdata('instituteID');

		$array = array('instituteID'=>$instituteID, 'studentID'=>$studentID );
		
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;
		$where = array(
			'instituteID'=>$instituteID, 
			'studentID'=>$studentID,
			'academic_yearID'=>$academic_yearID
		);

		$this->data['student'] = $this->student_m->get_single_student($array);
		$this->data['attendances'] = $this->attendance_stud_m->get_attendance_stud_where($where);
		$this->data['title'] = 'View Student';
		$this->data['subview'] = 'student/student_view';
		$this->data['script'] = 'student/student_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'student';
		$this->load->view('main_layout', $this->data);

	}

	function rulesAdd() {
		$rules = array(
			array(
				'field'=>'f_name',
				'label'=>'First Name',
				'rules'=>'required|trim|xss_clean|alpha_numeric'
			),
			array(
				'field'=>'l_name',
				'label'=>'Last Name',
				'rules'=>'trim|xss_clean|alpha_numeric'
			),
			array(
				'field'=>'photo',
				'label'=>'Student Photo',
				'rules'=>'callback_upload'
			),
			array(
				'field'=>'dob',
				'label'=>'Date Of Birth',
				'rules'=>'required|trim|xss_clean|callback_checkdate'
			),
			array(
				'field'=>'gender',
				'label'=>'Gender',
				'rules'=>'required'
			),
			array(
				'field'=>'blood',
				'label'=>'Blood',
				'rules'=>'xss_clean|trim'
			),
			array(
				'field'=>'age',
				'label'=>'Age',
				'rules'=>'required|trim|xss_clean|numeric'
			),
			array(
				'field'=>'address',
				'label'=>'Address ',
				'rules'=>'required|trim|xss_clean'
			),
			array(
				'field'=>'father_name',
				'label'=>"Father's Name",
				'rules'=>'required|xss_clean|trim|alpha_numeric_spaces'
			),
			array(
				'field'=>'father_phone',
				'label'=>"Father's Phone",
				'rules'=>'required|xss_clean|trim|numeric|exact_length[10]'
			),
			array(
				'field'=>'father_job',
				'label'=>"Father's Job",
				'rules'=>'trim|xss_clean|alpha_numeric_spaces'
			),
			array(
				'field'=>'father_aadhar',
				'label'=>"Aadhar",
				'rules'=>'trim|xss_clean|numeric|exact_length[12]'
			),
			array(
				'field'=>'mother_name',
				'label'=>"Mother's Name",
				'rules'=>'required|xss_clean|trim|alpha_numeric_spaces'
			),
			array(
				'field'=>'mother_phone',
				'label'=>"Mother's Phone",
				'rules'=>'xss_clean|trim|numeric|exact_length[10]'
			),
			array(
				'field'=>'mother_job',
				'label'=>"Mother's Job",
				'rules'=>'trim|xss_clean|alpha_numeric_spaces'
			),
			array(
				'field'=>'mother_aadhar',
				'label'=>"Aadhar",
				'rules'=>'trim|xss_clean|numeric|exact_length[12]'
			),
			array(
				'field'=>'roll_no',
				'label'=>'Roll No ',
				'rules'=>'xss_clean|trim'
			),
			array(
				'field'=>'sectionID',
				'label'=>'Section',
				'rules'=>'required|trim|xss_clean|callback_checkLimit[section_m]'
			),
			array(
				'field'=>'classesID',
				'label'=>'Class',
				'rules'=>'required|trim|xss_clean|callback_checkLimit[classes_m]'
			),
			array(
				'field'=>'doj',
				'label'=>'Joining Date',
				'rules'=>'required|trim|xss_clean|callback_checkdate'
			)
		);
		return $rules;
	}

	function checkLimit($param, $model) {
		//$class = $this->$model->getLimit(array(''));
		return true;
	}


	function checkdate($date) {
		if(!$date) {
			$this->form_validation->set_message('checkdate','The %s field is required');
			return false;
		}
		else {
			if(date('Y-m-d', strtotime($date)) == $date) {
				return true;
			}
			else {
				$this->form_validation->set_message('checkdate','The %s must be in format "yyyy-mm-dd"');
				return false;
			}
		}
		
	}

	function index() {
		
		$where = array(
			'instituteID'=>$this->session->userdata('instituteID')
		);

		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['sections'] = $this->section_m->get_section_by($where);
		$this->data['students'] = $this->student_m->get_order_by_student($where);
		$this->data['title'] = 'Student';
		$this->data['subview'] = 'student/student';
		$this->data['script'] = 'student/student_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'student';
		$this->load->view('main_layout', $this->data);

	}

	function renderAdd() {
		$instituteID = $this->session->userdata('instituteID');
		$rn = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$this->data['registration_no'] = $rn->registration_no;
		$this->data['classes'] = $this->classes_m->get_order_by_classes(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['sections'] = $this->section_m->get_section_by(array('instituteID'=>$this->session->userdata('instituteID')));
		$this->data['title'] = 'Add Student';
		$this->data['subview'] = 'student/student_add';
		$this->data['script'] = 'student/student_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'student';
		$this->load->view('main_layout', $this->data);
	}

	function dest($id=NULL) {

		$studentID = $this->input->post('param');
		$instituteID = $this->session->userdata('instituteID');
		$where = array(
			'instituteID'=>$instituteID,
			'studentID'=>$studentID
		);
		$student = $this->student_m->get_single_student($where);
		//Dleting student documents
		$path = 'main_asset/school_docs/'.$this->session->userdata('instituteID').'/student/';
		if($student->photo != 'default.png') {
			unlink($path.$student->photo);
		}
		if($student->documents) {
			$documents = unserialize($student->documents);
			foreach($documents as $docs) {
				foreach($docs as $name=>$file) {
					unlink($path.$file);
				}
			}
		}

		$this->student_m->delete($studentID);
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
			$config['allowed_types'] = '*';
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
				$config['allowed_types'] = "*";
				$config['file_name'] = date('Y-m-d-H-i-s').$new_file;
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload("photo")) {
					echo 'aaa';
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
				echo validation_errors();
				 
				 if($_FILES["photo"]['name'] !="") {
				 	$path =  "./main_asset/school_docs/".$this->session->userdata('instituteID').'/student/'.$this->upload_data['file']['file_name'];
				 	unlink($path);
				 }
				 	
				  $classesID =  ($this->input->post('classesID'));
				  $sectionID = ($this->input->post('sectionID'));
				 if($classesID) {
				 	$this->session->set_flashdata('getSection',$classesID);
				 }
				 if($sectionID) {
				 	$this->session->set_flashdata('sectionID',$sectionID);
				 }

				$this->renderAdd();
			}
			else {
				$instituteID = $this->session->userdata('instituteID');
				$res = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
				$registration_no = $res->registration_no;
				$password = random_string('alpha', 10);
				$array = array(
					'instituteID'=>$instituteID,
					'academic_yearID'=>$res->academic_yearID,
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
					'roll_no'=>$this->input->post('roll_no'),
					'sectionID'=>base64_decode($this->input->post('sectionID')),
					'classesID'=>base64_decode($this->input->post('classesID')),
					'doj'=>$this->input->post('doj'),
					'username'=>$registration_no,
					'password'=>md5($password),
					'slug'=>$password
				);
				$array['photo'] = $this->upload_data['file']['file_name'];
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
				
				$id = $this->student_m->insertStudent($array);
				$update = array(
					'reg_no'=>$id+1000,
					'username'=>$id+1000
				);
				// $reg = array('registration_no'=>$registration_no+1);
				// $this->institute_m->updateInstitute($reg, $instituteID);
				$this->student_m->updateStudent($update, $id);
				redirect('student/view/'.base64_encode($id*786786));

			}
		}
		else {
			$this->renderAdd();
		}
	}


	function gStOpt() {
		$classesID = base64_decode($this->input->post('y'));
		$where = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'classesID'=>$classesID
			);
		$students = $this->student_m->get_order_by_student($where);
		$result = array();
		foreach ($students as $student) {
			$result[] = array(
				'student_name'=>$student->f_name.' '.$student->l_name,
				'studentID'=>base64_encode($student->studentID)
			);
		}
		echo json_encode($result);
	}


	function gSt() {

		$classesID = base64_decode($this->input->post('y'));
		$sectionID = base64_decode($this->input->post('z'));
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
                            $result .= "<img src='".base_url()."/main_asset/assets/img/default.png' alt='' class='img img-' style='width:50px'>";
                            }
                            else {
                            $result .= "<img src='".base_url()."/main_asset/school_docs/".$this->session->userdata('instituteID')."/student/".$student->photo."' alt='' class='img' style='width:60px'>";
                            }
        $result .= "</td>
                    <td>".strtoupper($student->f_name.' '.$student->l_name)."</td>
                    <td>".$student->roll_no."</td>
                    <td>".$student->reg_no."</td>
                    <td>".$this->mylibrary->getClassName($student->classesID)."</td>
                    <td>".$this->mylibrary->getSectionName($student->sectionID)."</td>
                    <td class='text-center td-actions'>
                    	<a href='".base_url()."student/view/".base64_encode($student->studentID*786786)."'>
                            <button type='button' class='btn btn-success'>
                            <i class='material-icons'>open_in_new</i>
                            </button>
                        </a>
                        <a href='".base_url()."student/edit/".$student->studentID."'>
                            <button type='button' rel='tooltip' class='btn btn-info'>
                            <i class='material-icons'>edit</i>
                            </button>
                        </a>
                        <button id='".$student->studentID."' base='".base_url()."' cm='student/dest' type='button' 
                        rel='tooltip' class='btn btn-danger pop'>
                            <i class='material-icons'>close</i>
                        </button>
                    </td>
                </tr>";
		
		 }
		 echo $result;

		
	}

	function gStM() {
		$classesID = base64_decode($this->input->post('y'));
		$sectionID = base64_decode($this->input->post('z'));
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
                            $result .= "<img src='".base_url()."/main_asset/assets/img/default.png' alt='' class='img img-' style='width:50px'>";
                            }
                            else {
                            $result .= "<img src='".base_url()."/main_asset/school_docs/".$this->session->userdata('instituteID')."/student/".$student->photo."' alt='' class='img' style='width:60px'>";
                            }
        $result .= "</td>
                    <td>".strtoupper($student->f_name.' '.$student->l_name)."</td>
                    <td>".$student->roll_no."</td>
                    <td>".$student->reg_no."</td>
                    <td class='text-center td-actions'>
                        <a href='".base_url()."marks/view/".base64_encode($student->studentID*786786)."'>
                            <button type='button' rel='tooltip' class='btn btn-success'>
                            	<i class='material-icons'>open_in_new</i>
                            </button>
                        </a>
                        
                    </td>
                </tr>";
		
		 }
		 echo $result;
	}

	public function student_list() {


		$classesID = base64_decode($this->input->post('class'));
		$sectionID = base64_decode($this->input->post('section'));
		if((int)$classesID && (int)$sectionID) {
			$target = base_url("marks/add_marks/$classesID/$sectionID");
			echo $target;
		}
		else {
			redirect(base_url('add_marks'));
		}
	}

}