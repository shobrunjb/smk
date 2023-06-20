<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\ProOrganizationAttribute;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstOrganizationAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id_organization = \common\utils\EncryptionDB::encryptor('decrypt', $i);
?>
<div class="box">
    <div class="box-body mst-organization-attribute-index">
        <?= Html::beginForm(['organization-attribute/save-change', 'i' => $i], 'POST'); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'organization_attribute',
                //    'is_active',
                   [
                    'label' => 'Bobot (Dalam Normalisasi)',
                    'format' => 'raw',
                    'value' => function ($data) use ($status_view, $id_organization) {
                        
                        $currentGrade = 
                            \backend\models\ProOrganizationAttribute::find()
                                ->where([
                                    'id_organization' => $id_organization,
                                    'id_mst_organization_attribute' => $data->id_mst_organization_attribute,
                                   
                                ])
                                ->one();
                        if($currentGrade != null){
                            $currentBobot = $currentGrade->bobot_in_normalisasi;
                        }else{
                            $currentBobot = 0;
                        }

                        if($status_view == false){
                            $result = Html::input('text','bobot_'.$data->id_mst_organization_attribute ,$currentBobot, $options=['class'=>'form-control','maxlength'=>3, 'style'=>'width:70px']);
                            
                        }else{
                            $result = Html::input('text','bobot_'.$data->id_mst_organization_attribute ,$currentBobot, $options=['class'=>'form-control','maxlength'=>3, 'readonly'=>'readonly', 'style'=>'width:70px']);
                        }
                        return $result;
                    }
                ],
                [
                    'label' => 'Fitting Value',
                    'format' => 'raw',
                    'value' => function ($data) use ($status_view, $id_organization) {
                        $lastvalue = ProOrganizationAttribute::find()
                            ->where([
                                'id_organization' => $id_organization,
                                'id_mst_organization_attribute'=>$data->id_mst_organization_attribute
                            ])->one();
                        if($lastvalue == null){
                            $lastvalue = new ProOrganizationAttribute();
                        }

                        
                            /*
                            $listGrade = \yii\helpers\ArrayHelper::map(
                                \backend\models\MstOrganizationAttributeGrade::find()
                                    ->where([
                                        'id_mst_organization_attribute' => $data->id_mst_organization_attribute 
                                    ])
                                    ->asArray()->all(),
                                'id_mst_organization_attribute_grade',
                                'grade_label'
                            );
                            */
                             $listGrades = 
                                \backend\models\MstOrganizationAttributeGrade::find()
                                    ->where([
                                        'id_mst_organization_attribute' => $data->id_mst_organization_attribute 
                                    ])
                                    ->all();
                            $result = "<ul>";
                            foreach($listGrades as $listGrade){
                                $currentGrade = 
                                \backend\models\ProOrganizationAttribute::find()
                                    ->where([
                                        'id_organization' => $id_organization,
                                        'id_mst_organization_attribute' => $listGrade->id_mst_organization_attribute,
                                        'id_mst_organization_attribute_grade' =>$listGrade->id_mst_organization_attribute_grade
                                    ])
                                    ->one();
                                if($currentGrade != null){
                                    $currentFittingValue = $currentGrade->fitting_value;
                                }else{
                                    $currentFittingValue = 0;
                                }
                                $result .= "<li>".$listGrade->grade_label;
                                if($status_view == false){
                                    $result .= Html::input('text','fitt_value_'.$listGrade->id_mst_organization_attribute_grade ,$currentFittingValue, $options=['class'=>'form-control','maxlength'=>3, 'style'=>'width:350px']);
                                }else{
                                    $result .= Html::input('text','fitt_value_'.$listGrade->id_mst_organization_attribute_grade ,$currentFittingValue, $options=['class'=>'form-control','maxlength'=>3, 'readonly'=>'readonly' ,'style'=>'width:350px']);
                                }
                                $result .= '</li>';
                            }
                            $result .= "</ul>";
                            /*
                            $result = Html::dropDownList("entry_".$data->id_mst_organization_attribute,$lastvalue->id_mst_organization_attribute_grade,$listGrade, ['prompt' => '--- select ---']);
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
