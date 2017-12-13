<?php
namespace frontend\components;

use yii\base\Component;
use Yii;

class Common extends Component
{
    const EVENT_NOTIFY = 'notify_admin';

    public function sendMail($email, $name='', $subject, $body)
    {
        /*Yii::$app->mail->compose()
            ->setFrom([Yii::$app->params['supportEmail'] => 'my example site'])
            ->setTo([$email => $name])
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();*/

        $this->trigger(self::EVENT_NOTIFY);
    }

    public function notifyAdmin($event)
    {
        echo 'notify admin of some event';
    }
}