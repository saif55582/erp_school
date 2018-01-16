<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Setting extends MY_Controller {



	function __construct() {



		parent::__construct();

	}


	
	//--------------------------------- Genral Setting -----------------------//



	function general(){

		if ($_POST) {
			
			$config = array(

				'upload_path'   => 'main_asset/school_docs/'.$this->session->userdata('instituteID').'/data',
				'file_name'     => date('Y-m-d-H-i-s').random_string('alpha',15),
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite'     => TRUE
				
			);

			$this->load->library('upload', $config);
		
			if($this->upload->do_upload("logo")){

				$data = $this->upload->data();
				$array = array(

					'school_logo'    => $config['file_name'].$data['file_ext'],
					'school_name'    => $this->input->post('school_name'),
					'school_pincode' => $this->input->post('school_pincode'),
					'phone'          => $this->input->post('phone'),
					'email'          => $this->input->post('email')
				);

				$instituteID = $this->session->userdata('instituteID');
				$this->institute_m->updateInstitute($array,$instituteID);
			
			}
			redirect('setting/general');
				
		}

		$this->data['institute']  = $this->institute_m->get_institute($this->session->userdata('instituteID'));

		$this->data['title']      = 'Genral Setting';

		$this->data['subview']    = 'setting/general';

		$this->data['script']     = 'setting/setting_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'setting';

		$this->data['a1']         = 'setting';

		$this->data['div1']       = 'setting';

		$this->data['li2']        = 'general';

		$this->data['a2']         = 'general';


		$this->load->view('main_layout',$this->data);

	}



	//--------------------------------- Payment Setting -----------------------//



	function payment(){


		$this->data['title']      = 'Payment Setting';

		$this->data['subview']    = 'setting/payment';

		$this->data['script']     = 'setting/setting_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'setting';

		$this->data['a1']         = 'setting';

		$this->data['div1']       = 'setting';

		$this->data['li2']        = 'payment';

		$this->data['a2']         = 'payment';


		$this->load->view('main_layout',$this->data);
		
	}



	//--------------------------------- SMS Setting -----------------------//




	function sms(){


		$this->data['title']      = 'SMS Setting';

		$this->data['subview']    = 'setting/sms';

		$this->data['script']     = 'setting/setting_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'setting';

		$this->data['a1']         = 'setting';

		$this->data['div1']       = 'setting';

		$this->data['li2']        = 'sms';

		$this->data['a2']         = 'sms';


		$this->load->view('main_layout',$this->data);
		
	}

}