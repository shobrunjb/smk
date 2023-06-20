<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SupportError */

//$this->title = $model->id_support_error;
$this->title = 'Detail '.'Support Error';
$this->params['breadcrumbs'][] = ['label' => 'Support Error', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body support-error-view">
        <?php /*
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_support_error], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_support_error], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        */ ?>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'judul',
                'deskripsi:ntext',
                //'file_pendukung',
            ],
        ]) ?>
        <?php 
        echo "<h4>File Pendukung</h4>";
        $imgpath = $model->file_pendukung;
        $basepath = Yii::$app->request->baseUrl;
        if ($model->file_pendukung != "") {
            //echo '<img src="../../backend/web/uploads/support-error/'.$imgpath.'" class="img-responsive" alt="Foto"> ';
            echo '<img class="img-responsive"  src="' . $basepath . '/uploads/support-error/' . $imgpath . '" alt="Foto Pendukung"/>';
           
        } else {
            echo "No Image";
        }
        ?>
    </div>
</div>
