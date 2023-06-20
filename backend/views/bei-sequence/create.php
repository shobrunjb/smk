<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiSequence */

$this->title = 'Tambah Sequence';
$this->params['breadcrumbs'][] = ['label' => 'Sequence', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-sequence-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
