<?php
/* @var $this TipoServicioController */
/* @var $model TipoServicio */

$this->menu=array(
	//array('label'=>'List TipoServicio', 'url'=>array('index')),
	array('label'=>'Crear TipoServicio', 'url'=>array('create')),
	array('label'=>'Ver TipoServicio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar TipoServicio', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Servicio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>