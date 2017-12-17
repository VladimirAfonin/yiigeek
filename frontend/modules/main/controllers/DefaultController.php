<?php

namespace app\modules\main\controllers;

use frontend\components\Common;
use yii\db\Query;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'bootstrap';

        $query = new Query();
        $command = $query->from('advert')->orderBy('id desc')->limit(5);
        $result = $command->all();
        $count_general = $command->count();

        return $this->render('index', compact('result', 'count_general'));
    }

    public function actionLoginData()
    {
        print(Yii::$app->user->id);
//        print(Yii::$app->user->user->identity->id);
    }

    /**
     * ex. of our service locator
     */
    public function actionService()
    {
        $cache = Yii::$app->cache;

        $cache->set("test", 1);
        print_r($cache->get('test'));
    }

    public function actionEvent()
    {
        $component = new Common();
//        $component = Yii::$app->common;
        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdminSecond']);
        $component->sendMail("test@test", 'name', 'subject', 'some body text');
        $component->off(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
    }
}
