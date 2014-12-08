<?php
/* @var $this TipoServicioController */
/* @var $model TipoServicio */

$this->menu=array(
    //array('label'=>'List TipoServicio', 'url'=>array('index')),
    array('label'=>'Crear Tipo de Servicio', 'url'=>array('create')),
    array('label'=>'Actualizar Tipo de Servicio', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Eliminar Tipo de Servicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea eliminar este registro?')),
    array('label'=>'Administrar Tipo de Servicio', 'url'=>array('admin')),
);
?>

<h1>Ver Tipo de Servicio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'id',
            'nombre',
            array(            // display 'create_time' using an expression
                'name'=>'sigueA',
                'value'=>$model->sigueA == 0 ? "NO" : "SI",
            ),
            'valor',
	),
)); ?>
