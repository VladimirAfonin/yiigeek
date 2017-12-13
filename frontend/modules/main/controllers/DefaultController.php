<?php

namespace app\modules\main\controllers;

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
        return $this->render('index');
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
}
