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
		<div class="alert alert-info">Anda lupa password? Anda dapat melakukan reset password. Kami akan kirimkan link untuk reset password ke email anda.</div>
		<div class="form-group field-publikuser-email required">
		<?php

		if($messageError != ''){
			echo '<div class="alert alert-danger">'.$messageError.'</div>';
		}
		?>
		<label class="control-label" for="publikuser-email">Email</label>
		<input type="text" id="publikuser-email" class="form-control" name="email" maxlength="200" aria-required="true">

		<p class="help-block help-block-error"></p>
		</div>

		<div class="form-group">
            <button type="submit" class="btn btn-success">KIRIM LINK</button>            
        </div>

		<?php ActiveForm::end(); ?>
	</div>
</div>
