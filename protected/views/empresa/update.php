<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->menu=array(
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Ver Empresa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>

<h1>Actualizar Empresa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>