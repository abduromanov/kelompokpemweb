<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiDetail;

/**
 * TransaksiSearch represents the model behind the search form about `app\models\TransaksiDetail`.
 */
class TransaksiSearch extends TransaksiDetail
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
        $query = TransaksiDetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

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

    public function tunggakan($params, $params2)
    {
        $query = TransaksiDetail::find()->where(['status_bayar'=>$params2]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $params2);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

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
