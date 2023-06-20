<?php

namespace backend\controllers;

use app\models\PurchaseRaw;
use app\models\PurchaseRawSearch;
use backend\models\PurchaseRawItem;
use backend\models\PurchaseRawItemSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PurchaseRawController implements the CRUD actions for PurchaseRaw model.
 */
class PurchaseRawController extends Controller
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
     * Lists all PurchaseRaw models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PurchaseRawSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PurchaseRaw model.
     * @param int $id Id Purchase Raw
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //Ini Item Purchase Raw
        $searchModel = new PurchaseRawItemSearch();
        $searchModel->id_purchase_raw = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }

    /**
     * Creates a new PurchaseRaw model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PurchaseRaw();
        $model->tanggal_order = \common\helpers\Timeanddate::getCurrentDate();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_purchase_raw]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PurchaseRaw model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Id Purchase Raw
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_purchase_raw]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /*
    $ip = id parent ($id_purchase_raw)
    */
    public function actionCreateItem($ip)
    {
        $model = new PurchaseRawItem();
        $model->id_purchase_raw = $ip;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $ip]);
        }

        return $this->render('/purchase-raw/item/create_add', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PurchaseRaw model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Id Purchase Raw
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PurchaseRaw model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Id Purchase Raw
     * @return PurchaseRaw the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PurchaseRaw::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
