<?php
namespace frontend\components;

use yii\base\Component;
use Yii;
use yii\helpers\Url;

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
        echo 'notify admin of some first event';
    }

    public function notifyAdminSecond($event)
    {
        echo "<br>notify admin second event";
    }

    /**
     * генерим титл для картинки
     *
     * @param $data
     * @return string
     */
    public static function getTitleAdvert($data)
    {
        return $data['bedroom'].' Bed Rooms and '.$data['kitchen'].' Kitchen Room Apartment on Sale';
    }

    /**
     * get image path to slider
     *
     * @param $data
     * @param bool $general
     * @param bool $original
     *
     * @return array
     */
    public static function getImageAdvert($data, $general = true, $original = false)
    {
        $image = [];
        $base = Url::base();

        if($original) {
            $image[] = $base.'uploads/adverts/'.$data['id'].'/general/'.$data['general_image'];
        } else {
            $image[] = $base.'uploads/adverts/'.$data['id'].'/general/small_'.$data['general_image'];
        }
        return $image;
    }

    /**
     * url advert
     *
     * @param $row
     * @return string
     */
    public static function getUrlAdvert($row)
    {
        return Url::to(['/main/main/view-advert', 'id' => $row['id']]);
    }


}