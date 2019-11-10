<?php

session_start();

if(!isset($_GET["stage"]))
{
    header("Location: /index.php");
}

$stageNum = base64_decode($_GET["stage"]);

$file = 'stages/manifest.json';
$json = file_get_contents($file);
$json_data = json_decode($json);
$stages = $json_data->stages;

$fileToServe = "";
$theStage = null;
foreach($stages as $stage)
{
    if($stage->id == (int)$stageNum)
    {
        $fileToServe = $stage->file;
        $theStage = $stage;
        break;
    }
}

if($fileToServe == "")
{
    header("Location: /index.php");
}

?>

<html>

    <head>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.6/ace.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.6/mode-python.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.6/theme-monokai.js"></script>

        <script src="http://www.skulpt.org/js/skulpt.min.js" type="text/javascript"></script>
        <script src="http://www.skulpt.org/js/skulpt-stdlib.js" type="text/javascript"></script>

        <?php include("../important_html_includes.php"); ?>

        <title><?php echo $theStage->name; ?> - rufftastic</title>

    </head>

    <body>
        
    <div class="header">

        <a href="/" class="jen" style="font-size:32px;">Home</a>
        <h1 class="jen itemcenter" style="width:50%;"><?php echo $theStage->name; ?></h1>

    </div>

        <?php include("stages/".$fileToServe); ?>

        <script type="text/javascript"> 

            let index = 0;
            let syntaxMessage = "Oops! That’s ruff. Looks like you have found an error! When you are using a print statement, you must have to use quotation marks around the text. This type of error is called a SyntaxError. Don’t be scared by the name, think of this error as something like forgetting to add a period at the end of a sentence.";

            setTimeout(function(){ 
                document.getElementById("chat-message").innerHTML = chatMessages[0];
            },500);

            document.getElementById("next-button").onclick = function(e)
            {
                if(index+1 == chatMessages.length)
                {
                    document.getElementById("chat-message").innerHTML = "";
                    window.location.href='stage.php?stage=<?php echo base64_encode($stageNum+1); ?>';
                    return;
                }
                document.getElementById("chat-message").innerHTML = chatMessages[++index];

                if (typeof nextCallback === 'function') { nextCallback(index); }
            }

            document.getElementById("back-button").onclick = function(e)
            {
                if(index-1 < 0)
                {
                    window.location.href='stage.php?stage=<?php echo base64_encode($stageNum-1); ?>';
                    return;
                }
                document.getElementById("chat-message").innerHTML = chatMessages[--index];

                if (typeof prevCallback === 'function') { prevCallback(index); }
            }

            function errHandle(e)
            {
                document.getElementById("chat-message").innerHTML = syntaxMessage;
            }


            // output functions are configurable.  This one just appends some text
            // to a pre element.
            function outf(text) { 
                var mypre = document.getElementById("output"); 
                mypre.innerHTML = mypre.innerHTML + text; 
            } 
            function builtinRead(x) {
                if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined)
                        throw "File not found: '" + x + "'";
                return Sk.builtinFiles["files"][x];
            }

            function runit() { 
                var prog = editor.getValue();
                var mypre = document.getElementById("output"); 
                mypre.innerHTML = ''; 
                Sk.pre = "output";
                Sk.configure({output:outf, read:builtinRead});
                var myPromise = Sk.misceval.asyncToPromise(function() {
                    return Sk.importMainWithBody("<stdin>", false, prog, true);
                });
                myPromise.then(function(mod) {
                    console.log('success');
                    if(typeof sucHandle === 'function') { sucHandle(mypre.innerHTML); }
                },
                    function(err) {
                    mypre.innerHTML = err.toString();
                    errHandle(err);
                });
            } 
        </script>


    </body>

</html>