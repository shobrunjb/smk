<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $model backend\models\PublikUser */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
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

<div class="publik-user-form">

    <?php $form = ActiveForm::begin([
        //'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        /*
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
        */
    ]);  ?>
    
    <?php 
    if ($model->hasErrors()) {
    ?>
    <div class="alert alert-danger">
        <?php echo $form->errorSummary($model, ['header' => "Terdapat kesalahan ketika memasukkan informasi"]); ?>
    </div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
           
            <?php //= $form->field($model, 'jenis_user')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'jenis_user')->dropDownList(
                ['PERORANGAN' => 'PERORANGAN', 'PERUSAHAAN' => 'PERUSAHAAN'],
                ['onchange'=>'
                        window.location.href =  "signup?jenis=" + $(this).val()
                ']
            ); ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

            <?php
            //window.location.href = window.location.href + "?jenis=" + $(this).val()
            ?>

            <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>

            

        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

            <?php //= $form->field($model, 'id_propinsi')->textInput() ?>

            <?php /*
            <?php
            $listPropinsi = \yii\helpers\ArrayHelper::map(\backend\models\Propinsi::find()->orderBy([
                'nama_propinsi' => SORT_ASC
                ])->
                asArray()->all(), 'id_propinsi', 'nama_propinsi');
            ?>

            <?= $form->field($model, 'id_propinsi')->dropDownList(
                $listPropinsi,
                ['prompt' => 'Pilih Provinsi ...']
            ); ?>

            <?php //= $form->field($model, 'id_kabupaten')->textInput() ?>

            <?php
            $listKapubaten = \yii\helpers\ArrayHelper::map(\backend\models\Kabupaten::find()->orderBy([
                'nama_kabupaten' => SORT_ASC
                ])->
                asArray()->all(), 'id_kabupaten', 'nama_kabupaten');
            ?>

            <?= $form->field($model, 'id_kabupaten')->dropDownList(
                $listKapubaten,
                ['prompt' => 'Pilih Kabupaten ...']
            ); ?>
            */ ?>

            <?php
            //Depedent Dropdown
            //Referensi : https://www.yiiframework.com/wiki/723/creating-a-dependent-dropdown-from-scratch-in-yii2
            use yii\helpers\ArrayHelper;
            $listPropinsi = \yii\helpers\ArrayHelper::map(\backend\models\Propinsi::find()->orderBy([
                    'nama_propinsi' => SORT_ASC
                    ])->
                    asArray()->all(), 'id_propinsi', 'nama_propinsi');
            echo $form->field($model, 'id_propinsi')->dropDownList($listPropinsi, 
                     ['prompt'=>'Pilih Provinsi ...',
                      'onchange'=>'
                        $.get( "'.Yii::$app->urlManager->createUrl('register/list-kabupaten?id=').'"+$(this).val(), function( data ) {
                          $( "select#publikuser-id_kabupaten" ).html( data );
                        });
                    ']); 
    

            
            $listKapubaten = \yii\helpers\ArrayHelper::map(\backend\models\Kabupaten::find()->orderBy([
                'nama_kabupaten' => SORT_ASC
                ])->
                asArray()->all(), 'id_kabupaten', 'nama_kabupaten');
            //$listKapubaten = [];
            echo $form->field($model, 'id_kabupaten')->dropDownList(
                $listKapubaten,
                ['prompt' => 'Pilih Kabupaten ...']
            ); 
            ?>


            <?= $form->field($model, 'nomor_telepon')->textInput(['maxlength' => true]) ?>

            

            <?php //= $form->field($model, 'id_user')->textInput() ?>

            <?php //= $form->field($model, 'file_identitas')->fileInput(['maxlength' => true]) ?>


            <?php /*
            <div class="label-fr-info">Silahkan upload KTP berekstensi PNG, JPG, JPEG atau PDF dengan ukuran maksimal 1 MB.</div>

            <?= $form->field($model, 'file_identitas')->fileInput(['multiple' => false, 'accept' => 'image/jpg, image/png, image/jpeg']) ?> 

            <?php //= $form->field($model, 'file_akta_pendirian')->fileInput(['maxlength' => true]) ?>

            <?php 
            
            if($model->jenis_user == "BADAN PUBLIK"){
                echo "Silahkan upload Akta Pendirian berekstensi PNG, JPG, JPEG atau PDF dengan ukuran maksimal 1 MB.";
                echo $form->field($model, 'file_akta_pendirian')->fileInput(['multiple' => false, 'accept' => 'image/jpg, image/png, image/jpeg']) ;
            }
            ?> 
            */ ?>

            <?php /*
            <div class="label-fr-info">Silahkan mengisi password yang mudah diingat. Alamat email dan password
            akan digunakan untuk mengajukan permohonan dan keberatan.</div> */ ?>

            <?php /*
            <?= Html::label('User name', 'username', ['class' => 'control-label']) ?>
            <?= Html::input('text','password1','', $options=['class'=>'form-control','maxlength'=>150, 'readonly'=>true, 'style'=>'']) ?>
            */ ?>

            <?php //= $form->field($model, 'password1')->passwordInput(['maxlength' => true]) ?>
            <label class="control-label" for="publikuser-password1">Password *</label>
            <?= frontend\widgets\passwordInputWidget::widget([
                'name'=>'PublikUser[password1]'
                
            ]); ?>

            <?php /*
            <?= Html::label('Password', 'username', ['class' => 'control-label']) ?>
            <?= Html::input('password','password1','', $options=['class'=>'form-control','maxlength'=>10, 'style'=>'']) ?>
            */ ?>
            <?php /*
            <?= $form->field($model, 'verifyCode')->widget(
                yii\captcha\Captcha::className(),
                [
                    'captchaAction' => 'helper/captcha',
                    'template' => '<div class="captcha_img">{image}{input}</div>',
                ]
            )->label('Masukan Captcha [Klik pada gambar untuk ganti kode]'); ?>
            */ ?>

            <div class="form-group">
                <?= Html::submitButton('DAFTAR', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
