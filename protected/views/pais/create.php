<?php
/* @var $this PaisController */
/* @var $model Pais */

$this->menu=array(
	//array('label'=>'List Pais', 'url'=>array('index')),
	array('label'=>'Administrar País', 'url'=>array('admin')),
);
?>

<h1>Crear País</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>