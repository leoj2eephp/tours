<?php
/* @var $this IdiomaController */
/* @var $model Idioma */


$this->menu=array(
    //array('label'=>'List Idioma', 'url'=>array('index')),
    array('label'=>'Crear Idioma', 'url'=>array('create')),
    array('label'=>'Actualizar Idioma', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Eliminar Idioma', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro??')),
    array('label'=>'Administrar Idioma', 'url'=>array('admin')),
);
?>

<h1>Ver Idioma #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'id',
            'nombre',
            'valor',
	),
)); ?>
