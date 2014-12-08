<?php
/* @var $this TipoServicioController */
/* @var $model TipoServicio */

$this->menu=array(
	//array('label'=>'List TipoServicio', 'url'=>array('index')),
	array('label'=>'Administrar TipoServicio', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de Servicio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>