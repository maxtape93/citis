<h1>Мои ссылки</h1>
<?php

use \yii\widgets\ActiveForm;

$form = ActiveForm::begin(['class' => 'form-horizontal']);
echo $form->field($linkModel, 'link')->textInput();
?>
<button type="submit" class="btn bt-success add-link">Сохранить</button>
<?php
ActiveForm::end();

?>
<table width="100%" border="1" class="table table-bordered" style="margin-top: 30px">
    <tr>
        <th center width="5%">ID</th>
        <th center width="35%">Моя ссылка</th>
        <th center width="55%">Короткая ссылка</th>
        <th center width="5%">Удалить</th>
    </tr>

<?php
foreach($myLinks as $link) {
    ?>
        <tr>
            <td center><?=$link->id; ?></td>
            <td><?=$link->link; ?></td>
            <td><?=$link->linkUser; ?></td>
            <td align="center"><a href="/links/delete?id=<?=$link->id;?>"><i class="glyphicon  glyphicon-remove"></i></a></td>
        </tr>
    <?php
}

?>
</table>