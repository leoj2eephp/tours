<?php
/* @var $this IdiomaController */
/* @var $model Idioma */

$this->menu=array(
    //array('label'=>'List Idioma', 'url'=>array('index')),
    array('label'=>'Crear Idioma', 'url'=>array('create')),
    array('label'=>'Ver Idioma', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Administrar Idioma', 'url'=>array('admin')),
);
?>

<h1>Actualizar Idioma <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>