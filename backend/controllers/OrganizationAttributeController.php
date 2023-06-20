<?php

namespace backend\controllers;

use Yii;
use backend\models\ProOrganizationAttribute;
use backend\models\ProOrganizationAttributeSearch;
use backend\models\Perusahaan;
use backend\models\PerusahaanSearch;
use backend\models\MstOrganizationAttribute;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerusahaanController implements the CRUD actions for Perusahaan model.
 */
class OrganizationAttributeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Perusahaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PerusahaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChange($i){
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        // echo $id;
        // $model = Perusahaan::findOne($id);
        // echo $model->perusahaan;
        // exit();
        if (($model = Perusahaan::findOne($id)) !== null) {
            return $this->render('change', [
                'model' => $model,
                'i' => $i,
            ]);
        }else{
            throw new NotFoundHttpException("Perusahaan yang anda maksudkan tidak ditemukan [".$id."]");
        }
    }

    /**
     * Displays a single Perusahaan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        if (($model = Perusahaan::findOne($id)) !== null) {
            return $this->render('view', [
                'model' => $model,
                'i' => $i,
            ]);
        }else{
            throw new NotFoundHttpException("Perusahaan yang anda maksudkan tidak ditemukan [".$id."]");
        }
    }

    // public function actionSaveChange($i){ 
    //     $id_organization = \common\utils\EncryptionDB::encryptor('decrypt', $i);
    //     //echo $id_organization; exit();
    //     if(isset($_POST['multiplesubmit'])){
    //         $datas = MstOrganizationAttribute::find()->all();
    //         foreach($datas as $data){
    //             //echo $data->personal_attribute;
                
    //             if(isset($_POST['entry_'.$data->id_mst_organization_attribute])){
    //                 //echo $_POST['entry_'.$data->id_mst_organization_attribute];
    //             }
    //             //echo '<Br>';

    //             //Check apakah sudah ada atribute dengan nilai tersebut sebelumnya
    //             $model = ProOrganizationAttribute::find()
    //                 ->where([
    //                     'id_organization' => $id_organization,
    //                     'id_mst_organization_attribute'=>$data->id_mst_organization_attribute
    //                 ])->one();
    //             if($model == null){
    //                 $model = new ProOrganizationAttribute();
    //                 $model->id_organization = $id_organization;
    //                 $model->id_mst_organization_attribute = $data->id_mst_organization_attribute;
    //             }
    //             if(isset($_POST['entry_'.$data->id_mst_organization_attribute])){
    //                 $model->id_mst_organization_attribute_grade = $_POST['entry_'.$data->id_mst_organization_attribute];
    //             }
    //             $model->save(false);
    //         }
    //         return $this->redirect(['view', 'i' => $i]);
    //     }

    // }

    public function actionSaveChange($i){ 
        $id_organization = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id_organization; exit();
        if(isset($_POST['multiplesubmit'])){
            $datas = MstOrganizationAttribute::find()->all();
            foreach($datas as $data){
                //echo $data->personal_attribute;
                
                if(isset($_POST['entry_'.$data->id_mst_organization_attribute])){
                    //echo $_POST['entry_'.$data->id_mst_organization_attribute];
                }
                //echo '<Br>';


                $listGrades = 
                \backend\models\MstOrganizationAttributeGrade::find()
                    ->where([
                        'id_mst_organization_attribute' => $data->id_mst_organization_attribute 
                ])
                ->all();
                foreach($listGrades as $listGrade){
                    //Check apakah sudah ada atribute dengan nilai tersebut sebelumnya
                    $model = ProOrganizationAttribute::find()
                        ->where([
                            'id_organization' => $id_organization,
                            'id_mst_organization_attribute'=>$data->id_mst_organization_attribute,
                            'id_mst_organization_attribute_grade'=>$listGrade->id_mst_organization_attribute_grade,
                        ])->one();
                    if($model == null){
                        $model = new ProOrganizationAttribute();
                        $model->id_organization = $id_organization;
                        $model->id_mst_organization_attribute = $data->id_mst_organization_attribute;
                        $model->id_mst_organization_attribute_grade = $listGrade->id_mst_organization_attribute_grade;
                    }

                    if(isset($_POST['fitt_value_'.$listGrade->id_mst_organization_attribute_grade])){
                        $model->id_mst_organization_attribute_grade = $listGrade->id_mst_organization_attribute_grade;
                        $model->fitting_value = $_POST['fitt_value_'.$listGrade->id_mst_organization_attribute_grade];
                        //echo $_POST['fitt_value_'.$listGrade->id_mst_organization_attribute_grade];
                        //echo '<br>';
                    }

                    if(isset($_POST['bobot_'.$data->id_mst_organization_attribute])){
                        $model->bobot_in_normalisasi = $_POST['bobot_'.$data->id_mst_organization_attribute];
                    }
                    $model->save(false);
                }
                
            }
            //exit();
            return $this->redirect(['view', 'i' => $i]);
        }

    }
}
