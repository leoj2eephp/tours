<?php
/* @var $this TipoServicioController */
/* @var $model TipoServicio */

$this->breadcrumbs=array(
    //'Tipo Servicios'=>array('index'),
    $model->id,
);

$this->menu=array(
    //array('label'=>'List TipoServicio', 'url'=>array('index')),
    array('label'=>'Create TipoServicio', 'url'=>array('create')),
    array('label'=>'Update TipoServicio', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete TipoServicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage TipoServicio', 'url'=>array('admin')),
);
?>

<h1>View TipoServicio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'id',
            'nombre',
            array(            // display 'create_time' using an expression
                'name'=>'sigueA',
                'value'=>$model->sigueA == 0 ? "NO" : "SI",
            ),
	),
)); ?>
