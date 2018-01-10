<?php 



defined('BASEPATH') or exit('No direct scripting allowed');



class Administrator extends MY_Controller {



	function __construct() {

		parent::__construct();

		if($this->mylibrary->isLoggedIn() == FALSE) {

			redirect('signin');

		}

	}



	function academic_year() {

		if(!$_POST) {

			$this->data['title'] = 'Student Attendance';

			$this->data['subview'] = 'administrator/academic_year';

			$this->data['script'] = '';

			$this->data['app_script'] = 'general.js';

			$this->data['li1'] = 'administrator';

			$this->data['a1'] = 'administrator';

			$this->data['div1'] = 'administrator';

			$this->data['li2'] = 'academic_year';

			$this->load->view('main_layout', $this->data);

		}

		else {

			$array = array(

				'instituteID'=>$this->session->userdata('instituteID'),

				'name'=>$this->input->post('name'),

				'start'=>$this->input->post('start'),

				'end'=>$this->input->post('end')

			);



			$aca = $this->academic_year_m->get_academic_year_single($array);

			if(!$aca)

				$this->academic_year_m->insert_academic_year($array);	

			redirect('administrator/academic_year');

		}	

	}



	function ay_dest() {

		$academic_yearID =  $this->input->post('param');

		$instituteID = $this->session->userdata('instituteID');

		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));

		$academic_yearID_active = $institute->academic_yearID;

		if($academic_yearID == $academic_yearID_active)

			echo "active";

		else

			$this->academic_year_m->delete_academic_year($academic_yearID);

	}



	function permission() {



		$this->data['title'] = 'Permission';

		$this->data['subview'] = 'administrator/permission';

		$this->data['script'] = '';

		$this->data['app_script'] = 'general.js';

		$this->data['li1'] = 'administrator';

		$this->data['a1'] = 'administrator';

		$this->data['div1'] = 'administrator';

		$this->data['li2'] = 'permission';

		$this->load->view('main_layout', $this->data);			

	}



	//----------------------- System Admin ------------------------------------//




	function systemadmin() {

		if ($_POST) {
			
			$array = array(

				'instituteID' => $this->session->userdata('instituteID'),
				'name'        => $this->input->post('name'),
				'email'       => $this->input->post('email'),
				'phone'       => $this->input->post('phone'),
				'photo'       => $this->input->post('photo'),
				'username'    => 'default.png',//$this->input->post('uname'),
				'slug'        => $this->input->post('pwd'),
				'password'    => md5($this->input->post('pwd'))
			);
			$this->admin_m->insert_admin($array);
			redirect('administrator/systemadmin');
		}

		$this->data['admin']      = $this->admin_m->get_all_admin(array('instituteID'=>$this->session->userdata('instituteID')));

		$this->data['title']      = 'System Admin';

		$this->data['subview']    = 'administrator/systemadmin';

		$this->data['script']     = '';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'administrator';

		$this->data['a1']         = 'administrator';

		$this->data['div1']       = 'administrator';

		$this->data['li2']        = 'systemadmin';

		$this->load->view('main_layout', $this->data);			

	}

	
	//----------------------- System Admin ------------------------------------//


	function resetpwd(){

		if ($_POST) {

			$admin    = $this->admin_m->get_admin_by_id($this->session->userdata('loginuserID'),true);

			$username = $this->input->post('uname');
			$password = $this->input->post('pwd');

			if(($admin->username == $username) && ($admin->password == md5($password))){

				$array = array(
					'password'=>md5($this->input->post('newpwd')),
					'slug'=>$this->input->post('newpwd')
				);

				$this->admin_m->update_admin($array,$this->session->userdata('loginuserID'));

				$this->session->set_flashdata('result', 'reset');
			}else{
				$this->session->set_flashdata('result', 'notreset');
			}

			

		}


		$this->data['title']      = 'Reset Password';

		$this->data['subview']    = 'administrator/resetpwd';

		$this->data['script']     = 'administrator/administrator_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'administrator';

		$this->data['a1']         = 'administrator';

		$this->data['div1']       = 'administrator';

		$this->data['li2']        = 'resetpwd';

		$this->load->view('main_layout', $this->data);
	}
}