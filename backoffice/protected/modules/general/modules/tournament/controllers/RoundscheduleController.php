<?php

class RoundscheduleController extends GeneralBaseController
{
	public $layout = 'default';
        
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TournamentRoundschedule']))
		{
			$model->attributes=$_POST['TournamentRoundschedule'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->roundScheduleId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
	public function actionAdmin()
	{
		$model=new TournamentRoundschedule('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TournamentRoundschedule']))
			$model->attributes=$_GET['TournamentRoundschedule'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TournamentRoundschedule::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='roundschedule-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
