<?php
/* @var $this ExcursionController */
/* @var $model Excursion */

$this->breadcrumbs=array(
    $model->id,
);

$this->menu=array(
    array('label'=>'Create Excursion', 'url'=>array('create')),
    array('label'=>'Update Excursion', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete Excursion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Excursion', 'url'=>array('admin')),
);
?>

<h1>View Excursion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
	),
)); ?>
