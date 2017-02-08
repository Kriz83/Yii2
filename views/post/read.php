<?php use yii\helpers\Html ?>

<div class="pull-right btn-group">

	<?php echo Html::a('Update' , array('post/update' , 'id' => $post->id), array('class' => 'btn btn-primary')); ?>
	<?php echo Html::a('Delete' , array('post/delete' , 'id' => $post->id), array('class' => 'btn btn-danger')); ?>

</div>


<h1> <?php echo $post->title ?></h1>

<p> <?php echo $post->content ?></p>
<hr/>
<time>Created on: <?php echo $post->created ?></time>
<time>Updated on: <?php echo $post->updated ?></time>
