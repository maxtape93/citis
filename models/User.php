<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
	const HASH = "reyqiMK278NKHsmbu@)U";

	public function setPassword($password) {
		$this->password = md5($password . self::HASH);
	}

	public function checkPassword($password) {
		return $this->password === md5($password . self::HASH);
	}

	public static function findIdentity($id) {
		return self::findOne($id);
	}

	public static function findIdentityByAccessToken($token, $type = null) {

	}

	public function getId() {
		return $this->id;
	}

	public function getAuthKey() {

	}

	public function validateAuthKey($authKey) {

	}
}