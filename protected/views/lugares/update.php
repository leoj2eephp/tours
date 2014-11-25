<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
	'Lugares'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lugares', 'url'=>array('index')),
	array('label'=>'Create Lugares', 'url'=>array('create')),
	array('label'=>'View Lugares', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lugares', 'url'=>array('admin')),
);
?>

<h1>Update Lugares <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'lugars'=>$lugars,'lugares'=>$lugares,'tipoServicioList'=>$tipoServicioList)); ?>