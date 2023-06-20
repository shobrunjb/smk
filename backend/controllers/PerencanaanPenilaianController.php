<?php

namespace backend\controllers;

use Yii;
use backend\models\SmkAspekRencana;
use backend\models\SmkAspekRencanaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SmkAspekRencanaController implements the CRUD actions for SmkAspekRencana model.
 */
class PerencanaanPenilaianController extends Controller
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
     * Lists all SmkAspekRencana models.
     * @return mixed
     */
    public function actionIndex($t=1, $year=0,$periode=0)
    {
        $searchModel = new SmkAspekRencanaSearch();
        $searchModel->tahun = $year;
        $searchModel->id_smk_periode = $periode;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if(isset($_POST['SmkAspekRencanaSearch'])){
            //echo $_POST['barcode'];
            $post = $_POST['SmkAspekRencanaSearch'];
            $yr = $post['tahun'];
            $isp = $post['id_smk_periode'];

            return $this->redirect(['index','t'=>$t,'year'=>$yr,'periode'=>$isp]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            't' =>$t,
            'year' =>$year,
            'periode' =>$periode
        ]);
    }

    /**
     * Displays a single SmkAspekRencana model.
     * @param integer $id
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
     * Creates a new SmkAspekRencana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($t=1, $year=0,$periode=0)
    {
        $model = new SmkAspekRencana();
        $model->tahun = $year;
        $model->id_aspek_penilaian = $t;
        $model->id_smk_periode = $periode;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','t' =>$t,'year'=>$year,'periode'=>$periode]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SmkAspekRencana model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SmkAspekRencana model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SmkAspekRencana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SmkAspekRencana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SmkAspekRencana::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
