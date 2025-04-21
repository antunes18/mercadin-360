<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model 
{
    public $nome;
    public $email;
    public $sexo;

    public function rules ()
    {
        return [
            [['nome', 'email', 'sexo'], 'required'],
            ['email', 'email'],
        ];
    }
}
