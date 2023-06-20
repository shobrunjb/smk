<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SupportError;

/**
 * SupportErrorSearch represents the model behind the search form of `backend\models\SupportError`.
 */
class SupportErrorSearch extends SupportError
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_support_error'], 'integer'],
            [['judul', 'deskripsi', 'file_pendukung'], 'safe'],
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
        $query = SupportError::find();

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
            'id_support_error' => $this->id_support_error,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'file_pendukung', $this->file_pendukung]);

        return $dataProvider;
    }
}
