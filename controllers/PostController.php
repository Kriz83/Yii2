<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Post;
use \yii\base\HttpException;


/**
 * Post controller
 */
class PostController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
      
		$data = Post::find()->all();

		echo $this->render('index', ['data' => $data]);
    }
	
    /**
     * Displays Read.
     *
     * @return mixed
     */
    public function actionRead($id = NULL)
    {
		if ($id === NULL) {
			
			Yii::$app->session->setFlash('error' , 'A post with id doesn\' exist');
			Yii::$app->getResponse()->redirect(array('post/index'));
			
		}
		
		$post = Post::find($id)->one();
		
		if ($post === NULL) {
			
			Yii::$app->session->setFlash('error' , 'A post with id doesn\' exist');
			Yii::$app->getResponse()->redirect(array('post/index'));			
			
		}

		echo $this->render('read', ['post' => $post]);
		
    }
	
	 /**
     * Delete post
     *
     * @return mixed
     */
    public function actionDelete($id = NULL)
    {
		if ($id === NULL) {
			
			Yii::$app->session->setFlash('error' , 'A post with id doesn\' exist');
			Yii::$app->getResponse()->redirect(array('post/index'));
			
		}
		
		$post = Post::find($id)->one();
		
		if ($post === NULL) {
			
			Yii::$app->session->setFlash('error' , 'A post with id doesn\' exist');
			Yii::$app->getResponse()->redirect(array('post/index'));			
			
		}
		
		$post->delete();

		Yii::$app->session->setFlash('Success' , 'Your post was deleted');
		Yii::$app->getResponse()->redirect(array('post/index'));
		
		
    }
	
		 /**
     * Create post
     *
     * @return mixed
     */
    public function actionDelete($id = NULL)
    {
		
		$model = new Post;
		
		if ($this->populate($_POST, $model) && $model->save()) {
			
			Yii::$app->
			
		}
		
    }
	
	
}