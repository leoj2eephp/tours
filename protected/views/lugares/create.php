<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
    'Create',
);

$this->menu=array(
    array('label'=>'Manage Lugares', 'url'=>array('admin')),
);
?>

<h1>Create Lugares</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'lugars'=>$lugars,'tipoServicioList'=>$tipoServicioList,'modelTS'=>$modelTS));