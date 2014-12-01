<?php
/* @var $this ExcursionController */
/* @var $model Excursion */

$this->breadcrumbs=array(
    $model->id=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'Create Excursion', 'url'=>array('create')),
    array('label'=>'View Excursion', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage Excursion', 'url'=>array('admin')),
);
?>

<h1>Update Excursion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'excursionList'=>$excursionList,'tipoServicios'=>$tipoServicios,)); ?>