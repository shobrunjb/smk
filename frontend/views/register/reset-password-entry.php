<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\FormPengajuanKeberatan */

$this->title = 'Tambah Form Pengajuan Keberatan';
$this->params['breadcrumbs'][] = ['label' => 'Form Pengajuan Keberatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

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

 		<?= $this->render('_user', [
	        'model' => $user,
	    ]) ?>	
		<div class="alert alert-info">Berdasarkan request dari yang telah dikirimkan dari email, anda ingin melakukan reset password. Silakan masukkan Password yang baru :</div>
		<div class="">
		<?php if (!empty($errMsg)) {  ?>
		<div class="alert alert-warning"><strong><?php echo $errMsg; ?></strong></div>
		<?php } ?>

		<label class="control-label" for="publikuser-email">Password</label>

    	<?php
    		/*
			echo frontend\widgets\PasswordInput::widget([
                                    'name' => 'me',
                                    'attribute' => 'tanggal_pengajuan',
                                    'template' => '{addon}{input}',
                                    //'options'=>['readonly'=>'readonly'],

                                ]);
            */ 
    	?>
    	<?= frontend\widgets\passwordInputWidget::widget([
    		'name'=>'password'

    	]); ?>

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




