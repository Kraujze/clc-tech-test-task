<?php

namespace app\models;

use yii\base\Model;

class CreateMessageForm extends Model
{
    public $message;

    public function rules()
    {
        return [
            ['message', 'required'],
            ['message', 'string']
        ];
    }


}