<?php
/* @var $this DetalleServicioController */
/* @var $model DetalleServicio */

$this->breadcrumbs=array(
    $model->id=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'Create DetalleServicio', 'url'=>array('create')),
    array('label'=>'View DetalleServicio', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage DetalleServicio', 'url'=>array('admin')),
);
?>

<h1>Update DetalleServicio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>