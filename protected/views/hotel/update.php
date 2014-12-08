<?php
/* @var $this HotelController */
/* @var $model Hotel */


$this->menu=array(
	//array('label'=>'List Hotel', 'url'=>array('index')),
	array('label'=>'Crear Hotel', 'url'=>array('create')),
	array('label'=>'Ver Hotel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Hotel', 'url'=>array('admin')),
);
?>

<h1>Actualizar Hotel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>