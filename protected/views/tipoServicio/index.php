<?php
/* @var $this TipoServicioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Servicios',
);

$this->menu=array(
	array('label'=>'Create TipoServicio', 'url'=>array('create')),
	array('label'=>'Manage TipoServicio', 'url'=>array('admin')),
);
?>

<h1>Tipo Servicios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
