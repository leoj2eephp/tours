<?php

class CotizacionController extends Controller {
    
    public $layout='//layouts/column2';
    
    public function accessRules() {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('index','view','getLugaresAjax','confirmacion'),
                    'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('admin','delete','create','update','asdf'),
                    'users'=>Usuario::getTypeUsers(1, false), //usuario admin, no uppercase
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }
    
    public function actionCreate() {
        $cotizacionForm = new CotizacionForm();
        $model = new Cotizacion;
        $modelCotizante = new Cotizante;
        
        $paisesData = Pais::getDataForDropDownList();
        $monedasData = Moneda::getDataForDropDownList();
        $hotelesData = Hotel::getDataForDropDownList();
        if(isset($_POST['CotizacionForm'])) {
            $model->attributes = $_POST['CotizacionForm'];
            $myDateTime1 = DateTime::createFromFormat('d/m/Y', $model->fecha);
            $model->fecha = $myDateTime1->format('Y-m-d');
            $myDateTime2 = DateTime::createFromFormat('d/m/Y', $model->fecha_inicio);
            $model->fecha_inicio = $myDateTime2->format('Y-m-d');
            $myDateTime3 = DateTime::createFromFormat('d/m/Y', $model->fecha_termino);
            $model->fecha_termino = $myDateTime3->format('Y-m-d');
            $modelCotizante->attributes = $_POST['CotizacionForm'];
            if($modelCotizante->save()){
                $model->cotizante_id = $modelCotizante->id;
                if($model->save())
                    $this->redirect(array('servicios','id'=>$model->id));
            }
        }
        
        $this->render('create', array(
            "cotizacionForm"=>$cotizacionForm,
            "monedasData"=>$monedasData,
            "hotelesData"=>$hotelesData,
            "paisesData"=>$paisesData));
    }
    
    public function actionServicios($id) {
        //$model=array();
        // since you know how many models
        $model = new Servicio;
        if(isset($_POST['Servicio'])) {
            foreach ($_POST['Servicio'] as $j=>$postModel) {
                if (isset($_POST['Servicio'][$j])) {
                    $servicioModel = new Servicio; // if you had static model only
                    $servicioModel->attributes=$postModel;
                    $servicioModel->cotizacion_id = $id;
                    $myDateTime = DateTime::createFromFormat('d/m/Y', $servicioModel->fecha);
                    $servicioModel->fecha = $myDateTime->format('Y-m-d');
                    if($servicioModel->save()) {
                        foreach ($postModel['extras'] as $extra){
                            $extrasModel = new ExtraServicio;
                            $extrasModel->servicio_id = $servicioModel->id;
                            $extrasModel->extra_id = $extra;
                            $extrasModel->save();
                        }
                    }
                    //$valid=$models[$j]->validate() && $valid;
                }
            }
            Yii::app()->user->setState('idCotizacion',$id);
            $this->redirect(array('confirmacion'));
        }
        $modelCotizacion = Cotizacion::model()->findByPk($id);
        $tiposServicio = TipoServicio::getDataForDropDownList();
        $idiomas = Idioma::getDataForDropDownList();
        $extras = Extra::getDataForDropDownList();
        $this->render('servicios2', array("model"=>$model, "modelCotizacion"=>$modelCotizacion, 
                        "tiposServicio"=>$tiposServicio, 'idiomas'=>$idiomas, 'extras'=>$extras));
    }
    
    public function actionConfirmacion() {
        $id = Yii::app()->user->getState('idCotizacion');
        $model = Cotizacion::model()->with('servicios','cotizante','cotizante.pais','moneda','asunto','hotel',
                    'arrivoCjc','salidaCjc','arrivoCjc.detalleServicio','pasajeros')->findByPk($id);
        $modelArrivoCjc = new ArrivoCjc;
        $modelSalidaCjc = new SalidaCjc;
        if(isset($_POST['ArrivoCjc']) && isset($_POST['SalidaCjc']) && isset($_POST['Pasajero'])) {
            $modelArrivoCjc->attributes = $_POST['ArrivoCjc'];
            $modelSalidaCjc->attributes = $_POST['SalidaCjc'];
            
            $modelArrivoCjc->save();
            $modelSalidaCjc->save();
            foreach ($_POST['Pasajero'] as $pasajero){
                $modelPasajero = new Pasajero;
                $modelPasajero->attributes = $pasajero;
                $modelPasajero->cotizacion_id = $id;
                $myDateTime = DateTime::createFromFormat('d/m/Y', $modelPasajero->fecha_nac);
                $modelPasajero->fecha_nac = $myDateTime->format('Y-m-d');
                $modelPasajero->save();
            }
            //$valid=$models[$j]->validate() && $valid;
        }
        $modelPasajero = new Pasajero;
        $model->fecha = date('d-m-Y', strtotime($model->fecha));
        $model->fecha_inicio = date('d-m-Y', strtotime($model->fecha_inicio));
        $model->fecha_termino = date('d-m-Y', strtotime($model->fecha_termino));
        if(isset($model->arrivoCjc)) {
            $model->arrivoCjc->fecha = date('D, d M, Y', strtotime($model->arrivoCjc->fecha));
            $model->arrivoCjc->hora_vuelo = date('h:i', strtotime($model->arrivoCjc->hora_vuelo));
            $model->arrivoCjc->hora_pickup = date('h:i', strtotime($model->arrivoCjc->hora_pickup));
        }
        if(isset($model->salidaCjc)) {
            $model->salidaCjc->fecha = date('D, d M, Y', strtotime($model->salidaCjc->fecha));
            $model->salidaCjc->hora_vuelo = date('h:i', strtotime($model->salidaCjc->hora_vuelo));
            $model->salidaCjc->hora_pickup = date('h:i', strtotime($model->salidaCjc->hora_pickup));
        }
        if(isset($model->pasajeros)) {
            foreach($model->pasajeros as $pasajero) {
                $pasajero->fecha_nac = date('d-m-Y', strtotime($pasajero->fecha_nac));
            }
        }
        $modelPais = Pais::model()->findAll();
        $paises = CHtml::listData($modelPais, 'id', 'nacionalidad');
        
        $lineasAereas = LineaAerea::getDataForDropDownList();
        $idiomas = Idioma::getDataForDropDownList();
        $detalleServicios = DetalleServicio::getDataForDropDownList();
        $this->render('confirmacion3', array('model'=>$model, "lineasAereas"=>$lineasAereas, 'modelArrivoCjc'=>$modelArrivoCjc, 'modelSalidaCjc'=>$modelSalidaCjc,
                        'idiomas'=>$idiomas, 'detalleServicios'=>$detalleServicios, 'modelPasajero'=>$modelPasajero, 'paises'=>$paises));
    }
    
    /**
    * Performs the AJAX validation.
    * @param Idioma $model the model to be validated
    */
    protected function performAjaxValidation($model) {
        if(isset($_POST['ajax']) && $_POST['ajax']==='idioma-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionGetLugaresAjax() {
        //$id = $_POST['Servicio']['tipo_servicio_id'][0];
        $id = $_POST['idTipoServicio'];
        $index = $_POST['index'];
        $lista = Lugar::model()->findAll('tipo_servicio_id = :servicioId',array(':servicioId'=>$id));
        $lista = CHtml::listData($lista, 'id', 'nombre');
        foreach($lista as $dato => $nombre) {
            echo CHtml::tag('option',array('value'=>$dato),CHtml::encode($nombre),true);
        }
    }
    
    /*  Nunca fueeeeee!!
    public function actionAddRow() {
        $rowId = isset($_POST['rowId']) ? $_POST['rowId'] + 1 : null;
        $model = new Servicio;
        $tiposServicio = TipoServicio::getDataForDropDownList();
        $idiomas = Idioma::getDataForDropDownList();
        $extras = Extra::getDataForDropDownList();
        
        $this->renderPartial('asdf', array('model'=>$model, 'newRow'=>$rowId, "tiposServicio"=>$tiposServicio, 
                                            'idiomas'=>$idiomas, 'extras'=>$extras));
    }
    */
    /*
        echo '<pre>';
        print_r($lista);
        echo '</pre>';
     */
}