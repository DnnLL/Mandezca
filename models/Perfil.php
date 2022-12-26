<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property string $Telefono
 * @property int $client_id
 * @property string $Sexo
 * @property int $ID
 *
 * @property Client $client
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Telefono', 'client_id', 'Sexo'], 'required'],
            [['client_id'], 'integer'],
            [['Telefono'], 'string', 'max' => 11],
            [['Sexo'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Telefono' => 'Telefono',
            'client_id' => 'Client ID',
            'Sexo' => 'Sexo',
            'ID' => 'ID',
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
