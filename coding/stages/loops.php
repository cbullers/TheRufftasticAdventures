<div class="container">

    <img src="/assets/backgrounds/NoBallsRiver.gif" class="background">

    <img src="/assets/dog/GoodBoiSitBlink.gif" class="bottom-left medium">

    <div class="bottom-left" style="left:8%;bottom:38%;transform:scale(.75);">
        <img src="/assets/backgrounds/PencilSpeech.png" class="speech-bubble" id="stage-dog-bubble" style="position:relative;top:0;max-width:75%;left:-50%;margin-bottom:80px;transform:scaleX(-1);">
        <h2 id="chat-message" class="jen" style="font-size:200%; position: absolute;top: 12%;max-width:60%;left: -45%;max-height:26%;overflow-y:auto;">Welcome to the Rufftastic Adventages!</h2>
        <div class="story-button" id="back-button" style="max-width:25%;position:absolute;left:-50%;top:-35%;">Back!</div>
        <div class="story-button" id="next-button" style="max-width:25%;position:absolute;left:-5%;top:-35%;">Next!</div>
    </div>


    <script>

        let doggoname1 = "";
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                doggoname1 = xhr.response;
                console.log(doggoname1);
            }
        }
        xhr.open("GET", "/update.php?verb=get&item=doggoname1&value=", true);
        xhr.send();

    </script>


    <div id="editor" class="editor" style="top:100px;right:50px;width:50%;height:50%;"># Loop allow us to
# run code more then one time.
# Lets see what this code does...

for i in range(999):
    print("To Eternal Love")
</div>
    <style>#output { background-color: rgba(180,180,180); font-size:24px; }</style>
    <div id="output" class="output" style="position:absolute;top: calc(50% + 100px);right:40px;width:49.5%;height:25%;margin-top:5px">

    </div>
    <div class="story-button" style="width:5%;position:absolute;right:47%;top:calc(75% + 115px);">Clear!</div>
    <div class="story-button" style="width:4%;position:absolute;right:2.5%;top:calc(75% + 115px);" onclick="runit();">Run!</div>
    </div>
<script>
    let chatMessages = [
        "Now that you have practiced with an Boolean, I can teach you the never ending loop to my heart.",
        "RUFFTASTIC JOB! Hit Next to continue onto the next section."
    ];

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/python");
    editor.setOptions({
    fontSize: "20pt"
    });

    function sucHandle(output)
    {

       if(output.includes("To Eternal Love"))
       {

            // hide everything and do stuff
            setTimeout(function(){
                $(".container").fadeOut("slow",function()
                {

                    document.body.innerHTML += '<img style="margin-top:50px;max-width:90%;height:auto;" src="/assets/backgrounds/CliffDoggos.gif" class="background">';

                });
            },3000);

       } 

    }
</script>