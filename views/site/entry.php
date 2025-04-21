<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin();?>
    
    <?= $form->field($model, 'nome')->label('Seu nome') ?>
    <?= $form->field($model, 'email')->label('Email') ?>
    <?= $form->field($model, 'sexo')->label('Masculino ou Feminino?') ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
