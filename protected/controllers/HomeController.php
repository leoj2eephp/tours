<?php
class HomeController extends Controller {
    
    public $layout='//layouts/main';
    //public $layout='//layouts/column2';
    
    public function accessRules() {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('index','view','getLugaresAjax','confirmacion'),
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
    
    public function actionIndex() {
        $tiposExcursionModel = TipoExcursion::model()->findAll();
        $this->render("index", array("tiposExcursionModel"=>$tiposExcursionModel));
    }
    
    public function actionInicio() {
        $this->renderPartial("inicio");
    }
    
    public function actionAboutUs() {
        $this->renderPartial("aboutUs");
    }
    
    public function actionTipoExcursion($idTipoExcursion) {
        try {
            $model = Tour::model()->findAll(array('condition'=>'primera=1 AND tipo_excursion_id = :teId', 'params'=>array(':teId'=>$idTipoExcursion)));
            $tours = array();
            foreach($model as $t) {
                $tours[] = Yii::app()->db->createCommand('CALL getFullTour2('.$t['id'].')')->queryAll();
            }
            $tipoExcursionModel = TipoExcursion::model()->findByPk($idTipoExcursion);
        } catch (Exception $ex) {
            echo '<pre>';
            print_r($ex);
            echo '</pre>';
        }
        $this->renderPartial("fullDay", array("tours"=>$tours,'tipoExcursionModel'=>$tipoExcursionModel));
    }
 
    public function actionShowExcursion($id) {
        $tours = Yii::app()->db->createCommand('CALL getFullTour2('.$id.')')->queryAll();
        $fullNameTour = Tour::getFullName($id);
        $aux = array();
        foreach ($tours as $tour) {
            $exIds[] = $tour["excursion_id"];
        }
        try {
            $excursiones = Excursion::model()->with("imagenes")->findAll('t.id IN ('.implode(',',$exIds).')');
        } catch (Exception $ex) {
            echo '<pre>';
            print_r($ex);
            echo '</pre>';
        }
        //$excursiones = Excursion::model()->findAll('id IN (:exIds)', array(":exIds"=>implode(',',$exIds)));
        $this->renderPartial("excursiones",array("excursiones"=>$excursiones,"fullNameTour"=>$fullNameTour));
    }
}