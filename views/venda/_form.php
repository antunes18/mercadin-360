<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Venda $model */
/** @var yii\widgets\ActiveForm $form */

$formasDePagamento = $model->optsFormaPagamento();

?>

<div class="venda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <?= $form->field($model, 'forma_pagamento')->dropDownList($formasDePagamento, ['prompt' => 'Selecione a forma de pagamento']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
