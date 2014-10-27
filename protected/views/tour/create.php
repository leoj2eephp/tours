<?php
/* @var $this TourController */
/* @var $model Tour */

$this->breadcrumbs=array(
    'Create',
);

$this->menu=array(
    array('label'=>'Manage Tour', 'url'=>array('admin')),
);
?>

<h1>Create Tour</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'excursiones'=>$excursiones,'tipoExcursionList'=>$tipoExcursionList)); ?>