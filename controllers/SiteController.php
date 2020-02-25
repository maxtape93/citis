<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Signup;
use app\models\Login;



class SiteController extends Controller
{
	public function actionIndex() {
		return $this->render('index');
	}

	public function actionSignup() {

		if(!Yii::$app->user->isGuest) {
			$this->redirect('/links');
		}

		$model = new Signup();

		if(isset($_POST['Signup'])) {
			$model->attributes = Yii::$app->request->post("Signup");
			if($model->validate() && $model->signup()) {
				$loginModel = new Login();
				$loginModel->email = $model->email;
				Yii::$app->user->login($loginModel->getUser());
				return $this->redirect('/links');
			}
		}

		return $this->render('signup', ['model' => $model]);
	}

	public function actionLogin() {
		if(!Yii::$app->user->isGuest) {
			return $this->redirect(['login']);
		}

		$loginModel = new Login();

		if($login = Yii::$app->request->post("Login")) {
			$loginModel->attributes = $login;
			if($loginModel->validate()) {
				Yii::$app->user->login($loginModel->getUser());
				return $this->redirect('/links');
			}
		}
		return $this->render("login", ['loginModel' => $loginModel]);
	}

	public function actionLogout() {
		if(!Yii::$app->user->isGuest) {
			Yii::$app->user->logout();
			return $this->redirect(['login']);
		}
	}
}
