<h1>Register</h1>
<?php
use \yii\widgets\ActiveForm;

$form = ActiveForm::begin(['class' => 'form-horizontal']);
echo $form->field($model, 'email')->textInput();
echo $form->field($model, 'password')->passwordInput();

?>
<button type="submit" class="btn btn-default">Зарегистрироваться</button>
<?php
ActiveForm::end();
?>