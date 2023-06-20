<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstPersonalAttribute */

//$this->title = $model->id_mst_personal_attribute;
$this->title = 'Detail '.'Personal Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Personal Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-personal-attribute-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_personal_attribute], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_personal_attribute], [
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
                'personal_attribute',
            'is_active',
            ],
        ]) ?>

    </div>
</div>
