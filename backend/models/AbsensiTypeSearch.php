<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AbsensiType;

/**
 * AbsensiTypeSearch represents the model behind the search form of `backend\models\AbsensiType`.
 */
class AbsensiTypeSearch extends AbsensiType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_absensi_type'], 'integer'],
            [['absensi_type', 'keterangan'], 'safe'],
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
        $query = AbsensiType::find();

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
            'id_absensi_type' => $this->id_absensi_type,
        ]);

        $query->andFilterWhere(['like', 'absensi_type', $this->absensi_type])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
