<?php use yii\helpers\Html ?>

<?php if(Yii::$app->session->hasFlash('error')): ?>
	<div class="alert alert-error">
		<?php echo Yii::$app->session->getFlash('error'); ?>
	</div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('success')): ?>
	<div class="alert alert-success">
		<?php echo Yii::$app->session->getFlash('success'); ?>
	</div>
<?php endif; ?>
	
	
<?php echo Html::a('Create New Post' , array('post/create'), array('class' => 'btn btn-primary pull-right')); ?>

<div class="clearfix"> </div>
<hr/>
<table class="table" table-striped table-hover>

	<tr>
		<th>#</th>
		<th>Title</th>
		<th>Created</th>
		<th>Updated</th>
		<th>Options</th>
	</tr>
	<?php foreach ($data as $post): ?>
		<tr>
			<td>
				<?php echo Html::a($post->id, array('post/read', 'id'=>$post->id)); ?>
			</td>
			<td>
				<?php echo Html::a($post->title, array('post/read', 'id'=>$post->id)); ?>
			</td>
			<td>
				<?php echo $post->created; ?>
			</td>
			<td>
				<?php echo $post->updated; ?>
			</td>
			<td>
				<?php 
					echo Html::a('edytuj ', array('post/read' , 'id'=>$post->id), array('class'=>'icon icon-edit'));
					echo Html::a(' Usuń', array('post/delete' , 'id'=>$post->id), array('class'=>'icon icon-trash')); 
				?>
			</td>
		</tr>
	
	<?php endforeach; ?>

</table>