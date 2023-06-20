<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HrmCompetencyDimension */

$this->title = 'Tambah Jenis Kompetensi';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kompetensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-competency-dimension-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
