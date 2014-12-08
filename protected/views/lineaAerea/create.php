<?php
/* @var $this LineaAereaController */
/* @var $model LineaAerea */

$this->menu=array(
    array('label'=>'Administrar Línea Aérea', 'url'=>array('admin')),
);
?>

<h1>Crear Línea Aérea</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>