<?php

namespace backend\controllers;

use Yii;
use backend\models\SalesOrder;
use backend\models\MaterialSales;
use backend\models\MaterialSalesSearch;
use backend\models\SalesOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalesOrderController implements the CRUD actions for SalesOrder model.
 */
class SalesCustomController extends Controller
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
     * Lists all SalesOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalesOrderSearch();
        $searchModel->id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SalesOrder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    public function actionView($id)
    {
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id),
        ]);
    }
    */

    public function actionViewOrder($i, $opt="bc")
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('view-only', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id),
            'i'=>$i,
            'opt'=>$opt,
        ]);
    }

    public function actionUbahNomorOrder($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->reGenerateNomorSalesOrder();
            if($model->save()){
                $i = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_sales_order);
                return $this->redirect(['view-order', 'i' => $i]);
            }
        }
        return $this->render('ubah-nomor-order', [
            'id' => $id,
            'model' => $model,
        ]);
    }

    public function actionUbahStatusInvoice($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->reGenerateNomorSalesOrder();
            if($model->save()){
                //$i = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_sales_order);
                //return $this->redirect(['view-order', 'i' => $i]);
                Yii::$app->session->setFlash('success', 'Ubah order '.$model->nomor_sales_order.' dimana status invoice menjadi [<b>'.$model->status_invoice.'</b>] telah berhasil!');
                return $this->redirect(['index']);
            }
        }
        return $this->render('ubah-status-invoice', [
            'id' => $id,
            'model' => $model,
        ]);
    }

    /**
     * Finds the SalesOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SalesOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SalesOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelItem($id)
    {
        if (($model = MaterialSales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
