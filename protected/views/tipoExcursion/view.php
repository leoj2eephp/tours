<?php
/* @var $this TipoExcursionController */
/* @var $model TipoExcursion */

$this->breadcrumbs=array(
    $model->id,
);

$this->menu=array(
    array('label'=>'Create TipoExcursion', 'url'=>array('create')),
    array('label'=>'Update TipoExcursion', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete TipoExcursion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage TipoExcursion', 'url'=>array('admin')),
);
?>

<h1>View TipoExcursion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
