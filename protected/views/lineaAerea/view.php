<?php
/* @var $this LineaAereaController */
/* @var $model LineaAerea */

$this->menu=array(
    array('label'=>'Crear Línea Aérea', 'url'=>array('create')),
    array('label'=>'Actualizar Línea Aérea', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Eliminar Línea Aérea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
    array('label'=>'Administrar Línea Aérea', 'url'=>array('admin')),
);
?>

<h1>Ver Línea Aérea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
