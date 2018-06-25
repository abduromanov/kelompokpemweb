<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "konfigurasi_tarif".
 *
 * @property int $id_kon_tarif
 * @property int $batas_bawag_kubik
 * @property int $batas_atas_kubik
 * @property int $harga_satuan_per_kubik
 */
class KonfigurasiTarif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'konfigurasi_tarif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kon_tarif', 'batas_bawah_kubik', 'batas_atas_kubik', 'harga_satuan_per_kubik'], 'required'],
            [['id_kon_tarif', 'batas_bawah_kubik', 'batas_atas_kubik', 'harga_satuan_per_kubik'], 'integer'],
            [['id_kon_tarif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kon_tarif' => 'Id Kon Tarif',
            'batas_bawag_kubik' => 'Batas Bawah Kubik',
            'batas_atas_kubik' => 'Batas Atas Kubik',
            'harga_satuan_per_kubik' => 'Harga Satuan Per Kubik',
        ];
    }
}
