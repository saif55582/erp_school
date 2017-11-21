<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function requiredStar() {
	return "<span class='text-danger'>*</span>";
}

function maleSelected() {
	echo "<option selected value='MALE'>MALE</option>
			<option value='FEMALE'>FEMALE</option>";
}


function femaleSelected() {
	echo "<option value='MALE'>MALE</option>
			<option selected value='FEMALE'>FEMALE</option>";
}

function gender() {
	echo "<option value='MALE'>MALE</option>
			<option value='FEMALE'>FEMALE</option>";
}
?>