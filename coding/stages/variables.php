<audio style="display:hidden;" loop autoplay>
  <source src="/assets/songs/RufftasticScene1Music.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

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
            }
        }
        xhr.open("GET", "/update.php?verb=get&item=doggoname1&item=", true);
        xhr.send();

    </script>


    <div id="editor" class="editor" style="top:100px;right:50px;width:50%;height:50%;"># Put the name of your dog!
doggoName = "_____"
print(doggoName + "&lt;br&gt;")

numOfDogs = 1

# Let's update our code to show
# our new friend!
# put the number 1 after the plus sign

numOfDogs = numOfDogs + 
print("New Number Of Dogs = "+ str(numOfDogs) )</div>

    <style>#output { background-color: rgba(180,180,180); font-size:24px; }</style>
    <div id="output" class="output" style="position:absolute;top: calc(50% + 100px);right:40px;width:49.5%;height:25%;margin-top:5px">

    </div>
    <div class="story-button" style="width:5%;position:absolute;right:47%;top:calc(75% + 115px);">Clear!</div>
    <div class="story-button" style="width:4%;position:absolute;right:2.5%;top:calc(75% + 115px);" onclick="runit();">Run!</div>
    </div>
<script>
    let chatMessages = [
        "In this next step we will be learning a couple of the different variables used. These will be explained in 2 simple types.",
        "Variables are objects in coding that are used to store things.",
        "The first type will be a String. A String is simply just words used as an object in the program.",
        "You can use the dogs’ name as a string by replacing the blanks in line 2.",
        "The next type will be an integer. You should recognize this type in math classes.",
        "This replaces words with numbers instead. Line 5 introduces an integer.",
        "It looks like another doggo has come over to play, and she's brought a ball! Keep in mind that variables can be changed. Read lines 7-9 and finish line 11 to change the integer.",
        "Now that we have 2 dogs, the integer variable has changed to match the correct number of dogs.",
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

       if(output.includes("New Number Of Dogs = 2"))
       {

            // hide everything and do stuff
            $(".container").fadeOut("slow",function()
            {

                document.body.innerHTML += '<img src="/assets/backgrounds/SadDoggoGf.gif" class="background">';
                setTimeout(function()
                {
                    $(".background").fadeOut("fast",function()
                    {
                        document.body.innerHTML += '<img src="/assets/backgrounds/BallRiverFlow.gif" class="background">';
                        setTimeout(function()
                        {
                            window.location.href = "stage.php?stage=Mg==";
                        },2000)
                    })
                },480);

            });

       } 

    }
</script>