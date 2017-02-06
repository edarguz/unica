<?php

namespace backend\models;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "proceso".
 *
 * @property string $id_proceso
 * @property string $proceso
 *
 * @property Motivoausencia[] $motivoausencias
 */
class Proceso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
  public static function tableName()
    {
        return 'proceso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['proceso', 'id_funcionario'], 'required'],
            [['id_funcionario'], 'integer'],
            [['proceso'], 'string', 'max' => 40],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_funcionario' => 'id_funcionario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proceso' => Yii::t('app', 'Id Proceso'),
            'proceso' => Yii::t('app', 'Proceso'),
            'id_funcionario' => Yii::t('app', 'Funcionario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionario::className(), ['id_funcionario' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecibidas()
    {
        return $this->hasMany(Recibidas::className(), ['id_proceso' => 'id_proceso']);
    }
}
