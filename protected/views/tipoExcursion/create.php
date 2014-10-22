<?php
/* @var $this TipoExcursionController */
/* @var $model TipoExcursion */

$this->breadcrumbs=array(
    'Create',
);

$this->menu=array(
    array('label'=>'Manage TipoExcursion', 'url'=>array('admin')),
);
?>

<h1>Create TipoExcursion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>