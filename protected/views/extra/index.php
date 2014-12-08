<?php
/* @var $this ExtraController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Crear Extra', 'url'=>array('create')),
	array('label'=>'Administrar Extra', 'url'=>array('admin')),
);
?>

<h1>Extras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
