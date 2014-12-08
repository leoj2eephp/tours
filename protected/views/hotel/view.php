<?php
/* @var $this HotelController */
/* @var $model Hotel */

$this->menu=array(
	//array('label'=>'List Hotel', 'url'=>array('index')),
	array('label'=>'Crear Hotel', 'url'=>array('create')),
	array('label'=>'Actualizar Hotel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Hotel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
	array('label'=>'Administrar Hotel', 'url'=>array('admin')),
);
?>

<h1>Ver Hotel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
