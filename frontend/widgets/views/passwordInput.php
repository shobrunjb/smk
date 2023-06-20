<?php

use yii\helpers\Html;

?>
<style>
	.input-container {
		display: flex;
		width: 100%;
		margin-bottom: 15px;
	}

	.input-container input {
	 	width: 100%;
	}

	.input-container .icc {
		margin-top: 10px;
		clear: both;
		float:right;
		position: absolute;
	    z-index: 2;
	    right:30px;
	    cursor: pointer;
	}
</style>
<div class="input-container">
	
	<input type="password" name="<?= $name ?>" id="password" />
	<i class="fa fa-eye-slash icc" id="togglePassword" onClick="showHidePassword()"></i>
	
</div>

<script>
	function showHidePassword(){
		const password = document.querySelector('#password');
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    	password.setAttribute('type', type);
    	
    	if(type == 'text'){
			document.getElementById("togglePassword").classList.remove('fa-eye-slash');
			document.getElementById("togglePassword").classList.add('fa-eye');
		}
		if(type == 'password'){
			document.getElementById("togglePassword").classList.remove('fa-eye');
			document.getElementById("togglePassword").classList.add('fa-eye-slash');
		}
    	//document.getElementById("togglePassword").classList.toggle('fa-eye');
    	//this.classList.toggle('fa-eye');

	}
</script>