<?php

namespace backend\controllers;

use backend\models\MaterialSampel;
use backend\models\MaterialSampelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialSampelController implements the CRUD actions for MaterialSampel model.
 */
class MaterialSampelController extends Controller
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
     * Lists all MaterialSampel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialSampelSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaterialSampel model.
     * @param int $id Id Material Sampel
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionGenerateBarcode($id, $label)
    {
        $model = $this->findModel($id);
        return $this->render('/material-sampel/barcode/generate-barcode-material', [
            'id' => $id,
            'model' => $model,
        ]);
    }

    /**
     * Creates a new MaterialSampel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialSampel();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $model->generateCode();
                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id_material_sampel]);
            }

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MaterialSampel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Id Material Sampel
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_material_sampel]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MaterialSampel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Id Material Sampel
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaterialSampel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Id Material Sampel
     * @return MaterialSampel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaterialSampel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
