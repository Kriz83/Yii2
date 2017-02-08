<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NamesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Names';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="names-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Names', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'surname',
            'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
