<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HrmMstBahasa */

$this->title = 'Update Bahasa: ' . $model->id_mst_bahasa;
$this->params['breadcrumbs'][] = ['label' => 'Bahasas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_mst_bahasa, 'url' => ['view', 'id' => $model->id_mst_bahasa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hrm-mst-bahasa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
