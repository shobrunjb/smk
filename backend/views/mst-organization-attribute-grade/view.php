<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstOrganizationAttributeGrade */

//$this->title = $model->id_mst_organization_attribute_grade;
$this->title = 'Detail '.'Organization Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Organization Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-organization-attribute-grade-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_organization_attribute_grade], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_organization_attribute_grade], [
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
                'id_mst_organization_attribute_grade',
                'grade_label',
            'grade_value',
            'keterangan',
            ],
        ]) ?>

    </div>
</div>
