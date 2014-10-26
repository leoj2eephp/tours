<script>
    $(document).ready(function(){
        $(".linkExc").click(function(){
            $("#contenido").load('home/showExcursion?id='+$(this).attr("id"));
        })
    })
</script>
<ul class="thumbnails" style="border-bottom: 1px solid #EDDDC6;">
    <li class="span3" style="width: 65%;">
        <div style="background-color: rgba(62, 62, 62, 0.639216); color: white; width: 243px; height: 40px;">
            <span class="font_h2 tourTitle">
                TOURS FULL DAY
            </span>
        </div>
    </li>
    <li class="span3">
        <div class="thumbnail rightTourMenu">
            <span class="font_h2" style="margin-right: 10px; position: relative; top: 5px;">
                TOURS | HD | FD | FD EX
            </span>
        </div>
    </li>
</ul>
<ul class="thumbnails">
    <li class="span3" style="width: 56%;" >
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