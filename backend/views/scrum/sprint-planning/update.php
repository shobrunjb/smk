<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductBacklog */

?>
<div class="box">
	<div class="box-body sprint">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	        't' => $t,
            'i' => $i,
            'idi' => $idi,
	    ]) ?>

	</div>
</div>
