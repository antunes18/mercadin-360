<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Produto $model */
/** @var yii\widgets\ActiveForm $form */

$categorias = $model->optsCategoria();

?>

<div class="produto-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'autocomplete' => 'off'
        ]
    ]); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_fornecedor')->textInput() ?>

    <?= $form->field($model, 'categoria')->dropDownList($categorias, ['prompt' => 'Selecione a categoria desse produto']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>