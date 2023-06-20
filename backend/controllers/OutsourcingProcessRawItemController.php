<?php

namespace backend\controllers;

use backend\models\OutsourcingProcessRawItem;
use backend\models\OutsourcingProcessRawItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OutsourcingProcessRawItemController implements the CRUD actions for OutsourcingProcessRawItem model.
 */
class OutsourcingProcessRawItemController extends Controller
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
     * Lists all OutsourcingProcessRawItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OutsourcingProcessRawItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OutsourcingProcessRawItem model.
     * @param int $id Id Outsourcing Process Raw Item
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
     * Creates a new OutsourcingProcessRawItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OutsourcingProcessRawItem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_outsourcing_process_raw_item]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OutsourcingProcessRawItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Id Outsourcing Process Raw Item
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_outsourcing_process_raw_item]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OutsourcingProcessRawItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Id Outsourcing Process Raw Item
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $url = '/outsourcing-process-raw/view?id='.$model->id_outsourcing_process_raw;
        
        $model->delete();

        return $this->redirect([$url]);
    }

    /**
     * Finds the OutsourcingProcessRawItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Id Outsourcing Process Raw Item
     * @return OutsourcingProcessRawItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OutsourcingProcessRawItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
