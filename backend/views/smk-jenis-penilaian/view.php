<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkJenisPenilaian */

//$this->title = $model->id_smk_jenis_penilaian;
$this->title = 'Detail '.'Smk Jenis Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Smk Jenis Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body smk-jenis-penilaian-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_smk_jenis_penilaian], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_smk_jenis_penilaian], [
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
                'jenis_penilaian',
            ],
        ]) ?>

    </div>
</div>
