<?php

class LugaresController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('view'),
                    'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('admin','delete','create','update','getByServiceType'),
                    'users'=>Usuario::getTypeUsers(1, false), //usuario admin, no uppercase
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

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
    public function actionCreate()
    {
            $model=new Lugares;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Lugares']))
            {
                    $model->attributes=$_POST['Lugares'];
                    if($model->save())
                            $this->redirect(array('view','id'=>$model->id));
            }

            $this->render('create',array(
                    'model'=>$model,
            ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Lugares']))
        {
                $model->attributes=$_POST['Lugares'];
                if($model->save())
                        $this->redirect(array('view','id'=>$model->id));
        }

        $modelTipoServicio= TipoServicio::model()->findAll();
        $tipoServicioList = CHtml::listData($modelTipoServicio, 'id', 'nombre');
        $modelLugars = Lugar::model()->findAll();
        $lugars = CHtml::listData($modelLugars, 'id', 'nombre');
        $lugares = Yii::app()->db->createCommand('CALL getFullLugares2('.$id.')')->queryAll();
        $this->render('update',array('model'=>$model,'lugars'=>$lugars,'lugares'=>$lugares,'tipoServicioList'=>$tipoServicioList));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
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
            $dataProvider=new CActiveDataProvider('Lugares');
            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
            ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model=new Lugares('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Lugares']))
            $model->attributes=$_GET['Lugares'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Lugares the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model=Lugares::model()->with("lugars")->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Lugares $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if(isset($_POST['ajax']) && $_POST['ajax']==='lugares-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionGetByServiceType($idTipoServicio) {
        return $modelLugars = Lugar::model()->findAll(
            array('condition'=>'tipo_servicio_id = :tipo_servicio_id', 'params'=>array(':tipo_servicio_id'=>$idTipoServicio)));
    }
    
}