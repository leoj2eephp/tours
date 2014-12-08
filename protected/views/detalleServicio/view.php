<?php
/* @var $this DetalleServicioController */
/* @var $model DetalleServicio */

$this->menu=array(
    array('label'=>'Crear Detalle de Servicio', 'url'=>array('create')),
    array('label'=>'Actualizar Detalle de Servicio', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Eliminar Detalle de Servicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
    array('label'=>'Administrar Detalle de Servicio', 'url'=>array('admin')),
);
?>

<h1>Ver Detalle de Servicio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'id',
            'nombre',
            'valor',
	),
)); ?>
