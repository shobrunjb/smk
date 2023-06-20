<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiSequence */

$this->title = 'Update Sequence: ' . $model->id_bei_sequence;
$this->params['breadcrumbs'][] = ['label' => 'Sequence', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bei_sequence, 'url' => ['view', 'id' => $model->id_bei_sequence]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bei-sequence-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
