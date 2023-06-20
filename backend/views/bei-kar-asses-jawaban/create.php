<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiKarAssesJawaban */

$this->title = 'Create Bei Kar Asses Jawaban';
$this->params['breadcrumbs'][] = ['label' => 'Bei Kar Asses Jawabans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-kar-asses-jawaban-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
