<?php
/* @var $this ExtraController */
/* @var $model Extra */

$this->breadcrumbs=array(
	//'Extras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Extra', 'url'=>array('index')),
	array('label'=>'Create Extra', 'url'=>array('create')),
	array('label'=>'View Extra', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Extra', 'url'=>array('admin')),
);
?>

<h1>Update Extra <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>