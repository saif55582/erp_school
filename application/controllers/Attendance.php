<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Attendance extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
		
	}

	function rulesAdd() {
		
	}

	function student() {
		$where = array(
			'instituteID'=>$this->session->userdata('instituteID')
		);
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['title'] = 'Student Attendance';
		$this->data['subview'] = 'attendance/student';
		$this->data['script'] = 'attendance/attendance_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'attendance';
		$this->data['a1'] = 'attendance';
		$this->data['div1'] = 'attendance';
		$this->data['li2'] = 'student';
		$this->load->view('main_layout', $this->data);

	}

	function student_add() {
		$where = array(
			'instituteID'=>$this->session->userdata('instituteID')
		);
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['title'] = 'Add Student Attendance';
		$this->data['subview'] = 'attendance/student_add';
		$this->data['script'] = 'attendance/attendance_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'attendance';
		$this->data['a1'] = 'attendance';
		$this->data['div1'] = 'attendance';
		$this->data['li2'] = 'student';
		$this->load->view('main_layout', $this->data);
	}

	function gsa() {
		$classesID = base64_decode($this->input->post('y'));
		$sectionID = base64_decode($this->input->post('z'));
		$date = $this->input->post('dt');
		if(!$date) {
			echo 'No date';
			return false;
		}
		$day = date('d', strtotime($date));
		$month_year = date('Y-m', strtotime($date));
		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;
		$where = array(
			'instituteID'=>$instituteID,
			'classesID'=>$classesID,
			'sectionID'=>$sectionID
		);
		$students = $this->student_m->get_order_by_student($where);
		$result = '';
		foreach($students as $student) {
		$array = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'academic_yearID'=>$student->academic_yearID,
			'studentID'=>$student->studentID,
			'classesID'=>$student->classesID,
			'sectionID'=>$student->sectionID,
			'month_year'=>$month_year
		);

		$a = $this->attendance_stud_m->get_single_attendance($array);
		
		if(!$a)
			$this->attendance_stud_m->insertAttendance($array);

		$where = array(
			'instituteID'=>$instituteID,
			'academic_yearID'=>$academic_yearID,
			'studentID'=>$student->studentID,
			'classesID'=>$student->classesID,
			'sectionID'=>$student->sectionID,
			'month_year'=>$month_year
		);

		$attendance = $this->attendance_stud_m->get_single_attendance($where);
		$studentID =  $attendance->studentID;
		$student = $this->student_m->get_single_student(array('studentID'=>$studentID,'instituteID'=>$instituteID));


				$result .= "<tr>
						    <td>";
						    if($student->photo == 'default.png') {
						    	$result .= "<img src='".base_url('main_asset/assets/img/default.png')."' class='img img-' style='width:40px'>";
						    }
						    else {
						    	$result .= "<img src='".base_url('main_asset/school_docs/').$this->session->userdata('instituteID')."/student/".$student->photo."' class='img img-' style='width:60px'>";
						    }
						    
						    $result .= "</td>
						    <td>".$student->f_name." ".$student->l_name."</td>
						    <td>".$attendance->attendance_studID."</td>
						    <td>".$this->mylibrary->getClassName($student->classesID)."</td>
						    <td>".$this->mylibrary->getSectionName($student->sectionID)."</td>
						    <td>
						        <div class='btn-group'>";
						        $d = 'd'.$day;
						    	$status = isset($attendance->$d) ? $attendance->$d : 'n';
						    	$usertype = $this->session->userdata('loginusertype');
						    	if($status == 'p') {
							        $result .= "
							            <button style='background-color:#4CAF50' act='attendance/sa' status='".$status."' id='present' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_studID)."' class='btn btn-round'>
							            	<div style='color:#fff' class='text-success'>Present</div></button>
							            </button>";
						        }else {
						        	 $result .= "
							            <button style='background-color:#fff' act='attendance/sa' status='".$status."' id='present' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_studID)."' class='btn btn-round'>
							            	<div class='text-success'>Present</div></button>
							            </button>";
						        }
						        if($status == 'a') {
						        	$result .= "
						            <button style='background-color:#F44336' act='attendance/sa' status='".$status."' id='absent' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_studID)."' class='btn btn-round'>
						            	<div style='color:#fff' class='text-danger'>Absent</div>
						            </button>";
						        }else {
						        	$result .= "
						            <button style='background-color:#fff' act='attendance/sa' status='".$status."' id='absent' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_studID)."' class='btn btn-round'>
						            	<div class='text-danger'>Absent</div>
						            </button>";
						        }
					            if($status == 'l') {
					            	$result .= "
						            <button style='background-color:#FF9800' act='attendance/sa' status='".$status."' id='leave' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_studID)."' class='btn btn-round'>
						            	<div style='color:#fff'class='text-warning'>Leave</div>
						            </button>";
					            }else {
					            	$result .= "
						            <button style='background-color:#fff' act='attendance/sa' status='".$status."' id='leave' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_studID)."' class='btn btn-round'>
						            	<div class='text-warning'>Leave</div>
						            </button>";
					            }
					            $result .= "
						        </div>
						    </td>
						</tr>";
		}
		echo $result;
	}

	function sa() {
		$attendance_studID = base64_decode($this->input->post('asi'));
		$auth = ($this->input->post('auth'));
		$status = $this->input->post('status');
		$param = $this->input->post('a');
		$date = $this->input->post('dt');
		$day = date('d', strtotime($date));
		$month_year = date('Y-m', strtotime($date));
		$array = array(
			'd'.$day=>$param
		);
		if($auth == 'admin') {
			$this->attendance_stud_m->attendance_stud_update($array,$attendance_studID);
			echo 'allowed';
		}
		else {
			if($status =='n') {
				$this->attendance_stud_m->attendance_stud_update($array,$attendance_studID);
				echo 'allowed';
			}
			else
				echo 'not_allowed';
		}
	}


	function getsta() {
		$classesID = base64_decode($this->input->post('y'));
		$sectionID = base64_decode($this->input->post('z'));
		$date = $this->input->post('dt');
		if(!$date) {
			echo 'No date';
			return false;
		}
		$result = '';
		$day = date('d', strtotime($date));
		$month_year = date('Y-m', strtotime($date));
		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;

		$where = array(
			'instituteID'=>$instituteID,
			'academic_yearID'=>$academic_yearID,
			'classesID'=>$classesID,
			'sectionID'=>$sectionID,
			'month_year'=>$month_year
		);

		$attendances = $this->attendance_stud_m->get_attendance_stud_where($where);
		$d = 'd'.$day;
		foreach($attendances as $attendance) {

			$studentID = $attendance->studentID;
			$status = $attendance->$d;

			$student = $this->student_m->get_single_student(array('studentID'=>$studentID,'instituteID'=>$instituteID));

			if($student) {
				$result .= "<tr>
							    <td>";
							    if($student->photo == 'default.png') {
							    	$result .= "<img src='".base_url('main_asset/assets/img/default.png')."' class='img img-' style='width:40px'>";
							    }
							    else {
							    	$result .= "<img src='".base_url('main_asset/school_docs/').$this->session->userdata('instituteID')."/student/".$student->photo."' class='img img-' style='width:50px'>";
							    }
							    
							    $result .= "</td>
							    <td>".$student->f_name." ".$student->l_name."</td>
							    <td>".$student->roll_no."</td>
							    <td>".$this->mylibrary->getClassName($student->classesID)."</td>
							    <td>".$this->mylibrary->getSectionName($student->sectionID)."</td>
							    <td>
							        <div class='btn-group'>";
							        $d = 'd'.$day;
							    	$status = isset($attendance->$d) ? $attendance->$d : 'n';
							    	$usertype = $this->session->userdata('loginusertype');
							    	if($status == 'p') {
								        $result .= "
								            <div style='background-color:#4CAF50' class='btn btn-round'>
								            	<div style='color:#fff' class='text-success'>Present</div></button>
								            </div>";
							        }else {
							        	 $result .= "
								            <div style='background-color:#fff' class='btn btn-round'>
								            	<div class='text-success'>Present</div></button>
								            </div>";
							        }
							        if($status == 'a') {
							        	$result .= "
							            <div style='background-color:#F44336' class='btn btn-round'>
							            	<div style='color:#fff' class='text-danger'>Absent</div>
							            </div>";
							        }else {
							        	$result .= "
							            <div style='background-color:#fff' class='btn btn-round'>
							            	<div class='text-danger'>Absent</div>
							            </div>";
							        }
						            if($status == 'l') {
						            	$result .= "
							            <div style='background-color:#FF9800'  class='btn btn-round'>
							            	<div style='color:#fff'class='text-warning'>Leave</div>
							            </div>";
						            }else {
						            	$result .= "
							            <div style='background-color:#fff' class='btn btn-round'>
							            	<div class='text-warning'>Leave</div>
							            </div>";
						            }
						            $result .= "
							        </div>
							    </td>
							</tr>";
						}
		}
		echo $result;
	}



	//Teacher attendance start

	function teacher() {

		$permission =  $this->aauth->is_group_allowed(1,4);
		if(!$permission)
			redirect('admin', 'refresh');

		$usertype =  $this->session->userdata('loginusertype');
		$where = array(
			'instituteID'=>$this->session->userdata('instituteID')
		);
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['title'] = 'Teacher Attendance';
		$this->data['subview'] = 'attendance/teacher';
		$this->data['script'] = 'attendance/attendance_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'attendance';
		$this->data['a1'] = 'attendance';
		$this->data['div1'] = 'attendance';
		$this->data['li2'] = 'teacher';
		$this->load->view('main_layout', $this->data);

	}

	function teacher_add() {
		$where = array(
			'instituteID'=>$this->session->userdata('instituteID')
		);
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['title'] = 'Add Teacher Attendance';
		$this->data['subview'] = 'attendance/teacher_add';
		$this->data['script'] = 'attendance/attendance_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'attendance';
		$this->data['a1'] = 'attendance';
		$this->data['div1'] = 'attendance';
		$this->data['li2'] = 'teacher';
		$this->load->view('main_layout', $this->data);
	}

	function gta() {
		$date = $this->input->post('dt');
		if(!$date) {
			echo 'No date';
			return false;
		}
		$day = date('d', strtotime($date));
		$month_year = date('Y-m', strtotime($date));
		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;
		$where = array(
			'instituteID'=>$instituteID
		);

		$teachers = $this->teacher_m->get_order_by_teacher($where);
		$result = '';
		foreach($teachers as $teacher) {
		$array = array(
			'instituteID'=>$this->session->userdata('instituteID'),
			'academic_yearID'=>$teacher->academic_yearID,
			'teacherID'=>$teacher->teacherID,
			'month_year'=>$month_year
		);

		$a = $this->attendance_teacher_m->get_single_attendance($array);
		
		if(!$a)
			$this->attendance_teacher_m->insertAttendance($array);

		$where = array(
			'instituteID'=>$instituteID,
			'academic_yearID'=>$academic_yearID,
			'teacherID'=>$teacher->teacherID,
			'month_year'=>$month_year
		);

		$attendance = $this->attendance_teacher_m->get_single_attendance($where);
		$teacherID =  $attendance->teacherID;
		$teacher = $this->teacher_m->get_teacher_single(array('teacherID'=>$teacherID,'instituteID'=>$instituteID));


				$result .= "<tr>
						    <td>";
						    if($teacher->photo == 'default.png') {
						    	$result .= "<img src='".base_url('main_asset/assets/img/default.png')."' class='img img-' style='width:40px'>";
						    }
						    else {
						    	$result .= "<img src='".base_url('main_asset/school_docs/').$this->session->userdata('instituteID')."/teacher/".$teacher->photo."' class='img img-' style='width:60px'>";
						    }
						    
						    $result .= "</td>
						    <td>".$teacher->name."</td>
						    <td>".$teacher->designation."</td>
						    <td>".$teacher->email."</td>
						    <td>".$teacher->phone."</td>
						    <td>
						        <div class='btn-group'>";
						        $d = 'd'.$day;
						    	$status = isset($attendance->$d) ? $attendance->$d : 'n';
						    	$usertype = $this->session->userdata('loginusertype');
						    	if($status == 'p') {
							        $result .= "
							            <button style='background-color:#4CAF50' act='attendance/ta' status='".$status."' id='present' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_teacherID)."' class='btn btn-round'>
							            	<div style='color:#fff' class='text-success'>Present</div></button>
							            </button>";
						        }else {
						        	 $result .= "
							            <button style='background-color:#fff' act='attendance/ta' status='".$status."' id='present' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_teacherID)."' class='btn btn-round'>
							            	<div class='text-success'>Present</div></button>
							            </button>";
						        }
						        if($status == 'a') {
						        	$result .= "
						            <button style='background-color:#F44336' act='attendance/ta' status='".$status."' id='absent' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_teacherID)."' class='btn btn-round'>
						            	<div style='color:#fff' class='text-danger'>Absent</div>
						            </button>";
						        }else {
						        	$result .= "
						            <button style='background-color:#fff' act='attendance/ta' status='".$status."' id='absent' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_teacherID)."' class='btn btn-round'>
						            	<div class='text-danger'>Absent</div>
						            </button>";
						        }
					            if($status == 'l') {
					            	$result .= "
						            <button style='background-color:#FF9800' act='attendance/ta' status='".$status."' id='leave' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_teacherID)."' class='btn btn-round'>
						            	<div style='color:#fff'class='text-warning'>Leave</div>
						            </button>";
					            }else {
					            	$result .= "
						            <button style='background-color:#fff' act='attendance/ta' status='".$status."' id='leave' auth='".($usertype)."' base='".base_url()."' asi='".base64_encode($attendance->attendance_teacherID)."' class='btn btn-round'>
						            	<div class='text-warning'>Leave</div>
						            </button>";
					            }
					            $result .= "
						        </div>
						    </td>
						</tr>";
		}
		echo $result;
	}

	function ta() {
		$attendance_teacherID = base64_decode($this->input->post('asi'));
		$auth = ($this->input->post('auth'));
		$status = $this->input->post('status');
		$param = $this->input->post('a');
		$date = $this->input->post('dt');
		$day = date('d', strtotime($date));
		$month_year = date('Y-m', strtotime($date));
		$array = array(
			'd'.$day=>$param
		);

		if($auth == 'admin') {
			$this->attendance_teacher_m->attendance_teacher_update($array,$attendance_teacherID);
			echo 'allowed';
		}
		else {
			if($status =='n') {
				$this->attendance_teacher_m->attendance_teacher_update($array,$attendance_teacherID);
				echo 'allowed';
			}
			else
				echo 'not_allowed';
		}
	}


	function getta() {
		$date = $this->input->post('dt');
		if(!$date) {
			echo 'No date';
			return false;
		}

		$result = '';
		$day = date('d', strtotime($date));
		$month_year = date('Y-m', strtotime($date));
		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID = $institute->academic_yearID;

		$where = array(
			'instituteID'=>$instituteID,
			'academic_yearID'=>$academic_yearID,
			'month_year'=>$month_year
		);

		$attendances = $this->attendance_teacher_m->get_attendance_teacher_where($where);
		$d = 'd'.$day;
		foreach($attendances as $attendance) {

			$teacherID = $attendance->teacherID;
			$status = $attendance->$d;

			$teacher = $this->teacher_m->get_teacher_single(array('teacherID'=>$teacherID,'instituteID'=>$instituteID));

			if($teacher) {
				$result .= "<tr>
							    <td>";
							    if($teacher->photo == 'default.png') {
							    	$result .= "<img src='".base_url('main_asset/assets/img/default.png')."' class='img img-' style='width:40px'>";
							    }
							    else {
							    	$result .= "<img src='".base_url('main_asset/school_docs/').$this->session->userdata('instituteID')."/teacher/".$teacher->photo."' class='img img-' style='width:50px'>";
							    }
							    
							    $result .= "</td>
							    <td>".$teacher->name."</td>
							    <td>".$teacher->designation."</td>
							    <td>".$teacher->email."</td>
							    <td>".$teacher->phone."</td>
							    <td>
							        <div class='btn-group'>";
							        $d = 'd'.$day;
							    	$status = isset($attendance->$d) ? $attendance->$d : 'n';
							    	$usertype = $this->session->userdata('loginusertype');
							    	if($status == 'p') {
								        $result .= "
								            <div style='background-color:#4CAF50' class='btn btn-round'>
								            	<div style='color:#fff' class='text-success'>Present</div></button>
								            </div>";
							        }else {
							        	 $result .= "
								            <div style='background-color:#fff' class='btn btn-round'>
								            	<div class='text-success'>Present</div></button>
								            </div>";
							        }
							        if($status == 'a') {
							        	$result .= "
							            <div style='background-color:#F44336' class='btn btn-round'>
							            	<div style='color:#fff' class='text-danger'>Absent</div>
							            </div>";
							        }else {
							        	$result .= "
							            <div style='background-color:#fff' class='btn btn-round'>
							            	<div class='text-danger'>Absent</div>
							            </div>";
							        }
						            if($status == 'l') {
						            	$result .= "
							            <div style='background-color:#FF9800'  class='btn btn-round'>
							            	<div style='color:#fff'class='text-warning'>Leave</div>
							            </div>";
						            }else {
						            	$result .= "
							            <div style='background-color:#fff' class='btn btn-round'>
							            	<div class='text-warning'>Leave</div>
							            </div>";
						            }
						            $result .= "
							        </div>
							    </td>
							</tr>";
						}
		}
		echo $result;
	}
}