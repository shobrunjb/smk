<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HrmKantor;

/**
 * HrmKantorSearch represents the model behind the search form of `backend\models\HrmKantor`.
 */
class HrmKantorSearch extends HrmKantor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hrm_kantor', 'id_perusahaan', 'id_hrm_kantor_parent', 'id_kantor_kategori', 'id_kabupaten', 'id_propinsi'], 'integer'],
            [['nama_kantor', 'alamat_kantor', 'latitude', 'longitude', 'fax', 'telepon'], 'safe'],
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
        $query = HrmKantor::find();

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
            'id_hrm_kantor' => $this->id_hrm_kantor,
            'id_perusahaan' => $this->id_perusahaan,
            'id_hrm_kantor_parent' => $this->id_hrm_kantor_parent,
            'id_kantor_kategori' => $this->id_kantor_kategori,
            'id_kabupaten' => $this->id_kabupaten,
            'id_propinsi' => $this->id_propinsi,
        ]);

        $query->andFilterWhere(['like', 'nama_kantor', $this->nama_kantor])
            ->andFilterWhere(['like', 'alamat_kantor', $this->alamat_kantor])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'telepon', $this->telepon]);

        return $dataProvider;
    }
}
