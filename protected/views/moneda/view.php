<?php
/* @var $this MonedaController */
/* @var $model Moneda */


$this->menu=array(
	//array('label'=>'List Moneda', 'url'=>array('index')),
	array('label'=>'Crear Moneda', 'url'=>array('create')),
	array('label'=>'Actualizar Moneda', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Moneda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
	array('label'=>'Administrar Moneda', 'url'=>array('admin')),
);
?>

<h1>Ver Moneda #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'conversion_dolar',
	),
)); ?>
