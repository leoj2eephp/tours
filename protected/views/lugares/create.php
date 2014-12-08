<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
    'Create',
);

$this->menu=array(
    array('label'=>'Administrar Lugares', 'url'=>array('admin')),
);
?>

<h1>Crear Lugares</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'lugars'=>$lugars,'tipoServicioList'=>$tipoServicioList,'modelTS'=>$modelTS));