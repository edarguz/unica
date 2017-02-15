<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "despachada".
 *
 * @property string $id_despachada
 * @property string $fecha_envio
 * @property string $consecutivo
 * @property string $id_proceso
 * @property string $entidad
 * @property string $persona
 * @property string $asunto
 * @property string $anexos
 * @property string $devolucion
 * @property string $fecha_recibo
 * @property string $firma
 *
 * @property Proceso $idProceso
 */
class Despachada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'despachada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_envio', 'consecutivo', 'id_proceso', 'entidad', 'persona', 'asunto', 'anexos', 'fecha_recibo'], 'required'],
            [['fecha_envio', 'fecha_recibo'], 'safe'],
            [['consecutivo', 'id_proceso'], 'integer'],
            [['asunto'], 'string'],
            [['entidad', 'devolucion'], 'string', 'max' => 50],
            [['persona', 'anexos'], 'string', 'max' => 60],
            [['firma'], 'string', 'max' => 40],
            [['id_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => Proceso::className(), 'targetAttribute' => ['id_proceso' => 'id_proceso']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_despachada' => Yii::t('app', 'Id Despachada'),
            'fecha_envio' => Yii::t('app', 'Fecha Envio'),
            'consecutivo' => Yii::t('app', 'Número Consecutivo'),
            'id_proceso' => Yii::t('app', 'Proceso'),
            'entidad' => Yii::t('app', 'Entidad'),
            'persona' => Yii::t('app', 'Persona'),
            'asunto' => Yii::t('app', 'Asunto'),
            'anexos' => Yii::t('app', 'Anexos'),
            'devolucion' => Yii::t('app', 'Devolución'),
            'fecha_recibo' => Yii::t('app', 'Fecha Recibo'),
            'firma' => Yii::t('app', 'Firma'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProceso()
    {
        return $this->hasOne(Proceso::className(), ['id_proceso' => 'id_proceso']);
    }
}
