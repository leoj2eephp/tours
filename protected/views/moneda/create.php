<?php
/* @var $this MonedaController */
/* @var $model Moneda */

$this->breadcrumbs=array(
	//'Monedas'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Moneda', 'url'=>array('index')),
	array('label'=>'Manage Moneda', 'url'=>array('admin')),
);
?>

<h1>Create Moneda</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>