<?php
/* @var $this ExcursionController */
/* @var $model Excursion */

$this->breadcrumbs=array(
    'Create',
);

$this->menu=array(
    array('label'=>'Manage Excursion', 'url'=>array('admin')),
);
?>

<h1>Create Excursion</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'excursionList'=>$excursionList,)); ?>