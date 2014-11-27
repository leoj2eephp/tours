<?php
/* @var $this ExtraController */
/* @var $model Extra */

$this->breadcrumbs=array(
	//'Extras'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Extra', 'url'=>array('index')),
	array('label'=>'Create Extra', 'url'=>array('create')),
	array('label'=>'Update Extra', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Extra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Extra', 'url'=>array('admin')),
);
?>

<h1>View Extra #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'id',
            'nombre',
            'valor',
	),
)); ?>
