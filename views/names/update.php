<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Names */

$this->title = 'Update Names: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="names-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
