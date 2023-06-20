<?php

namespace backend\controllers;

use backend\models\PurchaseRawItem;
use backend\models\PurchaseRawItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PurchaseRawItemController implements the CRUD actions for PurchaseRawItem model.
 */
class PurchaseRawItemController extends Controller
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
     * Lists all PurchaseRawItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PurchaseRawItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PurchaseRawItem model.
     * @param int $id Id Purchase Raw Item
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
     * Creates a new PurchaseRawItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PurchaseRawItem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_purchase_raw_item]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PurchaseRawItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Id Purchase Raw Item
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_purchase_raw_item]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PurchaseRawItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Id Purchase Raw Item
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $url = '/purchase-raw/view?id='.$model->id_purchase_raw;
        
        $model->delete();

        return $this->redirect([$url]);
    }

    /**
     * Finds the PurchaseRawItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Id Purchase Raw Item
     * @return PurchaseRawItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PurchaseRawItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
