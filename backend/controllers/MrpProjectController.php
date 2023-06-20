<?php

namespace backend\controllers;

use Yii;
use backend\models\MrpProject;
use backend\models\MrpProjectSearch;
use backend\models\MrpProjectProductItem;
use backend\models\MrpProjectProductItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MrpProjectController implements the CRUD actions for MrpProject model.
 */
class MrpProjectController extends Controller
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
     * Lists all MrpProject models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MrpProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MrpProject model.
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
     * Creates a new MrpProject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MrpProject();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_mrp_project]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MrpProject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_mrp_project]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MrpProject model.
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
     * Finds the MrpProject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MrpProject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MrpProject::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionViewProduct($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        return $this->render('project-product-item/view-product', [
            'model' => $this->findModel($id),
            'i' =>$i,
        ]);

       
    }

    public function actionViewStructure($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        return $this->render('structure-product-item/view-structure', [
            'model' => $this->findModel($id),
            'i' =>$i,
        ]);

       
    }

    public function actionViewStructureDetail($i, $itr)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $id_mst_product_component = \common\utils\EncryptionDB::encryptor('decrypt',$itr);

        return $this->render('structure-product-item-detail/view-structure', [
            'model' => $this->findModel($id),
            'i' =>$i,
            'itr' => $itr,
            'id_mrp_project' =>$id,
            'id_mst_product_component' => $id_mst_product_component,
        ]);

       
    }
    /*
    $p = id parent dalam bentuk eknripsi (Parennya: MRP-Project)
    */
    public function actionCreateProductTarget($p)
    {
        $model = new MrpProjectProductItem();

        $id_parent = \common\utils\EncryptionDB::encryptor('decrypt',$p);

       
        $modelParent = $this->findModel($id_parent);

        $model->id_mrp_project = $id_parent;
        $model->plan_start_date = $modelParent->plan_start_date;
        $model->plan_end_date = $modelParent->plan_end_date;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-product', 'i' => $p]);
        }

        return $this->render('project-product-item/create', [
            'model' => $model,
            'modelParent' => $modelParent,
        ]);
    }
}
