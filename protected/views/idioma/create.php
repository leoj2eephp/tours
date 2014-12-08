<?php
/* @var $this IdiomaController */
/* @var $model Idioma */

$this->menu=array(
    //array('label'=>'List Idioma', 'url'=>array('index')),
    array('label'=>'Administrar Idioma', 'url'=>array('admin')),
);
?>

<h1>Crear Idioma</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>