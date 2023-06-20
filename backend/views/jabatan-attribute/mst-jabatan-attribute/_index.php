<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\ProJabatanAttribute;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstJabatanAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id_jabatan = \common\utils\EncryptionDB::encryptor('decrypt', $i);
?>
<div class="box">
    <div class="box-body mst-jabatan-attribute-index">
        <?= Html::beginForm(['jabatan-attribute/save-change', 'i' => $i], 'POST'); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'jabatan_attribute',
                    // 'is_active',
                    [
                        'label' => 'Bobot (Dalam Normalisasi)',
                        'format' => 'raw',
                        'value' => function ($data) use ($status_view, $id_jabatan) {
                            
                            $currentGrade = 
                                \backend\models\ProJabatanAttribute::find()
                                    ->where([
                                        'id_jabatan' => $id_jabatan,
                                        'id_mst_jabatan_attribute' => $data->id_mst_jabatan_attribute,
                                       
                                    ])
                                    ->one();
                            if($currentGrade != null){
                                $currentBobot = $currentGrade->bobot_in_normalisasi;
                            }else{
                                $currentBobot = 0;
                            }

                            if($status_view == false){
                                $result = Html::input('text','bobot_'.$data->id_mst_jabatan_attribute ,$currentBobot, $options=['class'=>'form-control','maxlength'=>3, 'style'=>'width:70px']);
                                
                            }else{
                                $result = Html::input('text','bobot_'.$data->id_mst_jabatan_attribute ,$currentBobot, $options=['class'=>'form-control','maxlength'=>3, 'readonly'=>'readonly', 'style'=>'width:70px']);
                            }
                            return $result;
                        }
                    ],
                    [
                        'label' => 'Fitting Value',
                        'format' => 'raw',
                        'value' => function ($data) use ($status_view, $id_jabatan) {
                            $lastvalue = ProJabatanAttribute::find()
                                ->where([
                                    'id_jabatan' => $id_jabatan,
                                    'id_mst_jabatan_attribute'=>$data->id_mst_jabatan_attribute
                                ])->one();
                            if($lastvalue == null){
                                $lastvalue = new ProJabatanAttribute();
                            }

                            
                                /*
                                $listGrade = \yii\helpers\ArrayHelper::map(
                                    \backend\models\MstJabatanAttributeGrade::find()
                                        ->where([
                                            'id_mst_jabatan_attribute' => $data->id_mst_jabatan_attribute 
                                        ])
                                        ->asArray()->all(),
                                    'id_mst_jabatan_attribute_grade',
                                    'grade_label'
                                );
                                */
                                 $listGrades = 
                                    \backend\models\MstJabatanAttributeGrade::find()
                                        ->where([
                                            'id_mst_jabatan_attribute' => $data->id_mst_jabatan_attribute 
                                        ])
                                        ->all();
                                $result = "<ul>";
                                foreach($listGrades as $listGrade){
                                    $currentGrade = 
                                    \backend\models\ProJabatanAttribute::find()
                                        ->where([
                                            'id_jabatan' => $id_jabatan,
                                            'id_mst_jabatan_attribute' => $listGrade->id_mst_jabatan_attribute,
                                            'id_mst_jabatan_attribute_grade' =>$listGrade->id_mst_jabatan_attribute_grade
                                        ])
                                        ->one();
                                    if($currentGrade != null){
                                        $currentFittingValue = $currentGrade->fitting_value;
                                    }else{
                                        $currentFittingValue = 0;
                                    }
                                    $result .= "<li>".$listGrade->grade_label;
                                    if($status_view == false){
                                        $result .= Html::input('text','fitt_value_'.$listGrade->id_mst_jabatan_attribute_grade ,$currentFittingValue, $options=['class'=>'form-control','maxlength'=>3, 'style'=>'width:350px']);
                                    }else{
                                        $result .= Html::input('text','fitt_value_'.$listGrade->id_mst_jabatan_attribute_grade ,$currentFittingValue, $options=['class'=>'form-control','maxlength'=>3, 'readonly'=>'readonly' ,'style'=>'width:350px']);
                                    }
                                    $result .= '</li>';
                                }
                                $result .= "</ul>";
                                /*
                                $result = Html::dropDownList("entry_".$data->id_mst_jabatan_attribute,$lastvalue->id_mst_jabatan_attribute_grade,$listGrade, ['prompt' => '--- select ---']);
                                */


                            return $result;
                        },
                    ],

                    //['class' => 'yii\grid\ActionColumn'],
                ],
            ]); 
            ?>
        <?php if ($status_view == false) { ?>
        <div class="box-footer clearfix">
            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'name'=>'multiplesubmit']) ?>
            </div>
        </div>
        <?php } ?>  
        <?= Html::endForm(); ?>
    </div>
</div>
