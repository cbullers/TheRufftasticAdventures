<?php

session_start();

include_once("config.php");
include_once("data.php");


#check for user
if(isset($_COOKIE["".COOKIE_NAME]))
{

	$u = getUser($_COOKIE["".COOKIE_NAME]);
	$_SESSION["user"] = $u;

}
else
{
	# User does not exist
	$cookie = addNewUser();

	# set the cookie indefinite value.
	setcookie(COOKIE_NAME, $cookie, time() + (10 * 365 * 24 * 60 * 60) );

	$u = getUser($_COOKIE[COOKIE_NAME]);
	$_SESSION["new"] = true;
	$_SESSION["user"] = $u;

	header("Location: index.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>rufftastic v<?php echo APP_VER; ?></title>

	<?php include("important_html_includes.php"); ?>
</head>
<body>

<audio style="display:hidden;" loop autoplay>
  <source src="assets/songs/RufftasticMenuMusic.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

	<div class="container">

		<img src="assets/backgrounds/NoBallsRiver.gif" class="background">
	<div class="bottom-left" style="left:8%;bottom:38%;transform:scale(.75);">
        <h2 id="stage-description" class="jen" style="font-size:200%; position: absolute;top: 12%;max-width:60%;left: -45%;max-height:26%;overflow-y:auto;">Welcome to the Rufftastic Adventures!</h2>
        <img src="/assets/backgrounds/PencilSpeech.png" class="speech-bubble" id="stage-dog-bubble" style="position:relative;top:0;max-width:75%;left:-50%;margin-bottom:80px;transform:scaleX(-1);">
    </div>
		<img src="assets/dog/GoodBoiSitBlink.gif" class="bottom-left medium">

		
		<div id="initial-chatbox" class="chatbox">
			<div id="line1"></div>
			<h1 class="jen">Welcome<?php if(!isset($_SESSION["new"])){echo " back"; unset($_SESSION["new"]);}?>!</h1>
			<br>
			<h2 class="jen">Choose which story to continue...</h2>
			<br>
			<a href="coding"><div class="story-button">Python Programming</div></a>
		</div>
	</div>

</body>
</html>