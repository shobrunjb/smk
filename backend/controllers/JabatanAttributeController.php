<?php

namespace backend\controllers;

use Yii;
use backend\models\ProJabatanAttribute;
use backend\models\ProJabatanAttributeSearch;
use backend\models\Jabatan;
use backend\models\JabatanSearch;
use backend\models\MstJabatanAttribute;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JabatanAttributeController implements the CRUD actions for ProJabatanAttribute model.
 */
class JabatanAttributeController extends Controller
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

    public function actionIndex()
    {
        $searchModel = new JabatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChange($i){
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        if (($model = Jabatan::findOne($id)) !== null) {
            return $this->render('change', [
                'model' => $model,
                'i' => $i,
            ]);
        }else{
            throw new NotFoundHttpException("Pegawai yang anda maksudkan tidak ditemukan [".$id."]");
        }
    }

    public function actionView($i){
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        if (($model = Jabatan::findOne($id)) !== null) {
            return $this->render('view', [
                'model' => $model,
                'i' => $i,
            ]);
        }else{
            throw new NotFoundHttpException("Pegawai yang anda maksudkan tidak ditemukan [".$id."]");
        }
    }

    /*
    public function actionSaveChange($i){ 
        $id_jabatan = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id_jabatan; exit();
        if(isset($_POST['multiplesubmit'])){
            $datas = MstJabatanAttribute::find()->all();
            foreach($datas as $data){
                //echo $data->personal_attribute;
                
                if(isset($_POST['entry_'.$data->id_mst_jabatan_attribute])){
                    //echo $_POST['entry_'.$data->id_mst_jabatan_attribute];
                }
                //echo '<Br>';

                //Check apakah sudah ada atribute dengan nilai tersebut sebelumnya
                $model = ProJabatanAttribute::find()
                    ->where([
                        'id_jabatan' => $id_jabatan,
                        'id_mst_jabatan_attribute'=>$data->id_mst_jabatan_attribute
                    ])->one();
                if($model == null){
                    $model = new ProJabatanAttribute();
                    $model->id_jabatan = $id_jabatan;
                    $model->id_mst_jabatan_attribute = $data->id_mst_jabatan_attribute;
                }
                if(isset($_POST['entry_'.$data->id_mst_jabatan_attribute])){
                    $model->id_mst_jabatan_attribute_grade = $_POST['entry_'.$data->id_mst_jabatan_attribute];
                }
                $model->save(false);
            }
            return $this->redirect(['view', 'i' => $i]);
        }

    }
    */

    public function actionSaveChange($i){ 
        $id_jabatan = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id_jabatan; exit();
        if(isset($_POST['multiplesubmit'])){
            $datas = MstJabatanAttribute::find()->all();
            foreach($datas as $data){
                //echo $data->personal_attribute;
                
                if(isset($_POST['entry_'.$data->id_mst_jabatan_attribute])){
                    //echo $_POST['entry_'.$data->id_mst_jabatan_attribute];
                }
                //echo '<Br>';


                $listGrades = 
                \backend\models\MstJabatanAttributeGrade::find()
                    ->where([
                        'id_mst_jabatan_attribute' => $data->id_mst_jabatan_attribute 
                ])
                ->all();
                foreach($listGrades as $listGrade){
                    //Check apakah sudah ada atribute dengan nilai tersebut sebelumnya
                    $model = ProJabatanAttribute::find()
                        ->where([
                            'id_jabatan' => $id_jabatan,
                            'id_mst_jabatan_attribute'=>$data->id_mst_jabatan_attribute,
                            'id_mst_jabatan_attribute_grade'=>$listGrade->id_mst_jabatan_attribute_grade,
                        ])->one();
                    if($model == null){
                        $model = new ProJabatanAttribute();
                        $model->id_jabatan = $id_jabatan;
                        $model->id_mst_jabatan_attribute = $data->id_mst_jabatan_attribute;
                        $model->id_mst_jabatan_attribute_grade = $listGrade->id_mst_jabatan_attribute_grade;
                    }

                    if(isset($_POST['fitt_value_'.$listGrade->id_mst_jabatan_attribute_grade])){
                        $model->id_mst_jabatan_attribute_grade = $listGrade->id_mst_jabatan_attribute_grade;
                        $model->fitting_value = $_POST['fitt_value_'.$listGrade->id_mst_jabatan_attribute_grade];
                        //echo $_POST['fitt_value_'.$listGrade->id_mst_jabatan_attribute_grade];
                        //echo '<br>';
                    }

                    if(isset($_POST['bobot_'.$data->id_mst_jabatan_attribute])){
                        $model->bobot_in_normalisasi = $_POST['bobot_'.$data->id_mst_jabatan_attribute];
                    }
                    $model->save(false);
                }
                
            }
            //exit();
            return $this->redirect(['view', 'i' => $i]);
        }

    }
}
