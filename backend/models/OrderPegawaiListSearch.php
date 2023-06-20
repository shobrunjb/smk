<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OrderPegawaiList;

/**
 * orderPegawaiListSearch represents the model behind the search form of `backend\models\orderPegawaiList`.
 */
class OrderPegawaiListSearch extends OrderPegawaiList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order_pegawai_list', 'id_order_pegawai', 'id_pegawai'], 'integer'],
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
        $query = OrderPegawaiList::find();

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
            'id_order_pegawai_list' => $this->id_order_pegawai_list,
            'id_order_pegawai' => $this->id_order_pegawai,
            'id_pegawai' => $this->id_pegawai,
        ]);

        /*
        $dataProvider->setSort([
            'defaultOrder' => ['orderPegawai.tanggal_order'=>SORT_DESC]
        ]);
        */

        return $dataProvider;
    }
}
