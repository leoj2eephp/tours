<?php
/* @var $this TipoExcursionController */
/* @var $model TipoExcursion */


$this->menu=array(
    array('label'=>'Administrar Tipo de Excursión', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de Excursión</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>