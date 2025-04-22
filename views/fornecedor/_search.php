<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FornecedorPesquisa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fornecedor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cnpj') ?>

    <?= $form->field($model, 'telefone') ?>

    <?= $form->field($model, 'endereco') ?>

    <?php ActiveForm::end(); ?>

</div>
