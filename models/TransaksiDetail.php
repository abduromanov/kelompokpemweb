<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_detail".
 *
 * @property int $id_trx_dtl
 * @property int $id_trx_mst
 * @property int $id_anggota
 * @property int $jumlah_bulan_lalu
 * @property int $jumlah_bulan_ini
 * @property int $harga_satuan_per_kubik
 * @property string $tanggal_bayar
 * @property string $status_bayar
 * @property int $jumlah_bayar
 *
 * @property Anggota $anggota
 * @property MasterTransaksi $trxMst
 */
class TransaksiDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_trx_mst', 'id_anggota', 'jumlah_bulan_lalu', 'jumlah_bulan_ini', 'harga_satuan_per_kubik', 'tanggal_bayar', 'status_bayar', 'jumlah_bayar'], 'required'],
            [['id_trx_mst', 'id_anggota', 'jumlah_bulan_lalu', 'jumlah_bulan_ini', 'harga_satuan_per_kubik', 'jumlah_bayar'], 'integer'],
            [['tanggal_bayar'], 'safe'],
            [['status_bayar'], 'string'],
            [['id_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['id_anggota' => 'id_anggota']],
            [['id_trx_mst'], 'exist', 'skipOnError' => true, 'targetClass' => MasterTransaksi::className(), 'targetAttribute' => ['id_trx_mst' => 'Id_mst_transaksi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_trx_dtl' => 'Id Trx Dtl',
            'id_trx_mst' => 'Id Trx Mst',
            'id_anggota' => 'Id Anggota',
            'jumlah_bulan_lalu' => 'Jumlah Bulan Lalu',
            'jumlah_bulan_ini' => 'Jumlah Bulan Ini',
            'harga_satuan_per_kubik' => 'Harga Satuan Per Kubik',
            'tanggal_bayar' => 'Tanggal Bayar',
            'status_bayar' => 'Status Bayar',
            'jumlah_bayar' => 'Jumlah Bayar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id_anggota' => 'id_anggota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrxMst()
    {
        return $this->hasOne(MasterTransaksi::className(), ['Id_mst_transaksi' => 'id_trx_mst']);
    }
}
