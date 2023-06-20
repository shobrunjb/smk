<?php

namespace backend\controllers;

use Yii;
use backend\models\ProEnvironmentAttribute;
use backend\models\ProEnvironmentAttributeSearch;
use backend\models\Kabupaten;
use backend\models\KabupatenSearch;
use backend\models\MstEnvironmentAttribute;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KabupatenController implements the CRUD actions for Kabupaten model.
 */
class EnvironmentAttributeController extends Controller
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
     * Lists all Kabupaten models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KabupatenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChange($i){
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        // echo $id;
        // $model = Kabupaten::findOne($id);
        // echo $model->perusahaan;
        // exit();
        if (($model = Kabupaten::findOne($id)) !== null) {
            return $this->render('change', [
                'model' => $model,
                'i' => $i,
            ]);
        }else{
            throw new NotFoundHttpException("Kabupaten yang anda maksudkan tidak ditemukan [".$id."]");
        }
    }

    /**
     * Displays a single Kabupaten model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        if (($model = Kabupaten::findOne($id)) !== null) {
            return $this->render('view', [
                'model' => $model,
                'i' => $i,
            ]);
        }else{
            throw new NotFoundHttpException("Kabupaten yang anda maksudkan tidak ditemukan [".$id."]");
        }
    }

    // public function actionSaveChange($i){ 
    //     $id_environment = \common\utils\EncryptionDB::encryptor('decrypt', $i);
    //     //echo $id_environment; exit();
    //     if(isset($_POST['multiplesubmit'])){
    //         $datas = MstEnvironmentAttribute::find()->all();
    //         foreach($datas as $data){
    //             //echo $data->personal_attribute;
                
    //             if(isset($_POST['entry_'.$data->id_mst_environment_attribute])){
    //                 //echo $_POST['entry_'.$data->id_mst_environment_attribute];
    //             }
    //             //echo '<Br>';

    //             //Check apakah sudah ada atribute dengan nilai tersebut sebelumnya
    //             $model = ProEnvironmentAttribute::find()
    //                 ->where([
    //                     'id_environment' => $id_environment,
    //                     'id_mst_environment_attribute'=>$data->id_mst_environment_attribute
    //                 ])->one();
    //             if($model == null){
    //                 $model = new ProEnvironmentAttribute();
    //                 $model->id_environment = $id_environment;
    //                 $model->id_mst_environment_attribute = $data->id_mst_environment_attribute;
    //             }
    //             if(isset($_POST['entry_'.$data->id_mst_environment_attribute])){
    //                 $model->id_mst_environment_attribute_grade = $_POST['entry_'.$data->id_mst_environment_attribute];
    //             }
    //             $model->save(false);
    //         }
    //         return $this->redirect(['view', 'i' => $i]);
    //     }

    // }

    public function actionSaveChange($i){ 
        $id_environment = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id_environment; exit();
        if(isset($_POST['multiplesubmit'])){
            $datas = MstEnvironmentAttribute::find()->all();
            foreach($datas as $data){
                //echo $data->personal_attribute;
                
                if(isset($_POST['entry_'.$data->id_mst_environment_attribute])){
                    //echo $_POST['entry_'.$data->id_mst_environment_attribute];
                }
                //echo '<Br>';


                $listGrades = 
                \backend\models\MstEnvironmentAttributeGrade::find()
                    ->where([
                        'id_mst_environment_attribute' => $data->id_mst_environment_attribute 
                ])
                ->all();
                foreach($listGrades as $listGrade){
                    //Check apakah sudah ada atribute dengan nilai tersebut sebelumnya
                    $model = ProEnvironmentAttribute::find()
                        ->where([
                            'id_environment' => $id_environment,
                            'id_mst_environment_attribute'=>$data->id_mst_environment_attribute,
                            'id_mst_environment_attribute_grade'=>$listGrade->id_mst_environment_attribute_grade,
                        ])->one();
                    if($model == null){
                        $model = new ProEnvironmentAttribute();
                        $model->id_environment = $id_environment;
                        $model->id_mst_environment_attribute = $data->id_mst_environment_attribute;
                        $model->id_mst_environment_attribute_grade = $listGrade->id_mst_environment_attribute_grade;
                    }

                    if(isset($_POST['fitt_value_'.$listGrade->id_mst_environment_attribute_grade])){
                        $model->id_mst_environment_attribute_grade = $listGrade->id_mst_environment_attribute_grade;
                        $model->fitting_value = $_POST['fitt_value_'.$listGrade->id_mst_environment_attribute_grade];
                        //echo $_POST['fitt_value_'.$listGrade->id_mst_environment_attribute_grade];
                        //echo '<br>';
                    }

                    if(isset($_POST['bobot_'.$data->id_mst_environment_attribute])){
                        $model->bobot_in_normalisasi = $_POST['bobot_'.$data->id_mst_environment_attribute];
                    }
                    $model->save(false);
                }
                
            }
            //exit();
            return $this->redirect(['view', 'i' => $i]);
        }

    }
}
