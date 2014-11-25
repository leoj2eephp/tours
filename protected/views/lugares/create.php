<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
	'Lugares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lugares', 'url'=>array('index')),
	array('label'=>'Manage Lugares', 'url'=>array('admin')),
);
?>

<h1>Create Lugares</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>