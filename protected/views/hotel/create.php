<?php
/* @var $this HotelController */
/* @var $model Hotel */

$this->menu=array(
	//array('label'=>'List Hotel', 'url'=>array('index')),
	array('label'=>'Administrar Hotel', 'url'=>array('admin')),
);
?>

<h1>Crear Hotel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>