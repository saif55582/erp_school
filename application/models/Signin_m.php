<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin_m extends MY_Model {

	function __construct() {
		parent::__construct();
		$this->load->model('usertype_m');
		$this->load->database();
	}

	public function signin() {
		$returnArray = array(
			'return' => FALSE,
			'message' => ''
		);	

		$tables = array(
			'student' => 'student',
			'teacher' => 'teacher',
			'admin' => 'admin'
		);

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$userdata = '';
		$array = array();
		$i = 0;
		foreach ($tables as $table) {
			$user = $this->db->get_where($table,array('username' => $username,'password' => md5($password)));
			$alluserdata = $user->row();
			if(count($alluserdata)) {
				$userdata = $alluserdata;
				$array['permition'][$i] = 'Yes';
				$array['usercolname'] = $table.'ID';
			}
			else {
				$array['permition'][$i] = 'No';
			}
			$i++;
		}

		if(in_array('Yes', $array['permition'])) {
				$usertype = $this->usertype_m->get_usertype($userdata->usertypeID);

				if(count($usertype)) {	
					if($userdata->active == 1) {
						$tableID = $array['usercolname'];
						$data = array( 
							"loginuserID" => $userdata->$tableID,
							"instituteID" => $userdata->instituteID,
							"loginusername" => $userdata->name,
							"loginuseremail" => $userdata->email,
							"loginusertypeID" => $userdata->usertypeID,
							"loginusertype" => $usertype->usertype,
							"loginusername" => $userdata->username,
							"loginuserphoto" => $userdata->photo,
							"loggedin" => TRUE
						);

						$this->session->set_userdata($data);

						$returnArray = array('return' => TRUE, 'message' => 'Success');
					}
					else {
						$returnArray = array( 'return' => FALSE, 'message' => 'You are blocked.');
					}
				}
				else {
					$returnArray = array( 'return' => FALSE, 'message' => 'This user type does not exist.');
				}
			}
			else {
				$returnArray = array( 'return' => FALSE, 'message' => 'Email or password is incorrect.');
			}
			return $returnArray;
	}

	function signin_superadmin() {
		$returnArray = array(
			'return '=>'',
			'message'=>''
		);

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query = $this->db->select('*')->from('superadmin')->where('username', $username)->get();

		if($query->num_rows() == 1) {
			$row = $query->row();
			if(password_verify($password, $row->password)) {

				//set data to session 
				$data = array(
					'superadminID'	=> $row->superadminID,
					'name'			=> $row->name,
					'email'			=> $row->email,
					'username'		=> $row->username,
					"loggedInSuper" => TRUE
				);

				$this->session->set_userdata($data);
				$returnArray = array('return'=>true, 'message'=>'Success');
			}
			else {
				$returnArray = array('return'=>false,'message'=>'Wrong Password');
			}
		}
		else {
			$returnArray = array('return'=>false,'message'=>'Username not Found');
		}
		return $returnArray;
	}


}