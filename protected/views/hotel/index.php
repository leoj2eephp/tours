<?php
/* @var $this HotelController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Crear Hotel', 'url'=>array('create')),
	array('label'=>'Administrar Hotel', 'url'=>array('admin')),
);
?>

<h1>Hotels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
