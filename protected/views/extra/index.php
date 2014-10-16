<?php
/* @var $this ExtraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Extras',
);

$this->menu=array(
	array('label'=>'Create Extra', 'url'=>array('create')),
	array('label'=>'Manage Extra', 'url'=>array('admin')),
);
?>

<h1>Extras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
