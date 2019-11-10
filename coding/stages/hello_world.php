<div id="editor" class="editor" style="top:100px;width:50%;height:50%;"># Print function will display whatever is
# after it into the window below!
print("Good Boy")</div>

<div id="output" class="output" style="position:absolute;top: calc(50% + 100px);width:49.5%;height:25%;margin-top:5px;">

</div>
<div class="story-button" style="width:5%;position:absolute;left:0;top:calc(75% + 115px);">Clear!</div>
<div class="story-button" style="width:4%;position:absolute;left:46%;top:calc(75% + 115px);" onclick="runit();">Run!</div>


<div class="bottom-right" id="dog-stage-select" style="position:fixed!important;">
    <img src="/assets/backgrounds/PencilSpeech.png" class="speech-bubble" id="stage-dog-bubble" style="position:relative;top:0;max-width:75%;right:-25%;margin-bottom:25px;">
    <h2 id="chat-message" class="jen" style="font-size:122%; position: absolute;top: 3%;max-width:65%;left: 32%;max-height:14%;overflow-y:auto;">Welcome to Python River. Here you will be learning simple computer coding through the Python language. Are you ready fur some coding?</h2>
    <div class="story-button" id="back-button" style="max-width:25%;position:absolute;right:30%;top:20%;">Back!</div>
    <div class="story-button" id="next-button" style="max-width:25%;position:absolute;right:0;top:20%;">Next!</div>
    <img src="/assets/dog/GoodBoiSitBlink.gif" style="position:relative;bottom:0;max-width:100%;">
</div>

<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/python");
    editor.setOptions({
    fontSize: "24pt"
    });

    let newName = "Rover";

    let chatMessages = [
        "The Print() Function is used to create text, numbers, or any printable information",
        "First we will show you how to do a simple print statement that will show after you run your work. Hit the Run button to see how the print function is displayed!",
        "What would you like to name your doggo? Use the print() function to create his name",
        "RUFFTASTIC JOB! I like my name, "+newName+", Hit Next to continue onto the next section."
    ];

    function sucHandle(ret)
    {
        if(index == 2)
        {
            // name print
            newName = ret;
            chatMessages[3] = "RUFFTASTIC JOB! I like my name, "+newName+", Hit Next to continue onto the next section.";
            
            // set db
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/update.php?verb=update&item=doggoname1&value="+newName, true);
            xhr.send();

            // next
            document.getElementById("next-button").onclick();
        }
    }

</script>