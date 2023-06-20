<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstEnvironmentAttributeGrade */

//$this->title = $model->id_mst_environment_attribute_grade;
$this->title = 'Detail '.'Environment Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Environment Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-environment-attribute-grade-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_environment_attribute_grade], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_environment_attribute_grade], [
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
                'grade_label',
            'grade_value',
            'keterangan',
            ],
        ]) ?>

    </div>
</div>
