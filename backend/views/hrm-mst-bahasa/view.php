<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HrmMstBahasa */

// $this->title = $model->id_mst_bahasa;
$this->title = 'Detail '.'Bahasa';
$this->params['breadcrumbs'][] = ['label' => 'Bahasa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hrm-mst-bahasa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_mst_bahasa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_bahasa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_mst_bahasa',
            // 'id_perusahaan',
            'bahasa',
            'is_used',
        ],
    ]) ?>

</div>
