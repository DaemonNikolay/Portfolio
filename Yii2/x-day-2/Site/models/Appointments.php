<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointments".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $specialist_id
 * @property string $date_of_admission
 *
 * @property User $user
 * @property Specialists $specialist
 */
class Appointments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'specialist_id', 'date_of_admission'], 'required'],
            [['user_id', 'specialist_id'], 'integer'],
            [['date_of_admission'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['specialist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialists::className(), 'targetAttribute' => ['specialist_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пациент',
            'specialist_id' => 'Специалист',
            'date_of_admission' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialist()
    {
        return $this->hasOne(Specialists::className(), ['id' => 'specialist_id']);
    }
}
