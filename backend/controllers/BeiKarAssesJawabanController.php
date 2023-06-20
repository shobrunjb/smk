<?php

namespace backend\controllers;

use Yii;
use backend\models\BeiKarAssesJawaban;
use backend\models\BeiKarAssesJawabanSearch;
use backend\models\HrmPegawai;
use backend\models\HrmPegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\BeiInterviewSession;
use backend\models\BeiInterviewSessionSearch;
use backend\common\helpers\AuthHelper;
use backend\common\helpers\LogHelper;
use backend\common\utils\EncryptionUtil;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * BeiKarAssesJawabanController implements the CRUD actions for BeiKarAssesJawaban model.
 */
class BeiKarAssesJawabanController extends Controller
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
     * Lists all BeiKarAssesJawaban models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeiKarAssesJawabanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BeiKarAssesJawaban model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BeiKarAssesJawaban model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BeiKarAssesJawaban();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_bei_kar_asses_jawaban]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionPegawaiListSession($id_pegawai){
        $searchModel = new BeiInterviewSessionSearch();

        $searchModel->id_pegawai = $id_pegawai;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('pegawai-list-session', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionDeleteHasil($id)
    {

        $this->findModel($id)->delete();

        $searchModel = new BeiKarAssesJawabanSearch();
        $params = EncryptionUtil::staticEncryptor("encrypt",$searchModel->id_bei_interview_session);
        return $this->redirect(['list-hasil','i' => $params]);
        //return Url::remember();
        //return $this->goBack();
        //return Url::current();
        //return $this->refresh();

    }

    public function actionListHasil($i)
    {
        $searchModel = new BeiKarAssesJawabanSearch();
        $id_bei_interview_session = EncryptionUtil::staticEncryptor('decrypt',$i);
        $searchModel->id_bei_interview_session = $id_bei_interview_session;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // ini untuk editablenya
        if (Yii::$app->request->post('hasEditable')) {

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $id = Yii::$app->request->post('editableKey');
            $model = BeiKarAssesJawaban::findOne($id);
            //$out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['BeiKarAssesJawaban']);
            $post['BeiKarAssesJawaban'] = $posted;
            // load model like any single model validation
            if ($model->load($post)) {
                $model->save(false);
                $output = '';
                //$out = Json::encode(['output'=>$output, 'message'=>'']);
                return ['output'=>$output, 'message'=>''];
            } 
            // return ajax json encoded response and exit
            echo $out;

            return;

        } //end of editable

        return $this->render('list-hasil', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCountScore($i)
    {
        $searchModel = new BeiKarAssesJawabanSearch();
        $id_bei_interview_session = EncryptionUtil::staticEncryptor('decrypt',$i);
        $searchModel->id_bei_interview_session = $id_bei_interview_session;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('count-score', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPredictScore($i)
    {
        set_time_limit(0);
        $searchModel = new BeiKarAssesJawabanSearch();
        $id_bei_interview_session = EncryptionUtil::staticEncryptor('decrypt',$i);
        $searchModel->id_bei_interview_session = $id_bei_interview_session;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('predict-score', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDisplayWordBag()
    {


        return $this->render('display-word-bag', [

        ]);
    }

    public function actionDisplayWordKey()
    {


        return $this->render('display-word-key', [

        ]);
    }

    public function actionDisplayFinishResult()
    {


        return $this->render('display-finish-result', [

        ]);
    }

    /**
     * Updates an existing BeiKarAssesJawaban model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_bei_kar_asses_jawaban]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BeiKarAssesJawaban model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


     public function actionListPerPegawai()
    {
        $searchModel = new HrmPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listPegawai', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the BeiKarAssesJawaban model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return BeiKarAssesJawaban the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BeiKarAssesJawaban::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
