<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->menu=array(
	//array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Crear Usuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'tipoUsuarioData'=>Usuario::getDataForDropDownList())); ?>