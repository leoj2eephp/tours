<?php
/* @var $this LugarController */
/* @var $model Lugar */

$this->breadcrumbs=array(
	//'Lugars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Lugar', 'url'=>array('index')),
	array('label'=>'Crear Lugar', 'url'=>array('create')),
	array('label'=>'Ver Lugar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Lugar', 'url'=>array('admin')),
);
?>

<h1>Actualizar Lugar <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'tipoServicios'=>$tipoServicios)); ?>