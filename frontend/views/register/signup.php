<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PublikUser */
$basepath = Yii::$app->request->baseUrl;
if($basepath == "/" ){
  //Handle untuk case di server (sudah pakai domain)
  $basepath = "";
}
?>

<link href="<?php echo $basepath; ?>/css/front_form.css" rel="stylesheet">
<link href="<?php echo $basepath; ?>/css/front_layout.css" rel="stylesheet">

<script src="<?php echo $basepath; ?>/js/jquery/3.3.1/jquery.min.js"></script>
<div class="box">
	<div class="box-body publik-user-create">
		<h1>Register Baru</h1>
		<hr class="hr_label_h1_short text-left" align="left">
		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>


