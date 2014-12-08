<?php
/* @var $this TipoExcursionController */
/* @var $model TipoExcursion */

$this->menu=array(
    array('label'=>'Crear Tipo de Excursión', 'url'=>array('create')),
    array('label'=>'Actualizar Tipo de Excursión', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Eliminar Tipo de Excursión', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
    array('label'=>'Administrar Tipo de Excursión', 'url'=>array('admin')),
);
?>

<h1>Ver Tipo de Excursión #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
