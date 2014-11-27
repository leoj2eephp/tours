<?php
/* @var $this DetalleServicioController */
/* @var $model DetalleServicio */

$this->breadcrumbs=array(
    $model->id,
);

$this->menu=array(
    array('label'=>'Create DetalleServicio', 'url'=>array('create')),
    array('label'=>'Update DetalleServicio', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete DetalleServicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage DetalleServicio', 'url'=>array('admin')),
);
?>

<h1>View DetalleServicio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'id',
            'nombre',
            'valor',
	),
)); ?>
