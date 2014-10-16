<?php
/* @var $this LineaAereaController */
/* @var $model LineaAerea */

$this->breadcrumbs=array(
    $model->id,
);

$this->menu=array(
    array('label'=>'Create LineaAerea', 'url'=>array('create')),
    array('label'=>'Update LineaAerea', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete LineaAerea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage LineaAerea', 'url'=>array('admin')),
);
?>

<h1>View LineaAerea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
