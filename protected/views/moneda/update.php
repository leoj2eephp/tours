<?php
/* @var $this MonedaController */
/* @var $model Moneda */


$this->menu=array(
	//array('label'=>'List Moneda', 'url'=>array('index')),
	array('label'=>'Crear Moneda', 'url'=>array('create')),
	array('label'=>'Ver Moneda', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Moneda', 'url'=>array('admin')),
);
?>

<h1>Actualizar Moneda <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>