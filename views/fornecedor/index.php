<?php

use app\models\Fornecedor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\FornecedorPesquisa $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fornecedores cadastrados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Fornecedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'nome',
            'cnpj',
            'telefone',
            'endereco',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fornecedor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
