<script>
    $(document).ready(function(){
        $(".linkExc").click(function(){
            $("#contenido").load('home/showExcursion?id='+$(this).attr("id"));
        })
    })
</script>
<ul class="thumbnails" style="border-bottom: 1px solid #EDDDC6;">
    <li class="span3" style="width: 550px;">
        <div style="background-color: rgba(62, 62, 62, 0.639216); color: white; width: 243px; height: 40px;">
            <span class="font_h2 tourTitle">
                TOURS FULL DAY EXTRA
            </span>
        </div>
    </li>
    <li class="span3">
        <div class="thumbnail" style="width: 300px; text-align: right;" >
            <span class="font_h2">
                TOURS | HD | FD | FD EX
            </span>
        </div>
    </li>
</ul>
<ul class="thumbnails">
    <li class="span3" style="width: 450px;" >
        <?php
            foreach ($model as $llave => $dato) {
                if (isset($dato->idSeguidas))
                    echo '<div class="thumbnail" style="padding: 11px; border-bottom: 1px solid #EDDDC6;"><a class="linkExc" href="#" id="s'.$dato->idSeguidas.'">'.$dato->nombre.' / '.$dato->joinSigueA.'</a></div>';
                else
                    echo '<div class="thumbnail" style="padding: 11px; border-bottom: 1px solid #EDDDC6;"><a class="linkExc" href="#" id="e'.$dato->id.'">'.$dato->nombre.' / '.$dato->joinSigueA.'</a></div>';
            }
        ?>
    </li>
</ul>