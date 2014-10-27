<script>
    $(document).ready(function(){
        $(".linkExc").click(function(){
            $("#contenido").load('home/showExcursion?id='+$(this).attr("id"));
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
    })
</script>
<ul class="thumbnails" style="border-bottom: 1px solid #EDDDC6;">
    <li class="span3" style="width: 65%;">
        <div style="background-color: rgba(62, 62, 62, 0.639216); color: white; width: 243px; height: 40px;">
            <span class="font_h2 tourTitle">
                TOURS <?php
                    if($tipoExcursionModel['nombre'] == 'FULL DAY EXTRA') {
                        echo substr($tipoExcursionModel['nombre'], 0, 8);
                    } else {
                        echo $tipoExcursionModel['nombre'];
                    }
                ?>
                <img src="<?php echo Yii::app()->theme->baseUrl;?>/img/fondoTipoExcursion.png" style="margin-bottom: 4px;"/>
                <?php
                    if($tipoExcursionModel['nombre'] == 'FULL DAY') {
                        echo '<span style="font-size:18px; color: rgb(171, 171, 171); position: relative; right: 35px;">FD</span>';
                    } else if($tipoExcursionModel['nombre'] == 'HALF DAY') {
                        echo '<span style="font-size:18px; color: rgb(171, 171, 171); position: relative; right: 35px;">HD</span>';
                    } else if($tipoExcursionModel['nombre'] == 'FULL DAY EXTRA') {
                        echo '<span style="font-size:18px; color: rgb(171, 171, 171); position: relative; right: 35px;">FD</span>';
                        echo '<img src="'.Yii::app()->theme->baseUrl.'/img/fondoTipoExcursion.png" style="margin-bottom: 4px; margin-left: -25px;"/>';
                        echo '<span style="font-size:18px; color: rgb(171, 171, 171); position: relative; right: 30px;">EX</span>';
                    }
                ?>
            </span>
        </div>
    </li>
    <li class="span3">
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
<ul class="thumbnails">
    <li class="span3" style="width: 50%;" >
        <?php
            foreach ($tours as $dato) {
                $aux = null;
                $idLink = null;
                echo '<div class="thumbnail" style="padding: 11px; border-bottom: 1px solid #EDDDC6;">';
                $last = end($dato);
                foreach($dato as $t) {
                    if($t['primera'] == 1)
                        $idLink = $t['id'];
                    if($last == $t) {
                        $aux .= $t['nombre'];
                        echo '<a class="linkExc" href="#" id="'.$idLink.'">'.$aux.'</a>';
                    } else {
                        $aux .= $t['nombre']." / ";
                    }
                }
                echo '</div>';
                /*if (isset($dato->idSeguidas))
                    echo '<div class="thumbnail" style="padding: 11px; border-bottom: 1px solid #EDDDC6;"><a class="linkExc" href="#" id="s'.$dato->idSeguidas.'">'.$dato->nombre.' / '.$dato->joinSigueA.'</a></div>';
                else
                    echo '<div class="thumbnail" style="padding: 11px; border-bottom: 1px solid #EDDDC6;"><a class="linkExc" href="#" id="e'.$dato->id.'">'.$dato->nombre.' / '.$dato->joinSigueA.'</a></div>';*/
            }
        ?>
    </li>
</ul>