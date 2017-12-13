<?php
namespace frontend\components;

use yii\base\Component;
use Yii;

class Common extends Component
{
    public static function sendMail($email, $name='', $subject, $body)
    {
        Yii::$app->mail->compose()
            ->setFrom([Yii::$app->params['supportEmail'] => 'my example site'])
            ->setTo([$email => $name])
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();
    }
}