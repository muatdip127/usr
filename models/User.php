<?php
namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
  
    
    /**
     * @return string название таблицы, сопоставленной с этим ActiveRecord-классом.
     */
    public static function tableName()
    {
        return '{{user}}';
    }
    public function getpassword()
    {
        return $this->password;
    }
    
    public function setpassword($value)
    {
        $this->password = md5($value);
    }
    public function rules()
{
    return [
        // атрибут required указывает, что name, email, subject, body обязательны для заполнения
        [['name', 'email', 'password','phone'], 'required','message' => 'Форма заполнена некорректно.'],

        // атрибут email указывает, что в переменной email должен быть корректный адрес электронной почты
        ['email', 'email','message' => 'Email указан некорректно!'],
    ];
}

}
