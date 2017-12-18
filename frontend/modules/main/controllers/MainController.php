<?php
namespace app\modules\main\controllers;

use common\filters\FilterAdvert;
use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\SignupForm;
use yii\base\DynamicModel;
use yii\web\Controller;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Advert;
use frontend\components\Common;
use dosamigos\google\maps\{LatLng, Map};
use dosamigos\google\maps\overlays\Marker;



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
     * подключили наш фильтр
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'only' => ['view-advert'],
                'class' => FilterAdvert::className()
            ]
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

    /**
     * login action form
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->goBack();
        }

        return $this->render('login', compact('model'));
    }

    /**
     * logout
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionViewAdvert($id)
    {
        // правила для валидации динамической модели
        $data = ['name', 'email', 'text'];

        // динамическая модель
        $model_feedback = new DynamicModel($data);
        $model_feedback->addRule('name', 'required');
        $model_feedback->addRule('email', 'required');
        $model_feedback->addRule('text', 'required');
        $model_feedback->addRule('email', 'email');

        if(Yii::$app->request->isPost) {
            if($model_feedback->load(Yii::$app->request->post()) && $model_feedback->validate()) {
                Yii::$app->common->sendMail('subject advert', $model_feedback->text);
            }
        }

        $model = Advert::findOne($id);
        // получаем user по связи
        $user = $model->user;

        $images = Common::getImageAdvert($model, false);
        $current_user = ['email' => '', 'username' => ''];

        if(!Yii::$app->isGuest) {
            $current_user['email'] = Yii::$app->user->identity->email;
            $current_user['username'] = Yii::$app->user->identity->username;
        }

        // get our coordinates
        $coords = str_replace(['(', ')'], '', $model->location);
        $coords = explode(',', $coords);

        $coord = new LatLng(['lat' => $coords[0], 'lng' => $coords[1]]);

        $map = new Map([
            'center' => $coord,
            'zoom' => 20,
        ]);

        $marker = new Marker([
            'position' => $coord,
            'title' => Common::getTitleAdvert($model)
        ]);

        $map->addOverlay($marker);


        return $this->render('view_advert', compact('model', 'model_feedback', 'user'));

    }

}
