<?php

class StattourController extends GeneralBaseController
{
	public $layout = 'default';
        
	public function actionAdmin()
	{
		$model=new TournamentStattour('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TournamentStattour']))
			$model->attributes=$_GET['TournamentStattour'];

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
		$model=TournamentStattour::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='stattour-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
