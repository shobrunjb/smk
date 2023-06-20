<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvLanguageSkill */

//$this->title = $model->id_language_skill;
$this->title = 'Detail '.'Keahlian Bahasa';
$this->params['breadcrumbs'][] = ['label' => 'Keahlian Bahasa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-cv-language-skill-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_language_skill], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_language_skill], [
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
                'code_id',
                [
                    'attribute' => 'id_sekolah',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->HrmMstBahasa)) {
                            return $data->HrmMstBahasa->bahasa;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
            'tingkat_keahlian',
            'punya_sertifikat',
            'sertifikat',
            'foto_sertifikat',
            'created_date',
            'created_user',
            'created_ip_address',
            'modified_date',
            'modified_user',
            'modified_ip_address',
            ],
        ]) ?>

    </div>
</div>
