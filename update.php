<?php
session_start();
include_once("config.php");
include_once("data.php");


if(!isset($_COOKIE[COOKIE_NAME]))
{
    header("Location: index.php");
}
else
{
    $mysqli = getDbConnection();

    $user = $_SESSION["user"];

    $verb = $_GET["verb"];
    $item = $_GET["item"];
    $value= $_GET["value"];

    if($verb == "update")
    {

        if($item == "doggoname1")
        {

            $sql = "UPDATE users SET doggoname1='{$value}' WHERE cookie_value='{$_COOKIE[COOKIE_NAME]}';";
            $mysqli->query($sql);

        }elseif($item == "doggoname2")
        {
            $sql = "UPDATE users SET doggoname2={$value} WHERE cookie_value={$user->cookie_value};";
            $mysqli->query($sql);
        }

    }
    elseif($verb == "get")
    {
        if($item == "doggoname1")
        {
            $sql = "SELECT doggoname1 FROM users WHERE cookie_value='{$_COOKIE[COOKIE_NAME]}';";
            $res = $mysqli->query($sql);
            $res = $res->fetch_row();
            echo $res[0];
        }
    }


    $mysqli->close();
}