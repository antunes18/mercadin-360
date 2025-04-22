<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class PaisesController extends Controller
{
    public function actionIndex()
    {
        $consultaPaises = Country::find();

        $paginacao = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $consultaPaises->count(),
        ]);

        $paises = $consultaPaises->orderBy('name')
            ->offset($paginacao->offset)
            ->limit($paginacao->limit)
            ->all();

        return $this->render('index', [
            'paises'=> $paises,
            'paginacao' => $paginacao
        ]);
    }
}