<?php

namespace backend\controllers;

use Yii;
use backend\models\SalesOrder;
use backend\models\MaterialSales;
use backend\models\MaterialSalesSearch;
use backend\models\SalesOrderSearch;
use backend\models\SalesJurnal;
use backend\models\SalesJurnalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * SalesOrderController implements the CRUD actions for SalesOrder model.
 */
class SalesPembayaranController extends Controller
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
        $searchModel->status_invoice = 'INVOICE';
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
    public function actionView($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new SalesJurnalSearch();
        $searchModel->id_sales_jurnal = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['created_date' => SORT_DESC];

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'i' => $i,
            'model' => $this->findModel($id),
        ]);
    }


    public function actionUpdateInvoice($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('update-invoice', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SalesOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SalesOrder();
        
        //Diberikan default value tanggal hari ini
        $model->tanggal_order = \common\helpers\Timeanddate::getCurrentDate();

        if ($model->load(Yii::$app->request->post())) {
            $model->month = \common\helpers\Timeanddate::getMonthOnly($model->tanggal_order);
            $model->year = \common\helpers\Timeanddate::getYearOnly($model->tanggal_order);
            $model->id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
            $model->generateNomorSalesOrder();
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id_sales_order]);
            }
        }

        return $this->render('create_sales_order', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SalesOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatePembayaran($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        $model = $this->findModel($id);
        if($model->bayar_tanggal_bayar == "0000-00-00"){
            $model->bayar_tanggal_bayar = \common\helpers\Timeanddate::getCurrentDate();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'i' => $i]);
        }

        return $this->render('update-pembayaran', [
            'model' => $model,
        ]);
    }

    public function actionUpdatePembayaranTunai($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        $model = $this->findModel($id);
        if($model->bayar_tanggal_bayar == "0000-00-00"){
            $model->bayar_tanggal_bayar = \common\helpers\Timeanddate::getCurrentDate();
        }

        if($model->bayar_total_bayar <= 0){
            $model->bayar_total_bayar = $model->invoice_total;
        }

        if ($model->load(Yii::$app->request->post()) ) {
            $model->bayar_bukti = \yii\web\UploadedFile::getInstance($model, 'bayar_bukti');
            if($model->save()){
                if ($model->uploadFileBuktiBayar()) {
                    Yii::$app->session->setFlash('success', "Data pembayaran berhasil diupload!");
                }

                //Create Sales Jurnal
                /*
                Mengurangi piutang. Piutang otomatis tercreate ketika sales dibuat
                */
                $sj = \backend\models\SalesJurnal::find()->where([
                      'id_sales_order' => $id,
                      'type'=>'PEMBAYARAN PENJUALAN',
                  ])
                  ->one();
                if($sj != null){
                }else{
                    $sj = new SalesJurnal();
                }
                $sj->type = 'PEMBAYARAN PENJUALAN';
                $sj->id_sales_order = $id;
                $modelsalesorder = $this->findModel($id);
                $sj->id_customer = $modelsalesorder->id_customer;
                $sj->tanggal = \common\helpers\Timeanddate::getCurrentDate();

                //Hard Coded dulu
                //$sj->id_akun_debit = 1111; //Hardcoded Kas
                //$sj->id_akun_kredit = 1114; // Piutang Usaha
                $sj->id_akun_debit = \backend\models\AkunSearch::AkunKas();; //Hardcoded Kas
                $sj->id_akun_kredit = \backend\models\AkunSearch::AkunPiutangUsaha(); // Piutang Usaha
                $sj->kredit = 0;
                $sj->debit = $model->bayar_total_bayar;
                $sj->id_bank_pembayaran = $model->bayar_id_bank_pembayaran;
                $sj->bayar_bukti = $model->bayar_bukti;
                $sj->bayar_cara = $model->bayar_cara;

                $sj->jumlah_bayar = $sj->debit;
                $sj = \common\helpers\LogHelper::setCreatedLog($sj);
                $sj->save(false);

                //Ubah jadi lunas
                $model->status_pembayaran = 'LUNAS';
                $model->save(false);

                return $this->redirect(['view-pembayaran-bertahap', 'i' => $i]);
            }
        }

        return $this->render('update-pembayaran-tunai', [
            'model' => $model,
        ]);
    }

    public function actionUpdatePembayaranBertahap($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        $model = $this->findModel($id);
        if($model->bayar_tanggal_bayar == "0000-00-00"){
            $model->bayar_tanggal_bayar = \common\helpers\Timeanddate::getCurrentDate();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'i' => $i]);
        }

        return $this->render('update-pembayaran-bertahap', [
            'model' => $model,
            'i'=>$i,
            'readonly' => false,
        ]);
    }

    public function actionViewPembayaranBertahap($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);

        $model = $this->findModel($id);

        return $this->render('update-pembayaran-bertahap', [
            'model' => $model,
            'i'=>$i,
            'readonly' => true,
        ]);
    }

    public function actionUpdate($it)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$it);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/sales-pembayaran']);
        }

        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->render('update', [
                'model' => $this->findModel($id),
            ]);
        }

        /*
        return $this->render('sales-jurnal/update', [
            'model' => $model,
        ]);
        */
    }

    public function actionUpdateStatusPembayaran($it)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$it);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/sales-pembayaran']);
        }

        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('update-status-pembayaran', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->render('update-status-pembayaran', [
                'model' => $this->findModel($id),
            ]);
        }

        /*
        return $this->render('sales-jurnal/update', [
            'model' => $model,
        ]);
        */
    }

    public function actionUpdateItem($it, $i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$it);
        $model = $this->findModelSalesJurnal($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update-pembayaran-bertahap', 'i' => $i]);
        }

        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('sales-jurnal/update', [
                'model' => $this->findModelSalesJurnal($id),
            ]);
        } else {
            return $this->render('sales-jurnal/update', [
                'model' => $this->findModelSalesJurnal($id),
            ]);
        }

        /*
        return $this->render('sales-jurnal/update', [
            'model' => $model,
        ]);
        */
    }

    public function actionCreatePembayaranBertahap($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $modelsalesorder = $this->findModel($id);

        $model = new SalesJurnal();
        $model->type = 'PEMBAYARAN PENJUALAN';
        $model->id_sales_order = $id;
        $model->id_customer = $modelsalesorder->id_customer;
        $model->tanggal = \common\helpers\Timeanddate::getCurrentDate();

        //Hard Coded dulu
        //$model->id_akun_debit = 1111; //Hardcoded Kas
        //$model->id_akun_kredit = 1114; // Piutang Usaha
        $model->id_akun_debit = \backend\models\AkunSearch::AkunKas();; //Hardcoded Kas
        $model->id_akun_kredit = \backend\models\AkunSearch::AkunPiutangUsaha(); // Piutang Usaha
        $model->kredit = 0;
        $model = \common\helpers\LogHelper::setCreatedLog($model);

        if ($model->load(Yii::$app->request->post())) {
            $model->jumlah_bayar = $model->debit;


            $model->bayar_bukti = \yii\web\UploadedFile::getInstance($model, 'bayar_bukti');
            if($model->save()){
                if ($model->uploadFileBuktiBayar()) {
                    Yii::$app->session->setFlash('success', "Data pembayaran berhasil diupload!");
                }

                return $this->redirect(['update-pembayaran-bertahap', 'i' => $i]);
            }

            
        }

        return $this->render('sales-jurnal/create', [
            'model' => $model,
            'i'=>$i,
        ]);
    }

    /**
     * Deletes an existing SalesOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteItemPembayaran($it, $i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$it);
        $this->findModelSales($id)->delete();

        return $this->redirect(['update-pembayaran-bertahap', 'i' => $i]);
    }

    public function actionViewItem($it)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$it);
        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('sales-jurnal/view', [
                'model' => $this->findModelSalesJurnal($id),
            ]);
        } else {
            return $this->render('sales-jurnal/view', [
                'model' => $this->findModelSalesJurnal($id),
            ]);
        }
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

    protected function findModelSales($id)
    {
        if (($model = SalesJurnal::findOne($id)) !== null) {
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

    protected function findModelSalesJurnal($id)
    {
        if (($model = SalesJurnal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
