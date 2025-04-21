<?php
use yii\helpers\Html;
?>
<p>Toma o que foi submetido:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->nome) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
    <li><label>Sexo</label>: <?= Html::encode($model->sexo) ?></li>
</ul>