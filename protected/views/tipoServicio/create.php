<?php
/* @var $this TipoServicioController */
/* @var $model TipoServicio */

$this->breadcrumbs=array(
	//'Tipo Servicios'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TipoServicio', 'url'=>array('index')),
	array('label'=>'Manage TipoServicio', 'url'=>array('admin')),
);
?>

<h1>Create TipoServicio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>