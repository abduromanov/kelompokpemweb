<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operator".
 *
 * @property int $id_operator
 * @property string $username
 * @property string $password
 * @property string $nama_lengkap
 *
 * @property MasterTransaksi[] $masterTransaksis
 */
class Operator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama_lengkap'], 'required'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 255],
            [['nama_lengkap'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_operator' => 'Id Operator',
            'username' => 'Username',
            'password' => 'Password',
            'nama_lengkap' => 'Nama Lengkap',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterTransaksis()
    {
        return $this->hasMany(MasterTransaksi::className(), ['id_operator' => 'id_operator']);
    }
}
