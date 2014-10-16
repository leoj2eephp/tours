<?php
/* @var $this LineaAereaController */
/* @var $model LineaAerea */

$this->breadcrumbs=array(
    $model->id=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'Create LineaAerea', 'url'=>array('create')),
    array('label'=>'View LineaAerea', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage LineaAerea', 'url'=>array('admin')),
);
?>

<h1>Update LineaAerea <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>