<script>
    $(document).ready(function(){
        $('.slider-nivo-excursion').nivoSlider({
            effect: 'boxRandom',
            controlNav: true,
            pauseTime: 2500,
            controlNavThumbs: true,
            directionNav: false,
        });
        
        $("#hdTour").click(function(){
            $("#contenido").load('home/tipoExcursion?idTipoExcursion=1');
        });
        $("#fdTour").click(function(){
            $("#contenido").load('home/tipoExcursion?idTipoExcursion=2');
        });
        $("#fdexTour").click(function(){
            $("#contenido").load('home/tipoExcursion?idTipoExcursion=3');
        });
    });
</script>
<ul class="thumbnails">
    <li class="span3" style="width: 16%;">
        <div style="background-color: rgba(62, 62, 62, 0.639216); color: white; width: 128px; height: 40px;">
            <span class="font_h2 tourTitle" style="top: 10px;">
                TOUR
            </span>
        </div>
    </li>
    <li class="span3" style="width: 46%;">
        <div class="thumbnail titleSizeFont" style="padding-top: 11px;">
            <?php echo $fullNameTour['nombre']; ?>
        </div>
    </li>
    <li class="span3" style="">
        <div class="thumbnail rightTourMenu">
            <span class="font_h2" style="margin-right: 10px; position: relative; top: 5px;">
                TOURS
            </span>
            <span id="hdTour" class="font_h2 rightDaysMenus">| HD</span>
            <span id="fdTour" class="font_h2 rightDaysMenus">| FD</span>
            <span id="fdexTour" class="font_h2 rightDaysMenus" style="top: 5px; position: relative; padding-right: 10px;">| FD EX</span>
        </div>
    </li>
</ul>

<?php
    foreach($excursiones as $excursion) {
?>
    <ul class="thumbnails">
        <li class="span3" style="width: 608px;">
        <?php if(isset($excursion['imagenes']) && count($excursion['imagenes']) > 0) { ?>
            <div class="slider-bootstrap">
                <div class="slider-wrapper theme-default">
                    <div class="nivoSlider slider-nivo-excursion">
                    <?php
                        foreach($excursion['imagenes'] as $imagen) {
                            if(isset($imagen['ruta_imagen']))
                                echo '<img src="'.$imagen['ruta_imagen'].'" data-thumb="'.$imagen['ruta_imagen'].'" alt="" title="" />';
                        }
                    ?>
                    </div>
                </div>
            </div>
        <?php } else {
                echo '<img src="'.Yii::app()->theme->baseUrl.'/img/noimage.jpg" />';
            } ?>
        </li>
        <li class="span3" style="width: 309px;">
            <div class="backColorSubMenus">
                <span class="spanDiv titleSizeFont"><?php echo $excursion['nombre']; ?></span>
            </div>
            <div>
                <p style="padding-top: 11px;"><?php echo $excursion['descripcion']; ?></p>
            </div>
        </li>
    </ul>
<?php
    }
?>