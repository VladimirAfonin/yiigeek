<?php
namespace frontend\actions;

use yii\base\Action;
use frontend\models\ContactForm;

class TestAction extends Action
{
    /** name of view */
    public $viewName = 'contact';

    /**
     * run the main mechanism
     *
     * @return string
     */
    public function run()
    {
        $contactModel = new ContactForm();

        return $this->controller->render($this->viewName, compact('contactModel'));
    }
}