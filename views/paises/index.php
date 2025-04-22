<?php
use yii\helpers\Html;
use yii\bootstrap5\LinkPager;

Yii::$app->formatter->locale = 'pt-BR';

?>

<h1>Países</h1>
<ul>
    <?php foreach ($paises as $pais): ?>
        <li>
            <?= Html::encode("{$pais->code} ({$pais->name})") ?>:
            <?= Yii::$app->formatter->asInteger($pais->population) ?> habitantes
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $paginacao]) ?>
