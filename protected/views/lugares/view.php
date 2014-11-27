<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
    $model->id,
);

$this->menu=array(
    array('label'=>'Create Lugares', 'url'=>array('create')),
    array('label'=>'Update Lugares', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete Lugares', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Lugares', 'url'=>array('admin')),
);
?>

<h1>View Lugares #<?php echo $model->id; ?></h1>

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
