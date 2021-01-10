<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\User;

$dataProvider = new ActiveDataProvider([
    'query' => User::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
]);