<?php
namespace fronted\validators;

use yii\validators\Validator;


class CustomSelectTypeValidator extends Validator
{
    /**
     * our custom validator for 'buy type'
     *
     * @param \yii\base\Model $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if(!in_array($value, ['Buy', 'rent', 'sale'])) {
            $this->addError($model, $attribute, 'not required value');
        }
    }
}