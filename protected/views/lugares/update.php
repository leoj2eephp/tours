<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->menu=array(
	array('label'=>'Crear Lugares', 'url'=>array('create')),
	array('label'=>'Ver Lugares', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Lugares', 'url'=>array('admin')),
);
?>

<h1>Actualizar Lugares <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'lugars'=>$lugars,'lugares'=>$lugares,'tipoServicioList'=>$tipoServicioList)); ?>