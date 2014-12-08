<?php
/* @var $this ExtraController */
/* @var $model Extra */

$this->menu=array(
	//array('label'=>'List Extra', 'url'=>array('index')),
	array('label'=>'Administrar Extra', 'url'=>array('admin')),
);
?>

<h1>Crear Extra</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>