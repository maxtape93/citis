<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Links;
use yii\helpers\Url;

class LinksController extends Controller
{
	public function actionIndex() {
		if(!Yii::$app->user->isGuest) {
			$linkModel = new Links();
			if($links = Yii::$app->request->post("Links")) {
				$linkModel->link = $links['link'];
				$linkModel->generateLink();
				$linkModel->user = Yii::$app->user->getId();
				$linkModel->save();

				$this->refresh();
			}

			$myLinks = $linkModel->getLinks(Yii::$app->user->getId());
			return $this->render('index', compact('linkModel', 'myLinks'));
		} else {
			return $this->goHome();
		}

	}

	public function actionRedirect() {
		$url = Url::to(Yii::$app->request->url, true);
		$linkUser = Links::getLinkUser($url);
		if($linkUser->id)
			return $this->render('redirect', compact('linkUser'));
		return $this->render('error');
	}

	public function actionDelete($id)
	{
		$this->findLink($id)->delete();

		return $this->redirect(['index']);
	}

	private function findLink($id)
	{
		if (($model = Links::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}