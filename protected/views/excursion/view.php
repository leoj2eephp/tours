<?php
/* @var $this ExcursionController */
/* @var $model Excursion */

$this->menu=array(
    array('label'=>'Crear Excursion', 'url'=>array('create')),
    array('label'=>'Actualizar Excursion', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Eliminar Excursion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
    array('label'=>'Administrar Excursion', 'url'=>array('admin')),
);
?>

<h1>Ver Excursión #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'id',
            'nombre',
            'descripcion',
            'tipoServicio.nombre',
            //'valor',
	),
)); ?>
