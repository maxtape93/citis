<?php

namespace app\models;

use yii\db\ActiveRecord;

class Links extends ActiveRecord
{
	public function attributeLabels() {
		return [
			'link' => 'Введите новую ссылку'
		];
	}

	public function generateLink() {
		$this->linkUser = $this->getUrlForShortLink() . substr(md5(time()), 0, 8);
	}

	private function getUrlForShortLink () {
		return $this->getHost() . "/site/redirect/";
	}

	private function getProtocol() {
		return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	}

	private static function getHost($short = false) {
		if($short)
			return $_SERVER["HTTP_HOST"];
		return self::getProtocol() . $_SERVER["HTTP_HOST"];
	}

	public function getLinks($user = 1) {
		return $this->find()->where(['user' => $user])->all();
	}

	public static function getLinkUser($link) {
		return self::findOne(['linkUser' => $link]);
	}
}