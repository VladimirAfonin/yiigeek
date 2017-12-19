<?php
namespace frontend\widgets;

use common\models\Subscribe;
use kartik\base\Widget;
use Yii;

class SubscribeWidget extends Widget
{
    public function run()
    {
        $model = new Subscribe();
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->trigger(Subscribe::EVENT_NOTIFICATION_ADMIN);
            Yii::$app->session->setFlash('message', 'success subscribe');
            Yii::$app->controller->redirect('/');
        }

        return $this->render('subscribe', ['model' => $model]);
    }
}