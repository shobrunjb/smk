<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmMstJenisAsuransi;

/**
 * HrmMstJenisAsuransiSearch represents the model behind the search form of `backend\models\HrmMstJenisAsuransi`.
 */
class HrmMstJenisAsuransiSearch extends HrmMstJenisAsuransi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_mst_jenis_asuransi', 'active_status'], 'integer'],
            [['jenis_asuransi'], 'safe'],
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
        $query = HrmMstJenisAsuransi::find();

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
            'id_hrm_mst_jenis_asuransi' => $this->id_hrm_mst_jenis_asuransi,
            'active_status' => $this->active_status,
        ]);

        $query->andFilterWhere(['like', 'jenis_asuransi', $this->jenis_asuransi]);

        return $dataProvider;
    }
}
