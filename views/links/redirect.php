<h1>Сейчас Вы будете перенаправлены по внешней ссылке...</h1>


<?php
use \yii\web\View;

$link = $linkUser->link;

$script = <<< JS
$(document).ready(function(){
       setTimeout(function() {
           document.location.href = '$link';
       }, 5000);
}); 
JS;
$this->registerJs($script, View::POS_END);
?>