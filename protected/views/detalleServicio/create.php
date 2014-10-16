<?php
/* @var $this DetalleServicioController */
/* @var $model DetalleServicio */

$this->breadcrumbs=array(
    'Create',
);

$this->menu=array(
    array('label'=>'Manage DetalleServicio', 'url'=>array('admin')),
);
?>

<h1>Create DetalleServicio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>