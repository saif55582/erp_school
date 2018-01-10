<script type="text/javascript">
	
	function resetpwd(){

		var uname    = document.getElementById('uname').value;
		var pwd      = document.getElementById('pwd').value;
		var newpwd   = document.getElementById('newpwd').value;
		var repwd    = document.getElementById('repwd').value;

		if (uname == '' || pwd == '' || newpwd == '' || repwd == '') {

			demo.showNotification('top','center','done',4,'All Fields are Mandatory....!!');

			return false;

		}
		if (newpwd != repwd) {

			demo.showNotification('top','center','done',4,'Your new password is not same....!!');

			return false;
		}

	}

<?php

    $result = $this->session->flashdata('result');

    if($result == 'reset'){

        echo "demo.showNotification('top','center','done',2,'Password Reste..!!')";

    }

    if($result == 'notreset'){

        echo "demo.showNotification('top','center','error',4,'Check your Username or Password..!!')";

    }

?>
	
</script>