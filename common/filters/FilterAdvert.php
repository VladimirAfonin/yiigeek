<?php

namespace common\filters;

use yii\base\ActionFilter;
use Yii;
use common\models\Advert;
use yii\web\HttpException;

class FilterAdvert extends ActionFilter
{
    public function beforeAction($action)
    {
        $id = Yii::$app->request->get("id");
        $model = Advert::findOne($id);

        if($model == null) {
            throw new HttpException(404, 'unknow advert');
            return false;
        }

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }


    public function afterAction($action, $result)
    {
        return parent::afterAction($action, $result); // TODO: Change the autogenerated stub
    }
}