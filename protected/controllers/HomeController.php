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
       $this->render("index");
    }
    
    public function actionAboutUs() {
        $this->renderPartial("aboutUs");
    }
    
    public function actionHalfDay() {
        $model = Excursion::model()->findAll('tipo_excursion_id = 1');
        $this->renderPartial("halfDay", array("model"=>$model));
    }
    
    public function actionFullDay() {
        try {
            $criteria = new CDbCriteria;
            $criteria->select = 't.id, t.nombre, ex.nombre as joinSeguidaPor, ex2.nombre as joinSigueA, sp.id as idSeguidas';
            $criteria->join = 'left join sigue_a as sa on t.id = sa.sigue_a_id ';
            $criteria->join .= 'left join sigue_a as sp on t.id = sp.seguida_por_id ';
            $criteria->join .= 'left join excursion as ex on ex.id = sa.seguida_por_id ';
            $criteria->join .= 'left join excursion as ex2 on ex2.id = sp.sigue_a_id ';
            $criteria->group = 't.id, ex2.nombre';
            $criteria->condition = 't.tipo_excursion_id = 2';
            $model = Excursion::model()->findAll($criteria);
        } catch (Exception $ex) {
            echo '<pre>';
            print_r($ex);
            echo '</pre>';
        }
        //$model = Excursion::model()->with('sigueA', 'seguidaPor')->findAll('tipo_excursion_id = 2');
        $this->renderPartial("fullDay", array("model"=>$model));
    }
    
    public function actionFullDayExtra() {
        $model = Excursion::model()->findAll('tipo_excursion_id = 3');
        $this->renderPartial("fullDayExtra", array("model"=>$model));
    }
 
    public function actionShowExcursion($id) {
        $tipoDato = substr($id, 0, 1);
        $model = null;
        if($tipoDato == 'e') {
            $pk = substr($id, 1);
            $model = Excursion::model()->findByPk($pk);
        } else if($tipoDato == 's') {
            $pk = substr($id, 1);
            $model = SigueA::model()->with('excursion')->findAllByPk($pk);
        }
        $this->renderPartial("excursiones",array("model"=>$model));
    }
}