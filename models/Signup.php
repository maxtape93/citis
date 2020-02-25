<?php
namespace app\models;

use yii\base\Model;

class Signup extends Model
{
	public $email;
	public $password;

	public function rules() {
		return [
			[['email', 'password'], 'required'],
			['email', 'email'],
//			['email', 'unique', ],
			['password', 'string', 'min' => 4]
		];
	}

	public function signup() {
		$user = new User();
		$user->email = $this->email;
		$user->setPassword($this->password);
		return $user->save();
	}
}
?>