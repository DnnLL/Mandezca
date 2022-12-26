<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property string $Direccion
 * @property int $ID
 * @property int $client_id
 *
 * @property Client $client
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Direccion', 'client_id'], 'required'],
            [['Direccion'], 'string'],
            [['client_id'], 'integer'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Direccion' => 'Direccion',
            'ID' => 'ID',
            'client_id' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['ID' => 'client_id']);
    }
}
