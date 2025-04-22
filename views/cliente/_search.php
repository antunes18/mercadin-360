<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ClientePesquisa $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome_completo') ?>

    <?= $form->field($model, 'telefone') ?>

    <?= $form->field($model, 'endereco') ?>

    <?php ActiveForm::end(); ?>

</div>
