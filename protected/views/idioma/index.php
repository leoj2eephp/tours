<?php
/* @var $this IdiomaController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Crear Idioma', 'url'=>array('create')),
	array('label'=>'Administrar Idioma', 'url'=>array('admin')),
);
?>

<h1>Idiomas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
