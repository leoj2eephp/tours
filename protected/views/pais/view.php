<?php
/* @var $this PaisController */
/* @var $model Pais */

$this->menu=array(
	//array('label'=>'List Pais', 'url'=>array('index')),
	array('label'=>'Crear País', 'url'=>array('create')),
	array('label'=>'Actualizar País', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar País', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
	array('label'=>'Administrar País', 'url'=>array('admin')),
);
?>

<h1>Ver País #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'nacionalidad',
	),
)); ?>
