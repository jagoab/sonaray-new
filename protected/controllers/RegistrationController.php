<?php

class RegistrationController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
        public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
                        'page'=>array(
				'class'=>'CViewAction',
			),
                        
		);
	}
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
        
        
      //  public $layout='//layouts/main';
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
//	public function accessRules()
//	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view','Selectcity'),
//				'users'=>array('*'),
//                                
//			),
//                        
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('*'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Registration']))
		{
			$model->attributes=$_POST['Registration'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_registration));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
        public function GetBaanners()
	{
		
            $banners=new Banner();
            return $banners->findAll(array("condition"=>"active=1"));
	}
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */

        public function actionIndex()
	{
            
         $dataProvider=new CActiveDataProvider('Registration');

		$model=new Registration;
                $criterio = new CDbCriteria();
		for($i = 1;$i <=4;$i++){
		$criterio -> condition = 'language = \''.Yii::app()->language.'\' and category in (50,51,52) and parent = '.$i;
               // echo 'language = \''.Yii::app()->language.'\' and category in (18,19,20) and parent = '.$i;
		$textos = Texts::model()->findAll($criterio);
                $parrafo[$i] = $textos;
                                
			
		}
                
		if(isset($_POST['Registration']))
		{

                   $model->attributes=$_POST['Registration'];
                   
                   if($model->save()){
                  Yii::app()->user->setFlash('contact','Gracias por suscribirse con nosotros. Nosotros le responderemos tan pronto como sea posible.');
                   }
		}
                
                $this->render('index',array('model'=>$model, 'parrafos'=>$parrafo));
               
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Registration('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registration']))
			$model->attributes=$_GET['Registration'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Registration the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Registration::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Registration $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionSelectcity()
        {
            //echo"llegando";
            $id_country = $_POST['Registration']['id_level_country'];
            $lista = LevelCity::model()->findAll('id_level_country = :id_country',array(':id_country'=>$id_country));
            $lista = CHtml::listData($lista,'id_level_city','name_city');
            
            echo CHtml::tag('option', array('value' => ''), 'Seleccione', true);
            
            foreach ($lista as $valor => $name){
                echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($name), true );
                
            }
            
        }
}
