<?php
    use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use app\models\UsersForm;

//form to upload below
?>

<?php
	$form = ActiveForm::begin([
		'id' => 'party-form',
		'options' => ['class' => 'form'],
		'action' => Url::to(['/site/party']),
	]);;

?>

<div class="container">
	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			Pokaż stan po:
			<?=
				$form->field($party, 'Liczba_imprez')->label('Wspólne imprezy integracyjne');
			 ?>
			<?= Html::submitButton('Lets go to the party!', ['class' => 'btn btn-primary']) ?>
			<?php ActiveForm::end() ?>
		</div>
	</div>
</div>

<div class="container">
	<h2>Tabela wynikowa wczytanego pliku</h2>
</div>

<div class="container">
	<?php
	//check if there are some files to read
		$dir    = 'uploads/';
		$isFiles = scandir($dir);
		$numOfParties = $party->Liczba_imprez;
		foreach ($isFiles as $isFile) {
			if(is_file($dir.$isFile)){
		  
	//create new PHPExcel object        
				$objPHPExcel = new \PHPExcel();
				$objPHPExcel = \PHPExcel_IOFactory::load($dir.$isFile);
				
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
				
	//create table to view PHPExcel object
	
						$objects = array();	
						$fields = array();
						$x = 0;
						
				if (count($sheetData) > 0) {
														
					foreach ($sheetData as $row) {
						//check if rows are not empty
						if (implode('',$row) != '') {
								
								$object = new UsersForm();
							
								//$y variable is set to view input type fields except lp. field
								$y = 0;
							
								foreach ($row as $value) {
									
									switch($y) {
										case 0:
											$object->setLp($value);
											break;
										case 1:
											$object->setName($value);
											break;
										case 2:
											$object->setEnthusiasm($value);
											break;
										case 3:
											$object->setCreativity($value);
											break;
										case 4:
											$object->setBrilliance($value);
											break;
										case 5:
											$object->setInnerPeace($value);
											break;
									}
									$y++;	
								}//end of foreach row
					
								
								$objects[] = $object;
								$x++;
						}//end of check if rows are filled
					} //end of foreach sheetData

					
				}// end of are there any records
			
			}//end of isFile
			
		}// end of isFiles foreach
	
	?>
</div>

<div class="container">
	<table class="table">

		<?php	
			//if somone delete file while we want to reload
			if(is_file($dir.$isFile)){	
				$i = 0;
				
				foreach($objects as $object){
					if($i == 0) {
						echo '<tr>';
						
						echo '<th>'.$object->getLp().'</td>';
						echo '<th>'.$object->getName().'</th>';
						echo '<th>'.$object->getEnthusiasm().'</th>';
						echo '<th>'.$object->getCreativity().'</th>';
						echo '<th>'.$object->getBrilliance().'</th>';
						echo '<th>'.$object->getInnerPeace().'</th>';
						
						echo '</tr>';
					} else {
						if($numOfParties != '' && $numOfParties > 1) {
							
							echo '<tr>';
							
							echo '<td>'.$object->getLp().'</td>';
							echo '<td><input type="text" value="'.$object->getName().'"></input></td>';
							echo '<td><input type="number" value="'.$object->getEnthusiasm()*$numOfParties.'"></input></td>';
							echo '<td><input type="number" value="'.$object->getCreativity()*$numOfParties.'"></input></td>';
							echo '<td><input type="number" value="'.$object->getBrilliance()*$numOfParties.'"></input></td>';
							echo '<td>'.$object->getInnerPeace().'</td>';
							
							echo '</tr>';
							
						} else {
							
							echo '<tr>';
							
							echo '<td>'.$object->getLp().'</td>';
							echo '<td><input type="text" value="'.$object->getName().'"></input></td>';
							echo '<td><input type="number" value="'.$object->getEnthusiasm().'"></input></td>';
							echo '<td><input type="number" value="'.$object->getCreativity().'"></input></td>';
							echo '<td><input type="number" value="'.$object->getBrilliance().'"></input></td>';
							echo '<td>'.$object->getInnerPeace().'</td>';
							
							echo '</tr>';
							
						}

					}
					$i++;
				}
			}
					
		?>
	</table>	
</div>

<div class="container">
	<?= Html::a('Generuj PDF',
			['/site/report'],
			[
			 'class'=>'btn btn-danger',
			 'target'=> '_blank',
			 'data-toggle'=>'tooltip',			 
			 'title'=>'Generate the pdf',
			 'party' => 'Liczba_imprez',
			 ]); ?>
</div>