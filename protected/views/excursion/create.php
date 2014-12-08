<?php
/* @var $this ExcursionController */
/* @var $model Excursion */

$this->menu=array(
    array('label'=>'Administrar Excursión', 'url'=>array('admin')),
);
?>

<h1>Crear Excursión</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'excursionList'=>$excursionList,'tipoServicios'=>$tipoServicios,)); ?>