<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiKarAssesJawaban */

$this->title = 'Update Bei Kar Asses Jawaban: ' . $model->id_bei_kar_asses_jawaban;
$this->params['breadcrumbs'][] = ['label' => 'Bei Kar Asses Jawabans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bei_kar_asses_jawaban, 'url' => ['view', 'id' => $model->id_bei_kar_asses_jawaban]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bei-kar-asses-jawaban-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
