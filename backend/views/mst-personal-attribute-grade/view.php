<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstPersonalAttributeGrade */

//$this->title = $model->id_mst_personal_attribute_grade;
$this->title = 'Detail '.'Personal Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Personal Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-personal-attribute-grade-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_personal_attribute_grade], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_personal_attribute_grade], [
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
                [
                    'attribute' => 'id_mst_personal_attribute',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->personalAttribute)) {
                            return $data->personalAttribute->personal_attribute;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_mst_personal_attribute', $dataListPersonalAttribute, ['class' => 'form-control']),
                ],
                'grade_label',
                'grade_value',
                'keterangan',
            ],
        ]) ?>

    </div>
</div>
