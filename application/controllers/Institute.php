<?php
defined('BASEPATH') or exit('No direct scripting allowed');

class Institute extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	function up() {
		$instituteID = $this->session->userdata('instituteID');
		$academic_yearID = $this->input->post('ac');
		$array = array(
			'academic_yearID'=>$academic_yearID
		);
		$this->institute_m->updateInstitute($array,$instituteID);
	}
}

?>