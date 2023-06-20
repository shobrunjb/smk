<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawai */
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

<div class="order-pegawai-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-3',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <?php //= $form->field($model, 'tanggal_order')->textInput() 
    ?>

    <?php
    echo $form->field($model, 'tanggal_order')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options'=>['readonly'=>'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            // 'endDate' => date('Y-m-d'),
            'startDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?php //= $form->field($model, 'nomor_order')->textInput(['maxlength' => true]) 
    ?>

    <?php //= $form->field($model, 'nomor_order_inc')->textInput() 
    ?>

    <?php //= $form->field($model, 'id_order_pegawai_kategori')->textInput() 
    ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listKategori = \yii\helpers\ArrayHelper::map(
        \backend\models\OrderPegawaiKategori::find()->orderBy([
            'id_order_pegawai_kategori' => SORT_ASC
        ])->asArray()->all(),
        'id_order_pegawai_kategori',
        'kategori'
    );
    ?>

    <?= $form->field($model, 'id_order_pegawai_kategori')->dropDownList(
        $listKategori,
        ['prompt' => 'Pilih Kategori ...']
    ); ?>


    <?php
    //if ($model->id_order_pegawai_kategori == 1) {
    //     $NoOrder1 = 'BK';
    // } elseif ($model->id_order_pegawai_kategori == 2) {
    //     $NoOrder1 = 'MT';
    // } elseif ($model->id_order_pegawai_kategori == 3) {
    //     $NoOrder1 = 'BM';
    // }
    ?>
    <?php //= $form->field($model, 'id_asset_kendaraan1')->textInput() 
    ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    /*
    $listKapal = \yii\helpers\ArrayHelper::map(
        \backend\models\AssetItem::find()
        ->select('asset_item.*,asset_master.*')  
        ->leftJoin('asset_master', 'asset_item.id_asset_master = asset_master.id_asset_master')
        ->where(['asset_master.id_type_asset1' => 2])
        //->with('asset_master')
        ->orderBy([
            'id_asset_item' => SORT_ASC
        ])->asArray()->all(),
        'id_asset_item',
        'number2'
    );
    */
    $listKapal = \backend\models\AssetItem::getListAssetItemByTypeAsset1(1);
    ?>

    <?= $form->field($model, 'id_asset_kendaraan1')->dropDownList(
        $listKapal,
        ['prompt' => 'Pilih Kapal ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    /*
    $listTongkang = \yii\helpers\ArrayHelper::map(
        \backend\models\AssetItem::find()
            // ->where(['id_asset_master' ])
            ->orderBy([
                'id_asset_item' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_asset_item',
        'number2'
    );
    */
    $listTongkang = \backend\models\AssetItem::getListAssetItemByTypeAsset1(2);
    ?>

    <?= $form->field($model, 'id_asset_kendaraan2')->dropDownList(
        $listTongkang,
        ['prompt' => 'Pilih Tongkang ...']
    ); ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?php //= $form->field($model, 'id_mst_order_progres')->textInput() 
    ?>

    <?= $form->field($model, 'deskripsi')->textarea(['maxlength' => 75]) ?>

    <?php //= $form->field($model, 'total_biaya')->textInput() 
    ?>

    <?php //= $form->field($model, 'status_pembayaran')->textInput(['maxlength' => true]) 
    ?>

    <?php //= $form->field($model, 'tanggal_pembayaran')->textInput() 
    ?>

    <?php //= $form->field($model, 'bukti_pembayaran')->textInput(['maxlength' => true]) 
    ?>

    <?php //= $form->field($model, 'created_date')->textInput() 
    ?>

    <?php //= $form->field($model, 'created_id_user')->textInput() 
    ?>

    <?php //= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) 
    ?>

    <div class="box-footer">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>