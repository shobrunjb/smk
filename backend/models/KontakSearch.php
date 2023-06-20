<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kontak;

/**
 * KontakSearch represents the model behind the search form of `backend\models\Kontak`.
 */
class KontakSearch extends Kontak
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kontak', 'id_perusahaan', 'pobox', 'tahun_implementasi_pertama'], 'integer'],
            [['nama_perusahaan', 'nama_singkat', 'nama_panjang', 'Alamat', 'Phone1', 'Phone2', 'phone3', 'nama_kota', 'fax_number', 'nama_aplikasi', 'Email', 'pin', 'logo'], 'safe'],
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
        $query = Kontak::find();

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
            'id_kontak' => $this->id_kontak,
            'id_perusahaan' => $this->id_perusahaan,
            'pobox' => $this->pobox,
            'tahun_implementasi_pertama' => $this->tahun_implementasi_pertama,
        ]);

        $query->andFilterWhere(['like', 'nama_perusahaan', $this->nama_perusahaan])
            ->andFilterWhere(['like', 'nama_singkat', $this->nama_singkat])
            ->andFilterWhere(['like', 'nama_panjang', $this->nama_panjang])
            ->andFilterWhere(['like', 'Alamat', $this->Alamat])
            ->andFilterWhere(['like', 'Phone1', $this->Phone1])
            ->andFilterWhere(['like', 'Phone2', $this->Phone2])
            ->andFilterWhere(['like', 'phone3', $this->phone3])
            ->andFilterWhere(['like', 'nama_kota', $this->nama_kota])
            ->andFilterWhere(['like', 'fax_number', $this->fax_number])
            ->andFilterWhere(['like', 'nama_aplikasi', $this->nama_aplikasi])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'pin', $this->pin])
            ->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}
