<?php

class ExcursionController extends Controller {
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
                    'actions'=>array('admin','delete','create','update'),
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
        $model=new Excursion;
        $success = true;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if(isset($_POST['Excursion'])) {
            if(isset($_FILES)) {
                $model->attributes = $_POST['Excursion'];
                if($model->save()) {
                    /*if(isset($_POST['Excursion']['sigueA'])){
                        foreach($_POST['Excursion']['sigueA'] as $sigueA) {
                            $modelSigueA = new SigueA;
                            $modelSigueA->sigue_a_id = $sigueA;
                            $modelSigueA->seguida_por_id = $model->id;
                            $modelSigueA->insert();
                        }*/
                    foreach($_FILES['Excursion']['name']['image'] as $index => $valor) {
                        if($_FILES['Excursion']['error']['image'][$index] == 0) {
                            $modelImage = new Imagen;
                            $randomHash = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
                            $modelImage->ruta_imagen = Yii::app()->getBaseUrl().'/images/added/'.$randomHash;
                            if($modelImage->save()) {
                                $uploadedFile = CUploadedFile::getInstance($model, 'image['.$index.']');
                                $uploadedFile->saveAs(Yii::getPathOfAlias('webroot').'/images/added/'.$randomHash);

                                $modelImageExcursion = new ImagenExcursion;
                                $modelImageExcursion->excursion_id = $model->id;
                                $modelImageExcursion->imagen_id = $modelImage->id;
                                if(!$modelImageExcursion->save())
                                    $success = false;
                            } else
                                $success = false;
                        }
                    }
                    //}
                } else
                    $success = false;
            }
            if($success)
                $this->redirect(array('view','id'=>$model->id));
        }

        $modelTipoExcursion = TipoExcursion::model()->findAll();
        $tipoExcursionList = CHtml::listData($modelTipoExcursion, 'id', 'nombre');
        $modelExcursion = Excursion::model()->findAll();
        $excursionList = CHtml::listData($modelExcursion, 'id', 'nombre');
        
        $this->render('create',array(
            'model'=>$model,
            'tipoExcursionList'=>$tipoExcursionList,
            'excursionList'=>$excursionList,
        ));
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model=$this->loadModel($id);
        $success = true;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Excursion'])) {
            if(isset($_FILES)) {
                $model->attributes = $_POST['Excursion'];
                $aux = array();
                foreach($_POST['Excursion']['image'] as $id => $image) {
                    if ($image != '')
                        $aux[] = $image;
                }
                $this->cleanImagesData($model, implode(',', $aux));
                if($model->save()) {
                    /*if(isset($_POST['Excursion']['sigueA'])){
                        foreach($_POST['Excursion']['sigueA'] as $sigueA) {
                            $modelSigueA = new SigueA;
                            $modelSigueA->sigue_a_id = $sigueA;
                            $modelSigueA->seguida_por_id = $model->id;
                            $modelSigueA->insert();
                        }*/
                    foreach($_FILES['Excursion']['name']['image'] as $index => $valor) {
                        if($_FILES['Excursion']['error']['image'][$index] == 0) {
                            $modelImage = new Imagen;
                            $randomHash = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
                            $modelImage->ruta_imagen = Yii::app()->getBaseUrl().'/images/added/'.$randomHash;
                            if($modelImage->save()) {
                                $uploadedFile = CUploadedFile::getInstance($model, 'image['.$index.']');
                                $uploadedFile->saveAs(Yii::getPathOfAlias('webroot').'/images/added/'.$randomHash);

                                $modelImageExcursion = new ImagenExcursion;
                                $modelImageExcursion->excursion_id = $model->id;
                                $modelImageExcursion->imagen_id = $modelImage->id;
                                if(!$modelImageExcursion->save())
                                    $success = false;
                            } else
                                $success = false;
                        }
                    }
                    //}
                } else
                    $success = false;
            }
            if($success)
                $this->redirect(array('view','id'=>$model->id));
        }

        $modelTipoExcursion = TipoExcursion::model()->findAll();
        $tipoExcursionList = CHtml::listData($modelTipoExcursion, 'id', 'nombre');
        $criteria = new CDbCriteria;
        $criteria->condition = 'id != :id';
        $criteria->params = array(":id"=>$model->id);
        $modelExcursion = Excursion::model()->findAll($criteria);
        $excursionList = CHtml::listData($modelExcursion, 'id', 'nombre');
        
        $this->render('update',array(
            'model'=>$model,
            'tipoExcursionList'=>$tipoExcursionList,
            'excursionList'=>$excursionList,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
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
            $dataProvider=new CActiveDataProvider('Excursion');
            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
            ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model=new Excursion('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Excursion']))
            $model->attributes=$_GET['Excursion'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Excursion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        //$model=Excursion::model()->with('imagenes','sigueA')->findByPk($id);
        $model=Excursion::model()->with('imagenes')->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Excursion $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if(isset($_POST['ajax']) && $_POST['ajax']==='excursion-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    private function cleanImagesData($model, $images) {
        $imageIdList = array();
        $imExCriteria = new CDbCriteria;
        if($images != '')
            $imExCriteria->condition = 'excursion_id = :excursion_id AND imagen_id NOT IN ('.$images.')';
        else
            $imExCriteria->condition = 'excursion_id = :excursion_id';
        $imExCriteria->params = array(':excursion_id'=>$model->id);
        $data = ImagenExcursion::model()->findAll($imExCriteria);
        foreach($data as $ie) {
            $imageIdList[] = $ie->imagen_id;
        }
        ImagenExcursion::model()->deleteAll($imExCriteria);
        
        $imagenCriteria = new CDbCriteria;
        $imagenCriteria->condition = 'id = :ids';
        $imagenCriteria->params = array(':ids'=>implode(',', $imageIdList));
        $imagenes = Imagen::model()->findAll($imagenCriteria);
        foreach($imagenes as $imagen) {
            unlink(Yii::getPathOfAlias('webroot').substr($imagen->ruta_imagen, 6));
            Imagen::model()->deleteByPk($imagen->id);
        }
    }
    
}