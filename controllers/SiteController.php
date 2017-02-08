<?php
namespace app\controllers;

use Yii;
use yii\BaseYii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use mPDF;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Yii::createObject('app\models\UploadForm');


		return $this->render('index', ['model' => $model]);
    }
	
	  /**
     * Upload file.
     *
     * @return mixed
     */
    public function actionUpload()
    {
        $model = Yii::createObject('app\models\UploadForm');
		$party = Yii::createObject('app\models\PartyForm');
		
		$party->load(\Yii::$app->request->post());
				
		if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
			
			if (Yii::$app->request->Post()) {
				
				$model->file = UploadedFile::getInstance($model, 'file');
				if ($model->upload()) {
					
					// file is uploaded successfully
					return;
				}
			}
		} else {
			// validation failed: $errors is an array containing error messages
			$errors = $model->errors;
		}

        return $this->render('party', ['model' => $model, 'party' => $party]);
    }
	
    /**
     * Displays data after party time.
     *
     * @return party
     */
    public function actionParty()
    {	
	
        
		$party = Yii::createObject('app\models\PartyForm');

		
		if ($party->load(\Yii::$app->request->post()) && $party->validate()) {
	
			if (Yii::$app->request->Post()) {
				
				return $this->render('party', ['party' => $party]);
				
			}
			
		} else {
			
			// validation failed: $errors is an array containing error messages
			$errors = $party->errors;
			
		}

        return $this->render('party', ['party' => $party]);
    }

    /**
     * Displays pdf file.
     *
     * @
     */	
	public function actionReport() {
		
		$party = Yii::createObject('app\models\PartyForm');
					
		if ($party->load(\Yii::$app->request->post()) && $party->validate()) {
	
			if (Yii::$app->request->Post()) {
				
				$mpdf=new mPDF('A4-L');
				$mpdf->WriteHTML($this->render('pdf', ['party' => $party]));
				$mpdf->Output();
				exit;
				
				
			}
			
		} else {
			
			// validation failed: $errors is an array containing error messages
			$errors = $party->errors;
			
		}        
		
				$mpdf=new mPDF('A4-L');
				$mpdf->WriteHTML($this->render('pdf', ['party' => $party]));
				$mpdf->Output();
				exit;
	}
	
}
