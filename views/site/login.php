<h1>Login</h1>
<?php
use \yii\widgets\ActiveForm;

$form = ActiveForm::begin(['class' => 'form-horizontal']);
echo $form->field($loginModel, 'email')->textInput();
echo $form->field($loginModel, 'password')->passwordInput();

?>
<button type="submit" class="btn btn-success">Войти</button>
<?php
ActiveForm::end();
?>