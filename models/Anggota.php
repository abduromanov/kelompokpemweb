<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anggota".
 *
 * @property int $id_anggota
 * @property int $no_kk
 * @property string $alamat
 * @property int $nomor_telphone_hp
 * @property int $nomor_telphone_rumah
 * @property string $nama_lengkap
 * @property string $status_anggota
 *
 * @property TransaksiDetail[] $transaksiDetails
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_kk', 'alamat', 'nomor_telphone_hp', 'nomor_telphone_rumah', 'nama_lengkap', 'status_anggota'], 'required'],
            [['no_kk', 'nomor_telphone_hp', 'nomor_telphone_rumah'], 'integer'],
            [['alamat'], 'string'],
            [['nama_lengkap'], 'string', 'max' => 50],
            [['status_anggota'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_anggota' => 'Id Anggota',
            'no_kk' => 'No Kk',
            'alamat' => 'Alamat',
            'nomor_telphone_hp' => 'Nomor Telphone Hp',
            'nomor_telphone_rumah' => 'Nomor Telphone Rumah',
            'nama_lengkap' => 'Nama Lengkap',
            'status_anggota' => 'Status Anggota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::className(), ['id_anggota' => 'id_anggota']);
    }
}
