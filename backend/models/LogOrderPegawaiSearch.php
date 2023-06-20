<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LogOrderPegawai;

/**
 * logOrderPegawaiSearch represents the model behind the search form of `backend\models\logOrderPegawai`.
 */
class LogOrderPegawaiSearch extends logOrderPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_log_order', 'id_order_pegawai', 'id_mst_order_progress'], 'integer'],
            [['isi_log_order'], 'safe'],
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
        $query = LogOrderPegawai::find();

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
            'id_log_order' => $this->id_log_order,
            'id_order_pegawai' => $this->id_order_pegawai,
            'id_mst_order_progress' => $this->id_mst_order_progress,
        ]);

        $query->andFilterWhere(['like', 'isi_log_order', $this->isi_log_order]);

        return $dataProvider;
    }
}
