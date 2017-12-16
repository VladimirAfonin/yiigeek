<?php


namespace common\controllers;


use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AuthController extends Controller
{
    public function behaviors()
    {
        $behaviors = [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
//                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post']
                ]
            ]
        ];

        return $behaviors;
    }
}