<?php

namespace app\modules\cabinet;

/**
 * cabinet module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\cabinet\controllers';

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
