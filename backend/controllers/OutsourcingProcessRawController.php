<?php

namespace backend\controllers;

use backend\models\OutsourcingProcessRaw;
use backend\models\OutsourcingProcessRawItem;
use backend\models\OutsourcingProcessRawItemSearch;
use backend\models\OutsourcingProcessRawSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OutsourcingProcessRawController implements the CRUD actions for OutsourcingProcessRaw model.
 */
class OutsourcingProcessRawController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all OutsourcingProcessRaw models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OutsourcingProcessRawSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OutsourcingProcessRaw model.
     * @param int $id Id Outsourcing Process Raw
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //Ini Item Outsourcing Raw
        $searchModel = new OutsourcingProcessRawItemSearch();
        $searchModel->id_outsourcing_process_raw = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }

    /**
     * Creates a new OutsourcingProcessRaw model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OutsourcingProcessRaw();
        $model->tanggal_proses = \common\helpers\Timeanddate::getCurrentDate();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_outsourcing_process_raw]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OutsourcingProcessRaw model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Id Outsourcing Process Raw
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_outsourcing_process_raw]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /*
    $ip = id parent ($id_outsourcing_raw)
    */
    public function actionCreateItem($ip)
    {
        $model = new OutsourcingProcessRawItem();
        $model->id_outsourcing_process_raw = $ip;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $ip]);
        }

        return $this->render('/outsourcing-process-raw/item/create_add', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OutsourcingProcessRaw model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Id Outsourcing Process Raw
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OutsourcingProcessRaw model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Id Outsourcing Process Raw
     * @return OutsourcingProcessRaw the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OutsourcingProcessRaw::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
