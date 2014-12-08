<?php
/* @var $this TipoExcursionController */
/* @var $model TipoExcursion */


$this->menu=array(
    array('label'=>'Crear Tipo de Excursión', 'url'=>array('create')),
    array('label'=>'Ver Tipo de Excursión', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Administrar Tipo de Excursión', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Excursión <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>