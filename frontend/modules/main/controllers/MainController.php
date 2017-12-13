<?php
namespace app\modules\main\controllers;

use yii\web\Controller;


class MainController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'bootstrap';

        return $this->render('index');
    }

}
