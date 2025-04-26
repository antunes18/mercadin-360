<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Produto $model */

$this->title = $model->nome . ' — ' . $model->marca;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar dados', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Remover dados', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ATENÇÃO: TEM CERTEZA QUE DESEJA REMOVER ESTE PRODUTO?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'marca',
            [
                'attribute' => 'preco',
                'format' => ['currency', 'BRL'],
            ],
            [
                'attribute' => 'id_fornecedor',
                'value' => function($model) {
                    return $model->fornecedor->nome;
                },
                'label' => 'Fornecedor(a)'
            ],
            'categoria',
        ],
    ]) ?>

</div>
