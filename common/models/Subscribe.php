<?php

namespace common\models;

use Yii;
use frontend\components\Common;

/**
 * This is the model class for table "subscribe".
 *
 * @property integer $id
 * @property string $email
 * @property string $date_subscribe
 */
class Subscribe extends \yii\db\ActiveRecord
{
    const EVENT_NOTIFICATION_ADMIN = 'new-notification';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_subscribe'], 'safe'],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'date_subscribe' => 'Date Subscribe',
        ];
    }

    /**
     * initialize
     */
    public function init()
    {
        $this->on(self::EVENT_NOTIFICATION_ADMIN, [$this, 'notification']);
    }

    /**
     * @inheritdoc
     * @return SubscribeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubscribeQuery(get_called_class());
    }

    /**
     * send notification on event
     *
     * @param $event
     */
    public function notification($event)
    {
        $model = User::find()->where(['roles' => 'admin'])->all();
        foreach($model as $user) {
            (new Common)->sendMail('Notification', 'new subscribe', $user['email']);
        }
    }
}
