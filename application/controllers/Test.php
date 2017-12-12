<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * @property Login_control $Login_control
 * @property Aauth $aauth Description
 * @version 1.0
 */
class Test extends CI_Controller {

	public function create_user() {

        if ( $this->aauth->create_user('saif55582@hotmail.co.uk','123456','saifali') ){
             echo 'OK. Succesful register';
        } else {
            echo 'Please fix the issues below';
            echo $this->aauth->print_errors();
        }            
    }

    public function login() {

        if ($this->aauth->login('saif55582@hotmail.co.uk', '123456', true)){
             echo 'OK. You are logged in';
        }
            
    }
    function il() {
    	echo $this->aauth->is_loggedin();
    }

    function logout() {
    	$this->aauth->logout();
    }

    function cp() {
    	echo $this->aauth->create_perm('attendance_teacher','opens teacher attendance module');
    }

    function gp() {
    	echo $this->aauth->get_perm_id('attendance_teacher');
    }


    function teacher() {
    	echo 'teacher';
    }

    function control() {
    	$teacher_attendance_perm_id =  $this->aauth->get_perm_id('attendance_teacher');
    	//echo $this->aauth->control($teacher_attendance_perm_id);
    	$permissions = $this->aauth->list_perms();
    	//print_r($permissions);
    	foreach($permissions as $permission) {
	    		//echo $permission->name;

	    }
        //$this->aauth->allow_group(4,1);
        $this->aauth->deny_group(4,1);
        echo $this->aauth->is_group_allowed(1,4);
	}


}