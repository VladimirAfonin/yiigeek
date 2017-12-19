<?php

namespace app\modules\cabinet\controllers;

use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use frontend\models;

/**
 * Default controller for the `cabinet` module
 */
class DefaultController extends Controller
{
    public $layout = 'bootstrap';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * upload avatar for user
     *
     * @return bool
     */
    public function uploadAvatar()
    {
        if(Yii::$app->request->isPost) {
            $id = Yii::$app->user->id;
            $path = Yii::getAlias("@frontend/web/uploads/users");
            $file = UploadedFile::getInstanceByName('avatar');
            if($file) {
                $name = $id . '.jpg';
                $file->saveAs($path . DIRECTORY_SEPARATOR. $name);
                $image = $path.DIRECTORY_SEPARATOR.$name;
                $new_image = $path.DIRECTORY_SEPARATOR.'small_'.$name;

                Image::frame($image, 0, '666', 0)
                    ->thumbnail(new Box(200, 200))
                    ->save($new_image, ['quality' => 100]);


                return true;
            }
        }
    }


    /**
     * settings for user
     *
     * @return string
     */
    public function actionSettings()
    {
        $model = Yii::$app->user->identity;
        return $this->render('settings', compact('model'));
    }

    /**
     * change password for user
     *
     * @return string
     */
    public function actionChangePassword()
    {
        $model = new ChangePasswordForm();
        if($model->load(Yii::$app->request->post()) && $model->changepassword()) {
            $this->refresh();
        }

        return $this->render('change-password', compact('model'));
    }


}
