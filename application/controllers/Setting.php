<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

	function __construct() {

		parent::__construct();
	}


	function rules() {
		$rules = array(
			array(
				'field' => 'institute_name',
				'label' => 'Institute Name',
				'rules' => 'trim|required|xss_clean|max_length[128]'
			),
			array(
				'field' => 'institute_phone',
				'label' => 'Institute Phone',
				'rules' => 'trim|required|xss_clean|max_length[25]'
			),
			array(
				'field' => 'institute_mobile',
				'label' => 'Institute Mobile',
				'rules' => 'trim|required|xss_clean|max_length[25]'
			),
			array(
				'field' => 'institute_email',
				'label' => 'Institute Email',
				'rules' => 'trim|required|xss_clean|max_length[128]'
			),
			array(
				'field' => 'institute_fax',
				'label' => 'Institute Fax',
				'rules' => 'trim|xss_clean|max_length[128]'
			),
			array(
				'field' => 'institute_address',
				'label' => 'Institute Address',
				'rules' => 'trim|required|xss_clean|max_length[128]'
			)
		);

		return $rules;
	}


	function upload_photo() {

		if($_FILES['institute_logo']['name'] !='') {

			$file_name = $_FILES['institute_logo']['name'];
			$explode = explode('.',$file_name);
			$new_name = $file_name.'.'.end($explode);

			$config['upload_path'] = "./main_asset/assets/img";
			$config['allowed_types'] = "gif|jpg|png";
			$config['file_name'] = $new_name;
			$config['max_size'] = '1024';
			$config['max_width'] = '3000';
			$config['max_height'] = '3000';
			$this->load->library('upload',$config);

			if (!$this->upload->do_upload('institute_logo'))
            {
            	$error = array('error' => $this->upload->display_errors());
                return FALSE;
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                return $data['upload_data']['file_name'];
            }
		}
	}

	function update_institute_details() {
		
		$rules = $this->rules();
		$this->data['form_validation'] = '';
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE) {
			$this->data['form_validation'] = validation_errors();
			$this->load->view('setting',$this->data);
		}
		else {
			$array = array();
			for($i=0; $i<count($rules); $i++) {
				if($this->input->post($rules[$i]['field']) == false) {
					$array[$rules[$i]['field']] = 0;
				}
				else {	
					$array[$rules[$i]['field']] = $this->input->post($rules[$i]['field']);
				}
			}
		}

		if(isset($_FILES['institute_logo']) && $_FILES['institute_logo']['size'] > 0){
		     $array['institute_logo'] = $this->upload_photo();
		} else
			 $array['institute_logo'] = '';

		$this->setting_m->insert_or_update($array);
		redirect('dashboard/index');
	}
}