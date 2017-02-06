<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipodocumental".
 *
 * @property string $id_tipodocumental
 * @property string $codigo
 * @property string $tipodocumental
 * @property string $id_subserie
 *
 * @property Recibidas[] $recibidas
 * @property Subserie $idSubserie
 */
class Tipodocumental extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipodocumental';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'tipodocumental', 'id_subserie'], 'required'],
            [['codigo', 'id_subserie'], 'integer'],
            [['tipodocumental'], 'string', 'max' => 50],
            [['id_subserie'], 'exist', 'skipOnError' => true, 'targetClass' => Subserie::className(), 'targetAttribute' => ['id_subserie' => 'id_subserie']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipodocumental' => Yii::t('app', 'Id Tipodocumental'),
            'codigo' => Yii::t('app', 'Codigo'),
            'tipodocumental' => Yii::t('app', 'Tipo documental'),
            'id_subserie' => Yii::t('app', 'Subserie'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecibidas()
    {
        return $this->hasMany(Recibidas::className(), ['id_tipo_doc' => 'id_tipodocumental']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubserie()
    {
        return $this->hasOne(Subserie::className(), ['id_subserie' => 'id_subserie']);
    }
}
