<?php

class TourController extends Controller {
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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('admin','delete','create','update','view'),
                    'roles'=>array('ADMINISTRADOR'), //usuario admin, no uppercase
                    //'roles'=>array('administrador'), //usuario admin, no uppercase
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
    public function actionView($id) {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model=new Tour;
        // $this->performAjaxValidation($model);
        
        if(isset($_POST['Tour'])) {
            //$model->attributes=$_POST['Tour'];
            $idsArray = array();
            foreach ($_POST['Tour'] as $j=>$postModel) {
                if (isset($_POST['Tour'][$j])) {
                    $tourModel = new Tour;
                    $tourModel->attributes=$postModel;
                    if($tourModel->save())
                        $idsArray[] = $tourModel->id;
                }
            }
            $first = true;
            foreach (array_reverse($idsArray) as $dato) {
                if(!$first) {
                    Tour::model()->updateByPk($dato, array('tour_id'=>$aux));
                }
                $aux = $dato;
                $first = false;
            }
            $this->redirect(array('admin'));
        }

        $modelExcursiones = Excursion::model()->findAll();
        $excursiones = CHtml::listData($modelExcursiones, 'id', 'nombre');
        $modelTipoExcursion = TipoExcursion::model()->findAll();
        $tipoExcursionList = CHtml::listData($modelTipoExcursion, 'id', 'nombre');
        //$tours = Yii::app()->db->createCommand('CALL getFullTour2('.$id.')')->queryAll();
        $this->render('create',array('model'=>$model,'excursiones'=>$excursiones,'tipoExcursionList'=>$tipoExcursionList,));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model=$this->loadModel($id);
        if(isset($_POST['Tour'])) {
            $idsArray = array();
            Yii::app()->db->createCommand('CALL deleteTour('.$id.')')->execute();
            foreach ($_POST['Tour'] as $j=>$postModel) {
                if (isset($_POST['Tour'][$j])) {
                    $tourModel = new Tour;
                    $tourModel->attributes=$postModel;
                    if($tourModel->save())
                        $idsArray[] = $tourModel->id;
                }
            }
            $first = true;
            foreach (array_reverse($idsArray) as $dato) {
                if(!$first) {
                    Tour::model()->updateByPk($dato, array('tour_id'=>$aux));
                }
                $aux = $dato;
                $first = false;
            }
            $this->redirect(array('admin'));
        }
        
        $modelTipoExcursion = TipoExcursion::model()->findAll();
        $tipoExcursionList = CHtml::listData($modelTipoExcursion, 'id', 'nombre');
        $modelExcursiones = Excursion::model()->findAll();
        $excursiones = CHtml::listData($modelExcursiones, 'id', 'nombre');
        $tours = Yii::app()->db->createCommand('CALL getFullTour2('.$id.')')->queryAll();
        $this->render('update',array('model'=>$model,'excursiones'=>$excursiones,'tours'=>$tours,'tipoExcursionList'=>$tipoExcursionList));
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
            $dataProvider=new CActiveDataProvider('Tour');
            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
            ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model=new Tour('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Tour']))
            $model->attributes=$_GET['Tour'];
        
        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Tour the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model=Tour::model()->with("excursions")->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Tour $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if(isset($_POST['ajax']) && $_POST['ajax']==='tour-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
