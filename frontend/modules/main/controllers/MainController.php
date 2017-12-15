<?php
namespace app\modules\main\controllers;

use frontend\models\ContactForm;
use frontend\models\SignupForm;
use yii\web\Controller;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


class MainController extends Controller
{
    public $layout = 'bootstrap';

    /**
     * alone stand actions
     *
     * @return array
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            /*
            'contact' => [
                'class' => 'frontend\actions\TestAction'
            ]
            */

        ];
    }

    /**
     * main page
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * register form
     *
     * @return string
     */
    public function actionRegister()
    {
        // наш сценарий
        $regModel = new SignupForm();
//        $regModel->scenario = 'short_register';

        // ajax validation
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {

            if ($regModel->load(Yii::$app->request->post()) && $regModel->validate()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($regModel);
            }
//
        }

        if ($regModel->load(Yii::$app->request->post()) && $regModel->validate()) {
            $regModel->signup();
            Yii::$app->session->setFlash('success', 'Пользователь успешно добавлен');
//            $this->refresh();
        } else {
//            Yii::$app->session->setFlash('error', 'Пользователь не добавлен');
        }

        return $this->render('register', compact('regModel'));
    }

    /**
     * contact form -> usual variant.
     *
     * @return string
     */
    public function actionContact()
    {
        $contactModel = new ContactForm();

        return $this->render('contact', compact('contactModel'));
    }

}
