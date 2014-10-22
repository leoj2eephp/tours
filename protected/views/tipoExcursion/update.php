<?php
/* @var $this TipoExcursionController */
/* @var $model TipoExcursion */

$this->breadcrumbs=array(
    $model->id=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'Create TipoExcursion', 'url'=>array('create')),
    array('label'=>'View TipoExcursion', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage TipoExcursion', 'url'=>array('admin')),
);
?>

<h1>Update TipoExcursion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>