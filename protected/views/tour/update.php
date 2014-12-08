<?php
/* @var $this TourController */
/* @var $model Tour */

$this->menu=array(
    array('label'=>'Crear Tour', 'url'=>array('create')),
    array('label'=>'Ver Tour', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Administrar Tour', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tour <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'excursiones'=>$excursiones,'tours'=>$tours,'tipoExcursionList'=>$tipoExcursionList)); ?>