<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRentangNilai */

//$this->title = $model->id_smk_aspek_rentang_nilai;
$this->title = 'Detail '.'Smk Aspek Rentang Nilai';
$this->params['breadcrumbs'][] = ['label' => 'Smk Aspek Rentang Nilai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body smk-aspek-rentang-nilai-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_smk_aspek_rentang_nilai], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_smk_aspek_rentang_nilai], [
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
                'nama_rentang_nilai',
            'predikat',
            'predikat_nilai',
            'is_has_rentang',
            'batas_bawah',
            'batas_atas',
            'label',
            ],
        ]) ?>

    </div>
</div>
