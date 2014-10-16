<?php
/* @var $this TipoServicioController */
/* @var $model TipoServicio */

$this->breadcrumbs=array(
	//'Tipo Servicios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List TipoServicio', 'url'=>array('index')),
	array('label'=>'Create TipoServicio', 'url'=>array('create')),
	array('label'=>'View TipoServicio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipoServicio', 'url'=>array('admin')),
);
?>

<h1>Update TipoServicio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>