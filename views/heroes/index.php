<?php
    use yii\widgets\LinkPager;
	use yii\helpers\Html;

//form to upload below
?>
<h1>Alll Heroes</h1>

<ul>
	<?php foreach ($heroes as $hero): ?>
	<li>

		<?= Html::encode("{$hero->name}") ?>

	</li>
	<?php endforeach ?>
<ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

