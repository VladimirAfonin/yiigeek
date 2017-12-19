<?php


namespace backend\controllers;


use common\controllers\AuthController;
use common\models\Advert;
use common\models\search\AdvertSearch;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
use common\models\User;
use Yii;
use yii\web\NotFoundHttpException;

class AdvertController extends AuthController
{
    /*public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                'class' => HttpBasicAuth::className(),
                'auth' => function ($username, $password) {
                    $model = User::findOne(['username' => $username]);
                    if($model->validatePassword($password)) return $model;

                },
            ]
        ]);
    }*/

    /**
     * main page
     *
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->view->title = "advert manager";
        $search = new AdvertSearch();
        $dataProvider = $search->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('dataProvider'));
    }

    /**
     * delete record
     *
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }


    /**
     * @param $id
     * @return null|static
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if(($model = Advert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('the page doesnot exist');
        }
    }
}