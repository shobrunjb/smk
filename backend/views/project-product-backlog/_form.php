<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductBacklog */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="product-backlog-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>

    <?php //= $form->field($model, 'id_project_mst_type')->textInput() ?>

    <?php //= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'order_number')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'product_backlog')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?php //= $form->field($model, 'id_wiki_page')->textInput() ?>

    <?php //= $form->field($model, 'external_information')->textInput(['maxlength' => true]) ?>

    


    <?php //= $form->field($model, 'id_time_metric')->textInput() ?>

    <?php
        //Mengambil list dari tabel sebelah (material)
        $listSatuanKerja = \yii\helpers\ArrayHelper::map(\backend\models\MstTimeMetric::find()->orderBy([
            'time_metric_id' => SORT_ASC
            ])->
            asArray()->all(), 'id_time_metric', 'time_metric_id');
    ?>

    <?php $formAdded = $form->field($model, 'id_time_metric',
            [ 
                'template' => '
                
                <div class="col-sm-6">{input}{error}</div>
                ' , 
            ]
            )->dropDownList(
            $listSatuanKerja,
            ['prompt' => 'Pilih Satuan ...']
        ); ?>

    <?= $form->field($model, 'load_estimatation',
            [ 
                'template' => '
                {label}
                <div class="col-lg-6">{input}{error}</div>
                <div class="col-lg-4">'.$formAdded.'</div>' , 

            ]
    )->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'priority')->textInput(['maxlength' => 6]) ?>

    <?php //= $form->field($model, 'id_sprint')->textInput() ?>

    <?php /*
    <?= $form->field($model, 'progres_by_team')->textInput() ?>

    <?= $form->field($model, 'progres_by_owner')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>
    */ ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>

            <?php
            //<i class="fa fa-fw fa-backward"></i> 
            echo \yii\helpers\Html::a(
                  'Cancel',
                  ['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'index'],
                  ['class' => 'btn btn-warning']
              );
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
