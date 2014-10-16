<?php
/* @var $this LineaAereaController */
/* @var $model LineaAerea */

$this->breadcrumbs=array(
    'Create',
);

$this->menu=array(
    array('label'=>'Manage LineaAerea', 'url'=>array('admin')),
);
?>

<h1>Create LineaAerea</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>