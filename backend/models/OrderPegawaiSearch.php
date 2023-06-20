<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OrderPegawai;

/**
 * orderPegawaiSearch represents the model behind the search form of `backend\models\orderPegawai`.
 */
class OrderPegawaiSearch extends OrderPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order_pegawai', 'nomor_order_inc', 'id_order_pegawai_kategori', 'id_asset_kendaraan1', 'id_asset_kendaraan2', 'jumlah', 'id_mst_order_progres', 'total_biaya', 'created_id_user'], 'integer'],
            [['tanggal_order', 'nomor_order', 'deskripsi', 'status_pembayaran', 'tanggal_pembayaran', 'bukti_pembayaran', 'created_date', 'created_ip_address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = OrderPegawai::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_order_pegawai' => $this->id_order_pegawai,
            'tanggal_order' => $this->tanggal_order,
            'nomor_order_inc' => $this->nomor_order_inc,
            'id_order_pegawai_kategori' => $this->id_order_pegawai_kategori,
            'id_asset_kendaraan1' => $this->id_asset_kendaraan1,
            'id_asset_kendaraan2' => $this->id_asset_kendaraan2,
            'jumlah' => $this->jumlah,
            'id_mst_order_progres' => $this->id_mst_order_progres,
            'total_biaya' => $this->total_biaya,
            'tanggal_pembayaran' => $this->tanggal_pembayaran,
            'created_date' => $this->created_date,
            'created_id_user' => $this->created_id_user,
        ]);

        $query->andFilterWhere(['like', 'nomor_order', $this->nomor_order])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'status_pembayaran', $this->status_pembayaran])
            ->andFilterWhere(['like', 'bukti_pembayaran', $this->bukti_pembayaran])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address]);

        $dataProvider->setSort([
            'defaultOrder' => ['tanggal_order' => SORT_DESC]
        ]);

        return $dataProvider;
    }
}
