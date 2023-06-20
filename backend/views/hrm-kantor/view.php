<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmKantor */

//$this->title = $model->id_hrm_kantor;
$this->title = 'Detail '.'SMK Kantor';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Kantor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-kantor-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_hrm_kantor], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_hrm_kantor], [
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
                'nama_kantor',
            'alamat_kantor',
            'latitude',
            'longitude',
            'fax',
            'telepon',
            ],
        ]) ?>

    </div>
</div>
