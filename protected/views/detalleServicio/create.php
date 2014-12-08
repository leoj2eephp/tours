<?php
/* @var $this DetalleServicioController */
/* @var $model DetalleServicio */

$this->menu=array(
    array('label'=>'Administrar Detalle de Servicio', 'url'=>array('admin')),
);
?>

<h1>Crear Detalle de Servicio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>