<?php
/* @var $this PaisController */
/* @var $model Pais */


$this->menu=array(
	//array('label'=>'List Pais', 'url'=>array('index')),
	array('label'=>'Crear País', 'url'=>array('create')),
	array('label'=>'Ver País', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar País', 'url'=>array('admin')),
);
?>

<h1>Actualizar País <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>