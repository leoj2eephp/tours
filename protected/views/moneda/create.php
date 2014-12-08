<?php
/* @var $this MonedaController */
/* @var $model Moneda */

$this->menu=array(
	//array('label'=>'List Moneda', 'url'=>array('index')),
	array('label'=>'Administrar Moneda', 'url'=>array('admin')),
);
?>

<h1>Crear Moneda</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>