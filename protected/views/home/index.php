<head>
    <style>
        body { font: normal normal normal 12px/1.4em 'open sans', sans-serif; }
        .nivoSlider { height: 150px; width: 99%; }
        /*.slider-bootstrap::after{
            content: 'asdfasdfads';
            position: absolute;
            top: 100%;
            bottom: -30px;
            width: 165px;
            right: -20px;
            background: url('<?php //echo Yii::app()->theme->baseUrl;?>/img/slider/sombra-novoSlider.png') 100% 0px no-repeat;
        }*/
        .navbar { display: none; }
        .container { display: none; }
        .row { padding: 5px 74px 0 40px; }
        .thumbnail {
            display: block;
            padding: 0;
            line-height: 20px;
        }
        .thumbnail>img {
            display: block;
            max-width: 100%;
            margin-right: auto;
            margin-left: 20px;
        }
        .line {
            height: 29px;
            width: 45px;
            min-height: 29px;
            /*position: absolute;
            top: 245px;*/
            background-image: url('<?php echo Yii::app()->theme->baseUrl;?>/img/fade_line.png');
            float: left;
            margin-top: 5px;
        }
        input[type="button"] { width: 162px; font: normal normal normal 13px/1.4em 'open sans', sans-serif; }
        .subMenu {
            border: none;
            background: url('<?php echo Yii::app()->theme->baseUrl;?>/img/subMenu.png')no-repeat;
            background-position: center; height: 28px; 
            color: white;
        }
        .subMenu:hover {
            border: none;
            background: url('<?php echo Yii::app()->theme->baseUrl;?>/img/subMenu-hover.png')no-repeat;
            background-position: center; height: 28px; 
            color: white;
        }
        #contactanos {
            border: none; 
            background-color: rgb(226, 127, 35);
            height: 28px; width: 150px;
            color: white;
        }
        #contactanos:hover {
            border: none; 
            background-color: skyblue;
            height: 28px; width: 150px;
            color: white;
        }
        #contactanos::after {
            background: url('<?php echo Yii::app()->theme->baseUrl;?>/img/sombra.png') 100% 0px no-repeat;
        }
        
        .font_h2 { font: normal normal normal 18px/1.4em 'open sans', sans-serif; }
        .font_parrafo { font: normal normal normal 13px/1.4em 'open sans', sans-serif; color: rgb(62, 62, 62); }
        .tourTitle { position: relative; top: 8px; left: 14px; color: white;}
        
        /* Estilos para el menu horizontal */
        a { color: rgb(117, 100, 100); }
        .bordes { border-top: 1px solid; border-bottom: 1px solid; }
        .menu {
            list-style:none;
            padding:0px;
            margin:0px;
        }
        .menu li {
            margin: 0px;
            padding: 0px;
            float: left;
            position: relative;
        }
        .menu li a {
            display: block;
            width: 100px;
            height: 30px;
            line-height:30px;
            text-decoration: none;
            text-align: center;
            position: relative;
        }
        .menu li a:hover {
            color: white;
            background-color: #A39292;
        }
        .menu li .notHover:hover {
            cursor: default;
            background-color: #F2F0EC;
        }
        .menu li ul {
            display: none;
            position: absolute;
            min-width: 150px;
            list-style:none;
            padding:0px;
            margin:0px;
            background: orange;
        }
        .menu li ul a {
            width: 150px;
            text-align: left;
            padding-left: 5px;
        }
        .menu li:hover > ul {
            display:block;
        }
        
    </style>
    
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/nivo-slider/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            
            $("#sobreNosotros").click(function(){
                $("#contenido").load('home/aboutUs');
            });
            $("#halfDay").click(function(){
                $("#contenido").load('home/halfDay');
            });
            $("#fullDay").click(function(){
                $("#contenido").load('home/fullDay');
            });
            $("#fullDayExtra").click(function(){
                $("#contenido").load('home/fullDayExtra');
            });
            
            $('#slider-nivo').nivoSlider({
                effect: 'boxRandom',
                manualAdvance:false,
                controlNav: false,
                directionNav: false,
                pauseTime: 2500,
            });
            
        });
    </script>
</head>
<body>
    
    <div class="slider-bootstrap"><!-- start slider -->
    	<div class="slider-wrapper theme-default" style="padding-left: 11px;" >
            <div id="slider-nivo" class="nivoSlider">
                <img src="<?php echo Yii::app()->theme->baseUrl;?>/img/slider/flickr/s10.jpg" data-thumb="<?php echo Yii::app()->theme->baseUrl;?>/img/slider/flickr/s10.jpg" alt="" title="" />
                <img src="<?php echo Yii::app()->theme->baseUrl;?>/img/slider/flickr/s11.jpg" data-thumb="<?php echo Yii::app()->theme->baseUrl;?>/img/slider/flickr/s11.jpg" alt="" title="" />
            </div>
        </div>

    </div> <!-- /slider -->
    
    <div class="row-fluid">
        <ul class="thumbnails">
            <li class="span3" style="width: 101px;" >
                <div class="thumbnail" style="padding-top: 15px;">
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/img/slider/logo.png" alt="" title="" />
                </div>
            </li>
            <li class="span3" style="padding-top: 35px; margin-left: 20px; width: 141px;">
                <div class="thumbnail">
                    <span style="font-family:spinnaker,sans-serif;font-size:36px;color:#5B7AA6;">CIELO</span>
                </div>
                <div class="thumbnail">
                    <span style="font-family:spinnaker,sans-serif;font-size:30px;color:#D7943E;">NORTE</span>
                </div>
                <div class="thumbnail">
                    <span style="font-size: 11px;">SAN PEDRO ATACAMA</span>
                </div>
            </li>
            <li class="span3" style="width: 960px;">
                <div class="thumbnail" style="text-align: right; padding-top: 11px; margin-bottom: 15px;">
                    <input type="button" id="iniciarSesion" value="INICIAR SESIÓN" />
                </div>
                <div class="thumbnail">
                    <ul class="menu">
                        <li><a href="#" class="notHover" style="width: 328px;"></a></li>
                        <li><a href="" class="bordes">EXCURSIONES</a>
                            <ul>
                                <li><a href="#" id="halfDay">HALF DAY</a></li>
                                <li><a href="#" id="fullDay">FULL DAY</a></li>
                                <li><a href="#" id="fullDayExtra">FULL DAY EXTRA</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="bordes">TREKKING</a></li>
                        <li><a href="#" class="bordes">ASCENSIONES</a></li>
                        <li><a href="#" class="bordes">TRANSFERS</a></li>
                        <li><a href="#" class="bordes notHover" style="width: 200px;" class="bordes"></a></li>
                    </ul>
                </div>
                <div class="thumbnail">
                    <div style="background-position: 0px 0px; left: 295px;" class="line"></div>
                    <div style="background-position: 0px -29px; left: 340px; width: 840px;" class="line"></div>
                    <div style="background-position: 100% 0px; left: 1150px;" class="line"></div>
                </div>
            </li>
        </ul>
        <ul class="thumbnails">
            <li class="span3" style="width: 101px;">
            </li>
            <li class="span3" style="margin-left: 0px; width: 177px;">
                <div class="thumbnail">
                    <input type="button" value="INICIO" id="inicio" class="subMenu"/>
                </div>
                <div class="thumbnail" style="padding-top: 10px;">
                    <input type="button" value="SOBRE NOSOTROS" id="sobreNosotros" class="subMenu"/>
                </div>
                <div class="thumbnail" style="padding-top: 10px;">
                    <input type="button" value="PANORAMICAS" id="panoramica" class="subMenu"/>
                </div>
                <div class="thumbnail" style="padding-top: 10px;">
                    <input type="button" value="GALERIA" id="galeria" class="subMenu"/>
                </div>
                <div class="thumbnail" style="padding-top: 10px;">
                    <input type="button" value="CONTACTANOS" id="contactanos"/>
                </div>
            </li>
            <li class="span3" style="width: 870px;" >
                <div id="contenido"></div>
            </li>
        </ul>
    </div>
    
</body>