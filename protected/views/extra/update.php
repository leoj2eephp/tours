<?php
/* @var $this ExtraController */
/* @var $model Extra */

$this->menu=array(
	//array('label'=>'List Extra', 'url'=>array('index')),
	array('label'=>'Crear Extra', 'url'=>array('create')),
	array('label'=>'Ver Extra', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Extra', 'url'=>array('admin')),
);
?>

<h1>Actualizar Extra <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>