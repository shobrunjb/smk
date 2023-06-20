<?php

namespace backend\controllers;

use Yii;
use backend\models\SalesOrder;
use backend\models\MaterialSales;
use backend\models\MaterialFinish;
use backend\models\MaterialSalesSearch;
use backend\models\SalesOrderSearch;
use backend\models\SalesRetur;
use backend\models\SalesReturSearch;
use backend\models\SalesReturItem;
use backend\models\SalesReturItemeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalesOrderController implements the CRUD actions for SalesOrder model.
 */
class SalesReturCancelController extends Controller
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
    public function actionIndexCancel()
    {
        $searchModel = new SalesOrderSearch();
        $searchModel->id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
        $dataProvider = $searchModel->searchNonBaru(Yii::$app->request->queryParams);

        return $this->render('index-cancel', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexRetur()
    {
        $searchModel = new SalesOrderSearch();
        $searchModel->id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
        $dataProvider = $searchModel->searchNonBaru(Yii::$app->request->queryParams);

        return $this->render('index-retur', [
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
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        $models = $dataProvider->getModels();
        $total = 0;
        foreach ($models as $model) {
            $total += $model->sales_harga_jual*$model->yard;
        }

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'i' =>$i,
            'model' => $this->findModel($id),
            'total' => $total,
        ]);
    }


    public function actionViewCancel($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        $models = $dataProvider->getModels();
        $total = 0;
        foreach ($models as $model) {
            $total += $model->sales_harga_jual*$model->yard;
        }

        return $this->render('view-cancel', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'i' =>$i,
            'model' => $this->findModel($id),
            'total' => $total,
        ]);
    }


    public function actionCreateSalesRetur($i)
    {
        $id_sales_order = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $model_so = $this->findModel($id_sales_order);

        //Cek apakah sudah ada retur sebelumnya
        $sr = \backend\models\SalesRetur::find()->where([
            'id_sales_order' => $id_sales_order,
        ])
        ->one();
        if($sr != null){
            Yii::$app->session->setFlash('warning', "Retur sebelumnya pernah dibuat. Silakan dicek kembali gunakan apakah edit retur sebelumnya atau membuat retur yang baru!");
            $model = $sr;

            $searchModel = new SalesReturSearch();
            $searchModel->id_sales_order = $id_sales_order;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('/sales-retur-cancel/sales-retur/index', [
                'model' => $model,
                'model_so' => $model_so,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'i' => $i
            ]);
        }else{
            //Create Sales Retur lebih dahulu
            $model = new SalesRetur();
            $model->id_sales_order = $id_sales_order;
            $model->tanggal_retur = \common\helpers\Timeanddate::getCurrentDate();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $ir = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_sales_retur);
            return $this->redirect(['retur-select-item', 'ir' => $ir, 'i'=>$i]);
        }

        return $this->render('/sales-retur-cancel/create-sales-retur', [
            'model' => $model,
            'model_so' => $model_so,
        ]);
    }

    public function actionUpdateSalesRetur($i, $ir)
    {
        $id_sales_retur = \common\utils\EncryptionDB::encryptor('decrypt',$ir);
        $id_sales_order = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $model_so = $this->findModel($id_sales_order);

        //Cek apakah sudah ada retur sebelumnya
        $sr = \backend\models\SalesRetur::find()->where([
            'id_sales_retur' => $id_sales_retur,
        ])
        ->one();
        if($sr != null){
            $model = $sr;
        }else{
            //Create Sales Retur lebih dahulu
            Yii::$app->session->setFlash('danger', "Data retur tidak ditemukan!");
            return $this->redirect(['sales-retur-cancel/index-retur']);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $ir = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_sales_retur);
            return $this->redirect(['retur-select-item', 'ir' => $ir, 'i'=>$i]);
        }

        return $this->render('/sales-retur-cancel/create-sales-retur', [
            'model' => $model,
            'model_so' => $model_so,
        ]);
    }

    public function actionReturSelectItem($ir, $i, $opt="bc")
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $id_sales_retur = \common\utils\EncryptionDB::encryptor('decrypt',$ir);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('retur-select-item', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id), //modelOrder
            'modelRetur' => $this->findModelRetur($id_sales_retur),
            'i'=>$i,
            'ir'=>$ir,
            'opt'=>$opt,
            'id_sales_retur'=>$id_sales_retur,
            'readonly' => false,
        ]);
    }

    public function actionReturViewItem($ir, $i, $opt="bc")
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $id_sales_retur = \common\utils\EncryptionDB::encryptor('decrypt',$ir);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('retur-select-item', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id), //modelOrder
            'modelRetur' => $this->findModelRetur($id_sales_retur),
            'i'=>$i,
            'ir'=>$ir,
            'opt'=>$opt,
            'id_sales_retur'=>$id_sales_retur,
            'readonly' => true,
        ]);
    }

    public function actionReturItem($im, $i, $ir)
    {
        //$model = $this->findModelItem($id_item);       
        $id_item = \common\utils\EncryptionDB::encryptor('decrypt',$im);
        $id_sales_order = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $id_sales_retur = \common\utils\EncryptionDB::encryptor('decrypt',$ir);

        $sales_order= $this->findModel($id_sales_order);

       
        
        //$id_parent = \common\utils\EncryptionDB::encryptor('decrypt',$ip);

        //1. Rollback, kembalikan ke material_finish
        $materialsales = $this->findModelItem($id_item);
        MaterialSales::rollBackToMaterialFinish($materialsales);

        //2. Simpan ke Sales Retur Item dan tambahkan info terkait retur
        $materialretur = MaterialSales::saveToSalesReturItem($materialsales);
        $materialretur->retur_id_sales_order = $id_sales_order;
        $materialretur->retur_id_sales_retur = $id_sales_retur;
        $materialretur->retur_id_outlet_penjualan = $sales_order->id_outlet_penjualan; //Ini belum nemu
        $materialretur->retur_created_date = \common\helpers\Timeanddate::getCurrentDateTime();
        $materialretur->retur_created_id_user = Yii::$app->user->identity->id;
        $materialretur->retur_created_ip_address = \common\helpers\IPAddressFunction::getUserIPAddress();
        $materialretur->save(false);

        //3. Update pembayaran
        \backend\models\SalesJurnal::updateStatusPembayaran($sales_order);

        Yii::$app->session->setFlash('success', "Barang ini [".$materialsales->kode."] telah di-retur dan kembali ke stock gudang awal!");

        return $this->redirect(['retur-select-item', 'ir' => $ir, 'i'=>$i]);
    }

    public function actionHapusReturItem($im, $i, $ir)
    {      
        $id_item = \common\utils\EncryptionDB::encryptor('decrypt',$im);
        $id_sales_order = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $id_sales_retur = \common\utils\EncryptionDB::encryptor('decrypt',$ir);

        $sales_order= $this->findModel($id_sales_order);
        
        //$id_parent = \common\utils\EncryptionDB::encryptor('decrypt',$ip);

        //1. Rollback, kembalikan ke material_finish
        $materialreturitem = $this->findModelReturItem($id_item);
        $materialsales = MaterialSales::rollBackFromReturToSales($materialreturitem);

        Yii::$app->session->setFlash('success', "Barang ini [".$materialreturitem->kode."] tidak jadi di-retur dan kembali ke invoice!");

        //2. Hapus dari retur item
        $materialreturitem->delete();

        //3. Hapus material finish
        $materialfinish = $this->findMaterialFinish($materialsales->id_material_finish);
        $materialfinish->delete();


        return $this->redirect(['retur-select-item', 'ir' => $ir, 'i'=>$i]);
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

        throw new NotFoundHttpException('The sales order page ['.$id.'] does not exist.');
    }

    protected function findModelItem($id)
    {
        if (($model = MaterialSales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The material sales page ['.$id.'] does not exist.');
    }

    protected function findModelRetur($id)
    {
        if (($model = SalesRetur::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The retur page does ['.$id.'] does not exist.');
    }

    protected function findModelReturItem($id)
    {
        if (($model = SalesReturItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The retur item page does ['.$id.'] does not exist.');
    }

    protected function findMaterialFinish($id)
    {
        if (($model = MaterialFinish::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The material finish page does ['.$id.'] does not exist.');
    }

    public function actionCancelInvoice($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        
        $model = $this->findModel($id);
        if($model->status_invoice == "INVOICE"){
                //1. Ambil data-data sales
                $materialsaless = \backend\models\MaterialSales::find()->where([
                        'sales_id_sales_order' => $id,
                    ])
                    ->all();
                foreach($materialsaless as $materialsales){
                    //echo $materialsales->id_material_sales." <Br>";
                    MaterialSales::rollBackToMaterialFinish($materialsales);
                }
                

                //2. Ubah status pembayarannya
                //Untuk yang status pembayarannya belum dicek lagi

                //3. Sales Order tidak dihapus tetapi hanya diubah statusnya
                $model->status_invoice = 'CANCEL';
                $model->save(false);


                Yii::$app->session->setFlash('success', "Invoice ini telah diubah statusnya ke [".$model->status_invoice."]. Semua barang dikembalikan ke stock (Invoice jadi kosong)!");
        }else{
            Yii::$app->session->setFlash('danger', "Order ini tidak bisa dicancel karena statusnya [".$model->status_invoice."]!");
        }

        return $this->redirect(['view', 'i'=>$i]);
    }

    public function actionDeleteItem($id_item, $id_parent)
    {
        //$model = $this->findModelItem($id_item);       

        $this->findModelItem($id_item)->delete();

        return $this->redirect(['view', 'id' => $id_parent]);
    }
}
