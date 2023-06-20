<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data User / Pengguna System';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Tambah User', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?= GridView::widget([
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-book"></span> Daftar User'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //                'id',
                'full_name',
                'username',
                'email:email',
                //                'password_hash',
                // 'auth_key',
                'user_level',
                /*
                [
                    'label' => 'Role',
                    'value' => 'nameOfRole',
                ],
				*/
                [
                    'label' => 'Status',
                    'value' => 'nameOfStatus',
                ],
                [
                    'label' => 'Reset Password',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt', $data->id);
                        return Html::a(
                            '<i class="fa fa-fw fa-recycle"></i> Reset Pass',
                            ['user/reset-password', 'i' => $i],
                            ['class' => 'btn btn-warning btn-xs']
                        );
                    }
                ],
                // 'password_reset_token',

                // 'role',

                // 'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>