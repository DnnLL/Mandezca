<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $ID
 * @property string $Empresa
 * @property string $Nombre
 * @property string $Apellido
 *
 * @property Address[] $addresses
 * @property Perfil[] $perfils
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Empresa', 'Nombre', 'Apellido'], 'required'],
            [['Empresa', 'Nombre', 'Apellido'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Empresa' => 'Empresa',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::class, ['client_id' => 'ID']);
    }

    /**
     * Gets query for [[Perfils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::class, ['client_id' => 'ID']);
    }
}
