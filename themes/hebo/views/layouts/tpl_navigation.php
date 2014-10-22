<section id="navigation-main">  
<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
                <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Home <span class="caret"></span>', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"our home page"), 
                        'items'=>array(
                            array('label'=>'Home 1 - Nivoslider', 'url'=>array('/site/index')),
                            array('label'=>'Home 2 - Bootstrap carousal', 'url'=>array('/site/page', 'view'=>'home2')),
                            array('label'=>'Home 3 - Piecemaker2', 'url'=>array('/site/page', 'view'=>'home3')),
                            array('label'=>'Home 4 - Static image', 'url'=>array('/site/page', 'view'=>'home4')),
                            array('label'=>'Home 5 - Video header', 'url'=>array('/site/page', 'view'=>'home5')),
                            array('label'=>'Home 6 - Without slider', 'url'=>array('/site/page', 'view'=>'home6')),
                        )),
                        array('label'=>'Administrar <span class="caret"></span>',
                            'visible'=>!Yii::app()->user->isGuest,
                            //'visible'=>in_array(strtoupper(Yii::app()->user->name), Usuario::getTypeUsers(1, true)),//usuario admin, uppercase
                            'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),
                            'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""),
                            'items'=>array(
                                    array('label'=>'Usuarios', 'url'=>array('/usuario/admin')),
                                    array('label'=>'Idiomas', 'url'=>array('/idioma/admin')),
                                    array('label'=>'País', 'url'=>array('/pais/admin')),
                                    array('label'=>'Moneda', 'url'=>array('/moneda/admin')),
                                    array('label'=>'Hotel', 'url'=>array('/hotel/admin')),
                                    array('label'=>'Tipo Servicio', 'url'=>array('/tipoServicio/admin')),
                                    array('label'=>'Lugar', 'url'=>array('/lugar/admin')),
                                    array('label'=>'Extra', 'url'=>array('/extra/admin')),
                                    array('label'=>'Línea Aérea', 'url'=>array('/lineaAerea/admin')),
                                    array('label'=>'Detalle Servicio', 'url'=>array('/detalleServicio/admin')),
                                    array('label'=>'Tipo Excursión', 'url'=>array('/tipoExcursion/admin')),
                                    array('label'=>'Excursión', 'url'=>array('/excursion/admin')),
                                )),
                        array('label'=>'Cotizar', 'url'=>array('/cotizacion/create'),
                            'visible'=>Yii::app()->user->isGuest),
                            //'visible'=>in_array(strtoupper(Yii::app()->user->name), Usuario::getTypeUsers(2, true))),//usuario agencia, uppercase
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                        array('label'=>'Registrarse', 'url'=>array('/registro/create'), 'visible'=>Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>
</section><!-- /#navigation-main -->