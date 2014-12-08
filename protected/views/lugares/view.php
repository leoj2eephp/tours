<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
    $model->id,
);

$this->menu=array(
    array('label'=>'Crear Lugares', 'url'=>array('create')),
    array('label'=>'Actualizar Lugares', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Eliminar Lugares', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
    array('label'=>'Administrar Lugares', 'url'=>array('admin')),
);
?>

<h1>Ver Lugares #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'id',
            'lugars.nombre',
            'lugars.tipoServicio.nombre',
            'valor',
		//'lugar_id',
		//'primera',
	),
)); ?>
