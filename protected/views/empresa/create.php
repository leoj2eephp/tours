<?php
/* @var $this EmpresaController */
/* @var $model Empresa */


$this->menu=array(
	array('label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>

<h1>Crear Empresa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>