<?php
/* @var $this LineaAereaController */
/* @var $model LineaAerea */

$this->breadcrumbs=array(
    $model->id=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'Crear Línea Aérea', 'url'=>array('create')),
    array('label'=>'Ver Línea Aérea', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Administrar Línea Aérea', 'url'=>array('admin')),
);
?>

<h1>Actualizar Línea Aérea <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>