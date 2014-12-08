<?php
/* @var $this DetalleServicioController */
/* @var $model DetalleServicio */

$this->menu=array(
    array('label'=>'Crear Detalle de Servicio', 'url'=>array('create')),
    array('label'=>'Ver Detalle de Servicio', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Administrar Detalle de Servicio', 'url'=>array('admin')),
);
?>

<h1>Actualizar Detalle de Servicio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>