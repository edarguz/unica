<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "serie".
 *
 * @property string $id_serie
 * @property string $codigo
 * @property string $serie
 *
 * @property Recibidas[] $recibidas
 * @property Subserie[] $subseries
 */
class Serie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'serie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'serie'], 'required'],
            [['codigo'], 'integer'],
            [['serie'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_serie' => Yii::t('app', 'Id Serie'),
            'codigo' => Yii::t('app', 'Codigo'),
            'serie' => Yii::t('app', 'Serie'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecibidas()
    {
        return $this->hasMany(Recibidas::className(), ['id_serie' => 'id_serie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubseries()
    {
        return $this->hasMany(Subserie::className(), ['id_serie' => 'id_serie']);
    }
}
