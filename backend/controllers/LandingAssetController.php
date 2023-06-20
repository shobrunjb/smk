<?php

namespace backend\controllers;

use Yii;
use backend\models\LandingAsset;
use backend\models\LandingAssetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * LandingAssetController implements the CRUD actions for LandingAsset model.
 */
class LandingAssetController extends Controller
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
     * Lists all LandingAsset models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LandingAssetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LandingAsset model.
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
     * Creates a new LandingAsset model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        set_time_limit(0);
        $model = new LandingAsset();
        $model->has_child = 0;
        if ($model->load(Yii::$app->request->post()) ) {
            $model->icon = "--";
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->save()){
                //Upload File
                $model->attachFile = \yii\web\UploadedFile::getInstance($model, 'icon');
                if ($model->uploadIcon()) {
                    Yii::$app->session->setFlash('success', "Penambahan icon baru telah berhasil!");
                }

                if ($model->uploadFile()) {
                    Yii::$app->session->setFlash('success', "Penambahan file berhasil");
                }

                return $this->redirect(['index', 'id' => $model->id_landing_asset]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LandingAsset model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        set_time_limit(0);
        $model = $this->findModel($id);
        $model->scenario = LandingAsset::MODE_UPDATE;

        if ($model->load(Yii::$app->request->post())) {
            $uploadedFile  = UploadedFile::getInstance($model, 'file');
            if (!empty($uploadedFile)) {
                $model->file = $uploadedFile;
            }else{

            }
            if($model->save()){
                if ($model->uploadFile()) {
                    Yii::$app->session->setFlash('success', "Ubah informasi publik berhasil");
                }

                return $this->redirect(['view', 'id' => $model->id_landing_asset]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LandingAsset model.
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

    /**
     * Finds the LandingAsset model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LandingAsset the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LandingAsset::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
