<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Heroes;
use yii\data\Pagination;

/**
 * Site controller
 */
class HeroesController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Heroes::find();
		
		$pagination = new Pagination([
		
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			
		]);
		
		$heroes = $query->orderBy('lp')
									->offset($pagination->offset)
									->limit($pagination->limit)
									->all();
									
	
		return $this->render('index', ['heroes' => $heroes, 'q' => $q , 'pagination' => $pagination]);
    }

	
}
