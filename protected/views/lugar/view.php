<?php
/* @var $this LugarController */
/* @var $model Lugar */

$this->breadcrumbs=array(
	//'Lugars'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Lugar', 'url'=>array('index')),
	array('label'=>'Crear Lugar', 'url'=>array('create')),
	array('label'=>'Actualizar Lugar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Lugar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
	array('label'=>'Administrar Lugar', 'url'=>array('admin')),
);
?>

<h1>Ver Lugar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'valor',
		'tipoServicio.nombre',
	),
)); ?>
