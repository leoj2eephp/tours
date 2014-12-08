<?php
/* @var $this ExtraController */
/* @var $model Extra */

$this->menu=array(
	//array('label'=>'List Extra', 'url'=>array('index')),
	array('label'=>'Crear Extra', 'url'=>array('create')),
	array('label'=>'Actualizar Extra', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Extra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
	array('label'=>'Administrar Extra', 'url'=>array('admin')),
);
?>

<h1>Ver Extra #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'id',
            'nombre',
            'valor',
	),
)); ?>
