<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PublikUser;

/**
 * PublikUserSearch represents the model behind the search form of `backend\models\PublikUser`.
 */
class PublikUserSearch extends PublikUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_publik_user', 'id_propinsi', 'id_kabupaten', 'id_user'], 'integer'],
            [['nama', 'jenis_user', 'nik', 'pekerjaan', 'alamat', 'nomor_telepon', 'email', 'file_identitas', 'file_akta_pendirian'], 'safe'],
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
        $query = PublikUser::find();

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
            'id_publik_user' => $this->id_publik_user,
            'id_propinsi' => $this->id_propinsi,
            'id_kabupaten' => $this->id_kabupaten,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_user', $this->jenis_user])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nomor_telepon', $this->nomor_telepon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'file_identitas', $this->file_identitas])
            ->andFilterWhere(['like', 'file_akta_pendirian', $this->file_akta_pendirian]);

        return $dataProvider;
    }
}
