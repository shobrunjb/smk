<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\FormPengajuanKeberatan */

$this->title = 'Tambah Form Pengajuan Keberatan';
$this->params['breadcrumbs'][] = ['label' => 'Form Pengajuan Keberatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
	/*
	.password-block{
		display: inline-block;
	}

	.fa-eye {
	    margin-left: 30px;
	    cursor: pointer;
	    position: absolute;
	    z-index: 2;
	}

	.fa-eye-slash {
	    margin-left: 30px;
	    cursor: pointer;
	    position: absolute;
	    z-index: 2;
	}
	*/

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

	/*
	#input_img {
	    position:absolute;
	    bottom:2px;
	    right:5px;
	    width:24px;
	    height:24px;
	}
	*/
</style>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/front_layout.css" rel="stylesheet">
<div class="box">
	<div class="box-body form-pengajuan-keberatan-create">

		<h1>Reset Password</h1>
		<hr class="hr_label_h1_short text-left" align="left">
		<?php $form = ActiveForm::begin([
		    'id' => 'login-form', 
		    'enableClientValidation' => false,
		    'fieldConfig' => [
		            'template' => "{input}{error}",
		            'options' => ['tag' => false], // remove wrapper tag

		        ],
		]); 
		?>		
		<div class="alert alert-info">Berdasarkan request dari yang telah dikirimkan dari email, anda ingin melakukan reset password. Silakan masukkan Password yang baru :</div>
		<div class="">
		<label class="control-label" for="publikuser-email">Password</label>
		<input type="text" id="publikuser-email" class="form-control" name="email" maxlength="200" aria-required="true">
		<div class="input-container">
			<input type="password" name="password" id="password" />
        	<i class="fa fa-eye-slash icc" id="togglePassword" onClick="showHidePassword()"></i>
        	
    	</div>

    	<?php /*
		<div class="input-container">
			<input class="input-field" type="text" placeholder="Email" name="email">
			<i class="fa fa-envelope icon"></i>
		</div>

		<div id="input_container">
		    <input type="text" id="input">
		    <img src="https://cdn4.iconfinder.com/data/icons/36-slim-icons/87/calender.png" id="input_img">
		</div>
		*/ ?>

		<p class="help-block help-block-error"></p>
		</div>

		<div class="form-group">
            <button type="submit" class="btn btn-success">UBAH PASSWORD</button>            
        </div>

		<?php ActiveForm::end(); ?>
	</div>
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


