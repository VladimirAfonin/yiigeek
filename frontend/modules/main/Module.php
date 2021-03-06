<?php

namespace app\modules\main;

/**
 * main module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\main\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // set view from file
        $this->setLayoutPath('@frontend/views/layouts');
    }
}
