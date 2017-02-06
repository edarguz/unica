<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subserie".
 *
 * @property string $id_subserie
 * @property string $codigo
 * @property string $subserie
 * @property string $id_serie
 *
 * @property Recibidas[] $recibidas
 * @property Serie $idSerie
 * @property Tipodocumental[] $tipodocumentals
 */
class Subserie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subserie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'subserie', 'id_serie'], 'required'],
            [['codigo', 'id_serie'], 'integer'],
            [['subserie'], 'string', 'max' => 50],
            [['id_serie'], 'exist', 'skipOnError' => true, 'targetClass' => Serie::className(), 'targetAttribute' => ['id_serie' => 'id_serie']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_subserie' => Yii::t('app', 'Id Subserie'),
            'codigo' => Yii::t('app', 'Codigo'),
            'subserie' => Yii::t('app', 'Subserie'),
            'id_serie' => Yii::t('app', 'Serie'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecibidas()
    {
        return $this->hasMany(Recibidas::className(), ['id_subserie' => 'id_subserie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSerie()
    {
        return $this->hasOne(Serie::className(), ['id_serie' => 'id_serie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipodocumental()
    {
        return $this->hasMany(Tipodocumental::className(), ['id_subserie' => 'id_subserie']);
    }
}
