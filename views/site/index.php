<?php
    use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	
	//check if there are some files to read
    $dir    = 'uploads/';
    $isFiles = scandir($dir);
//if file allready exist - redirect to party
    foreach ($isFiles as $isFile) {
		
        if(is_file($dir.$isFile)){
			
			return Yii::$app->response->redirect(Url::to(['/site/party']));
			
		}
	}
	
//form to upload below
?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
			<?php $form = ActiveForm::begin([
									 'id' => 'upload-form',
									'options' =>	['enctype' => 'multipart/form-data', 'class' => 'form', 'required'],
									'action' => ['/site/upload'],
								]) 
			?>

			<?= $form->field($model, 'file')->fileInput() ?>

			<?= Html::submitButton('Wczytaj plik!', ['class' => 'btn btn-primary']) ?>
			<?php ActiveForm::end() ?>
        </div>
    </div>

