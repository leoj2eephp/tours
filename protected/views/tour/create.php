<?php
/* @var $this TourController */
/* @var $model Tour */

$this->menu=array(
    array('label'=>'Administrar Tour', 'url'=>array('admin')),
);
?>

<h1>Crear Tour</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'excursiones'=>$excursiones,'tipoExcursionList'=>$tipoExcursionList)); ?>