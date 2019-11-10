<?php

session_start();

$file = 'stages/manifest.json';
$json = file_get_contents($file);
$json_data = json_decode($json);
$stages = $json_data->stages;

?>

<html>

    <head>
        <title>rufftastic coding</title>
        <?php include("../important_html_includes.php"); ?>


    </head>

    <body>
        
        <div class="header">

            <a href="/" class="jen" style="font-size:32px;">Home</a>
            <h1 class="jen itemcenter">Choose Stage...</h1>

        </div>

        <div class="stages">

            <?php

                foreach($stages as $stage)
                {
                    ?>

                        <div class="stage" onclick="window.location.href='stage.php?stage='+btoa(<?php echo $stage->id; ?>);" onmouseover="document.getElementById('stage-description').innerHTML = '<?php echo $stage->desc; ?>';" onmouseout="document.getElementById('stage-description').innerHTML = 'Hover over an item to learn more and select where you would like to start my story!';">

                            <div class="stage-name"><?php echo $stage->name; ?></div>

                        </div>

                    <?php
                }
            ?>

        </div>
        
        <div class="bottom-right" id="dog-stage-select" style="position:fixed!important;">
            <img src="/assets/backgrounds/PencilSpeech.png" class="speech-bubble" id="stage-dog-bubble" style="position:relative;top:0;max-width:75%;right:-25%;margin-bottom:25px;">
            <h2 id="stage-description" class="jen" style="position: absolute;top: 3%;max-width:65%;left: 32%;">Hover over an item to learn more and select where you would like to start my story!</h2>
            <img src="/assets/dog/GoodBoiSitBlink.gif" style="position:relative;bottom:0;max-width:100%;">
        </div>

    </body>

</html>