<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->menu=array(
    //array('label'=>'List Usuario', 'url'=>array('index')),
    array('label'=>'Crear Usuario', 'url'=>array('create')),
    array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Eliminar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro desea borrar este registro?')),
    array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Ver Usuario #<?php echo $model->id; ?></h1>

<?php 
    $model->rol = $model->rol == 1 ? 'ADMINISTRADOR' : 'AGENCIA';
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'rol',
		'email',
	),
)); ?>
