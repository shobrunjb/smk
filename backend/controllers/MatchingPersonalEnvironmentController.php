<?php

namespace backend\controllers;

use Yii;
use backend\models\ProPersonalAttribute;
use backend\models\ProPersonalAttributeSearch;
use backend\models\HrmPegawai;
use backend\models\HrmPegawaiSearch;
use backend\models\MstPersonalAttribute;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonalAttributeController implements the CRUD actions for ProPersonalAttribute model.
 */
class MatchingPersonalEnvironmentController extends Controller
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
        $searchModel = new HrmPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChange($i){
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        if (($model = HrmPegawai::findOne($id)) !== null) {
            return $this->render('change', [
                'model' => $model,
                'i' => $i,
            ]);
        }else{
            throw new NotFoundHttpException("Pegawai yang anda maksudkan tidak ditemukan [".$id."]");
        }
    }

    public function actionView($i,$d){
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        if (($model = HrmPegawai::findOne($id)) !== null) {
            return $this->render('view_matching', [
                'model' => $model,
                'i' => $i,
                'd' => $d
            ]);
        }else{
            throw new NotFoundHttpException("Pegawai yang anda maksudkan tidak ditemukan [".$id."]");
        }
    }

    public function actionSaveChange($i){ 
        $id_pegawai = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id_pegawai; exit();
        if(isset($_POST['multiplesubmit'])){
            $datas = MstPersonalAttribute::find()->all();
            foreach($datas as $data){
                //echo $data->personal_attribute;
                
                if(isset($_POST['entry_'.$data->id_mst_personal_attribute])){
                    //echo $_POST['entry_'.$data->id_mst_personal_attribute];
                }
                //echo '<Br>';

                //Check apakah sudah ada atribute dengan nilai tersebut sebelumnya
                $model = ProPersonalAttribute::find()
                    ->where([
                        'id_pegawai' => $id_pegawai,
                        'id_mst_personal_attribute'=>$data->id_mst_personal_attribute
                    ])->one();
                if($model == null){
                    $model = new ProPersonalAttribute();
                    $model->id_pegawai = $id_pegawai;
                    $model->id_mst_personal_attribute = $data->id_mst_personal_attribute;
                }
                if(isset($_POST['entry_'.$data->id_mst_personal_attribute])){
                    $model->id_mst_personal_attribute_grade = $_POST['entry_'.$data->id_mst_personal_attribute];
                }
                $model->save(false);
            }
            return $this->redirect(['view', 'i' => $i]);
        }

    }
}
