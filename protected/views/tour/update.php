<?php
/* @var $this TourController */
/* @var $model Tour */

$this->breadcrumbs=array(
    $model->id=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'Create Tour', 'url'=>array('create')),
    array('label'=>'View Tour', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage Tour', 'url'=>array('admin')),
);
?>

<h1>Update Tour <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'excursiones'=>$excursiones,'tours'=>$tours,'tipoExcursionList'=>$tipoExcursionList)); ?>