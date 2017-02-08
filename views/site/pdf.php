<!DOCTYPE html>
<html lang="pl">
    <head>
 
		<style>
			table, td, th {    
				border: 1px solid #ddd;
				text-align: left;
			}

			table {
				border-collapse: collapse;
				width: 100%;
			}

			th, td {
				padding: 5px;
			}
		</style>

    </head>
    <body>
		<div class="container">
			<?php
			use app\models\UsersForm;
			
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
								}  else {
									if($numOfParties != '' && $numOfParties > 1) {
										
										echo '<tr>';
										
										echo '<td>'.$object->getLp().'</td>';
										echo '<td>'.$object->getName().'</td>';
										echo '<td>'.$object->getEnthusiasm()*$numOfParties.'</td>';
										echo '<td>'.$object->getCreativity()*$numOfParties.'</td>';
										echo '<td>'.$object->getBrilliance()*$numOfParties.'</td>';
										echo '<td>'.$object->getInnerPeace().'</td>';
										
										echo '</tr>';
										
									} else {
										
										echo '<tr>';
										
										echo '<td>'.$object->getLp().'</td>';
										echo '<td>'.$object->getName().'</td>';
										echo '<td>'.$object->getEnthusiasm().'</td>';
										echo '<td>'.$object->getCreativity().'</td>';
										echo '<td>'.$object->getBrilliance().'</td>';
										echo '<td>'.$object->getInnerPeace().'</td>';
										
										echo '</tr>';
										
									}
									
									$i++;
								}
							}
						}
						
				?>
			</table>	
		</div>
	</body>
</html>