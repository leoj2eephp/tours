<?php
/* @var $this TourController */
/* @var $model Tour */

$this->menu=array(
    array('label'=>'Crear Tour', 'url'=>array('create')),
    array('label'=>'Actualizar Tour', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Eliminar Tour', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
    array('label'=>'Administrar Tour', 'url'=>array('admin')),
);
?>

<h1>Ver Tour #<?php echo $model->id; ?></h1>

<?php
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'excursions.nombre',
		//'primera',
                'tipoExcursion.nombre',
                'valor',
	),
)); ?>