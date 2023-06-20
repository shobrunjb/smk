<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MstTingkatPendidikan;

/**
 * MstTingkatPendidikanSearch represents the model behind the search form of `backend\models\MstTingkatPendidikan`.
 */
class MstTingkatPendidikanSearch extends MstTingkatPendidikan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_tingkat_pendidikan'], 'integer'],
            [['tingkat_pendidikan', 'keterangan'], 'safe'],
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
        $query = MstTingkatPendidikan::find();

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
            'id_mst_tingkat_pendidikan' => $this->id_mst_tingkat_pendidikan,
        ]);

        $query->andFilterWhere(['like', 'tingkat_pendidikan', $this->tingkat_pendidikan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
