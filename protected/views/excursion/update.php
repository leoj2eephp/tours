<?php
/* @var $this ExcursionController */
/* @var $model Excursion */

$this->menu=array(
    array('label'=>'Crear Excursión', 'url'=>array('create')),
    array('label'=>'Ver Excursión', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Administrar Excursión', 'url'=>array('admin')),
);
?>

<h1>Actualizar Excursión <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'excursionList'=>$excursionList,'tipoServicios'=>$tipoServicios,)); ?>