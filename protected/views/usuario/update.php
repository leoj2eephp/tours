<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->menu=array(
	//array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar Usuario <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'tipoUsuarioData'=>Usuario::getDataForDropDownList())); ?>