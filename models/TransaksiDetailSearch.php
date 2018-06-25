<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiDetail;

/**
 * TransaksiDetailSearch represents the model behind the search form of `app\models\TransaksiDetail`.
 */
class TransaksiDetailSearch extends TransaksiDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_trx_dtl', 'id_trx_mst', 'id_anggota', 'jumlah_bulan_lalu', 'jumlah_bulan_ini', 'harga_satuan_per_kubik', 'jumlah_bayar'], 'integer'],
            [['tanggal_bayar', 'status_bayar'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TransaksiDetail::find()->where(['id_anggota'=>'1']);

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
            'id_trx_dtl' => $this->id_trx_dtl,
            'id_trx_mst' => $this->id_trx_mst,
            'id_anggota' => $this->id_anggota,
            'jumlah_bulan_lalu' => $this->jumlah_bulan_lalu,
            'jumlah_bulan_ini' => $this->jumlah_bulan_ini,
            'harga_satuan_per_kubik' => $this->harga_satuan_per_kubik,
            'tanggal_bayar' => $this->tanggal_bayar,
            'jumlah_bayar' => $this->jumlah_bayar,
        ]);

        $query->andFilterWhere(['like', 'status_bayar', $this->status_bayar]);

        return $dataProvider;
    }
}
