<?php
/* @var $this ExtraController */
/* @var $model Extra */

$this->breadcrumbs=array(
	//'Extras'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Extra', 'url'=>array('index')),
	array('label'=>'Manage Extra', 'url'=>array('admin')),
);
?>

<h1>Create Extra</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>