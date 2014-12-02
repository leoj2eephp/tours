<?php

class ProgramaController extends Controller {
    
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
        $model = new Programa;
        $empresasData = Empresa::getDataForDropDownList();
        $paisesData = Pais::getDataForDropDownList();
        $monedasData = Moneda::getDataForDropDownList();
        $rangoPax = array();
        for($i=4;$i<13;$i++) {
            $rangoPax[$i] = $i;
        }
        
        if(isset($_POST['Programa'])) {
            $model->attributes = $_POST['Programa'];
            if($model->validate()) {
                $myDateTime1 = DateTime::createFromFormat('d/m/Y', $model->fecha);
                $model->fecha = $myDateTime1->format('Y-m-d');
                /*$myDateTime2 = DateTime::createFromFormat('d/m/Y', $model->fecha_inicio);
                $model->fecha_inicio = $myDateTime2->format('Y-m-d');
                $myDateTime3 = DateTime::createFromFormat('d/m/Y', $model->fecha_termino);
                $model->fecha_termino = $myDateTime3->format('Y-m-d');*/
                //if($modelCotizante->save()){
                    //$model->cotizante_id = $modelCotizante->id;
                if($model->save()) {
                    Yii::app()->user->setState('idPrograma',$model->id);
                    $this->redirect(array('servicios'));
                }
                //}
            } else {
                $model->addErrors($model->getErrors());
                //$cotizacionForm->addErrors($modelCotizante->getErrors());
            }
        }
        
        $this->render('create', array(
            "model"=>$model,
            "empresasData"=>$empresasData,
            "monedasData"=>$monedasData,
            "rangoPax"=>$rangoPax,
            "paisesData"=>$paisesData));
    }
    
    public function actionServicios() {
        $id = Yii::app()->user->getState('idPrograma');
        $paxMin = 5;
        $paxMax = 7;
        $model = new ServicioPrograma;
        if(isset($_POST['ServicioPrograma'])) {
            $valid = true;
            foreach ($_POST['Servicio'] as $j=>$postModel) {
                if (isset($_POST['Servicio'][$j])) {
                    $servicioModel = new Servicio;
                    $servicioModel->attributes=$postModel;
                    $valid=$servicioModel->validate() && $valid;
                    if($valid) {
                        $servicioModel->cotizacion_id = $id;
                        $myDateTime = DateTime::createFromFormat('d/m/Y', $servicioModel->fecha);
                        $servicioModel->fecha = $myDateTime->format('Y-m-d');
                        if($servicioModel->save() && isset($postModel['extras'])) {
                            foreach ($postModel['extras'] as $extra){
                                $extrasModel = new ExtraServicio;
                                $extrasModel->servicio_id = $servicioModel->id;
                                $extrasModel->extra_id = $extra;
                                $extrasModel->save();
                            }
                        }
                    } else {
                        $model->addErrors($servicioModel->errors);
                    }
                }
            }
            if($valid)
                $this->redirect(array('confirmacion'));
        }
        $modelPrograma = Programa::model()->findByPk($id);
        $tiposServicio = TipoServicio::getDataForDropDownList();
        $idiomas = Idioma::getDataForDropDownList();
        $extras = Extra::getDataForDropDownList();
        $this->render('servicios2', array("model"=>$model, "modelCotizacion"=>$modelPrograma, "tiposServicio"=>$tiposServicio,
            'idiomas'=>$idiomas, 'extras'=>$extras, 'paxMin'=>$paxMin, 'paxMax'=>$paxMax));
    }
    
    public function actionGetLugaresAjax() {
        $id = $_POST['idTipoServicio'];
        $params = ["index"=>$_POST['index'], "idHtml"=>$_POST['idHtml']];
        $json = array();
        $lista = Tour::getFullNameAll($id);
        if($lista != null) {
            foreach($lista as $l) {
                $json[] = CHtml::tag('option',array('value'=>$l['id'], 'precio'=>$l['valor']),CHtml::encode($l['nombre']),true);
            }
        }
        array_push($json, $params);
        echo CJSON::encode($json);
    }
    
    public function actionCargarIdiomas() {
        $idiomas = Idioma::model()->findAll();
        $json = array();
        echo '<option precio="0" value>Seleccione</option>';
        foreach($idiomas as $i) {
            echo '<option value="'.$i['id'].'" precio="'.$i['valor'].'">'.$i['nombre'].'</option>';
        }
    }
    
    public function actionCargarExtras() {
        $extra = Extra::model()->findAll();
        $json = array();
        foreach($extra as $i) {
            echo '<option value="'.$i['id'].'" precio="'.$i['valor'].'">'.$i['nombre'].'</option>';
        }
    }
    
}