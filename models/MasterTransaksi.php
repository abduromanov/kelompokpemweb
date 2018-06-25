<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_transaksi".
 *
 * @property int $Id_mst_transaksi
 * @property int $id_operator
 * @property string $tanggal_generate
 * @property string $Periode
 *
 * @property Operator $operator
 * @property TransaksiDetail[] $transaksiDetails
 */
class MasterTransaksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_transaksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_mst_transaksi', 'id_operator', 'tanggal_generate', 'Periode'], 'required'],
            [['Id_mst_transaksi', 'id_operator'], 'integer'],
            [['tanggal_generate', 'Periode'], 'safe'],
            [['Id_mst_transaksi'], 'unique'],
            [['id_operator'], 'exist', 'skipOnError' => true, 'targetClass' => Operator::className(), 'targetAttribute' => ['id_operator' => 'id_operator']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_mst_transaksi' => 'Id Mst Transaksi',
            'id_operator' => 'Id Operator',
            'tanggal_generate' => 'Tanggal Generate',
            'Periode' => 'Periode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(Operator::className(), ['id_operator' => 'id_operator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::className(), ['id_trx_mst' => 'Id_mst_transaksi']);
    }
}
