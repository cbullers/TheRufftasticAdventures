<?php

include_once("config.php");



# File with helpers to interact with database

# define db connection
function getDbConnection()
{
	$mysqli = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PW,MYSQL_DATABASE);

	# yoink
	if($mysqli->connect_errno)
	{

		echo "Bad Databse Connection: Unknown";
		exit;

	}

	return $mysqli;
}

function runDatabaseChecks()
{

	$mysqli = getDbConnection();

	$tables = [
		"users (id int NOT NULL AUTO_INCREMENT, cookie_value varchar(255), progress varchar(255), doggoname1 varchar(255), doggoname2 varchar(255), PRIMARY KEY (id))"
	];

	foreach($tables as $table)
	{
		$sql = "CREATE TABLE IF NOT EXISTS ".$table.";";
		$mysqli->query($sql);
	}

	$mysqli->close();

}

#run database checks
runDatabaseChecks();

function generateCookieId()
{

	$mysqli = getDbConnection();

	$test = rand(0,10000000);
	$cookieValue = md5($test);

	$sql = "SELECT * FROM users WHERE cookie_value='{$cookieValue}';";
	$res = $mysqli->query($sql);

	if($res->num_rows == 0)
	{
		$sql = "INSERT INTO users (cookie_value) VALUES ('{$cookieValue}');";
		$mysqli->query($sql);
		return $cookieValue;
	}
	else
	{
		return generateCookieId();
	}

	$mysqli->close();

}

function getUser($cookie)
{
	$mysqli = getDbConnection();

	$sql = "SELECT * FROM users WHERE cookie_value='".$cookie."';";
	$res = $mysqli->query($sql);

	if($res->num_rows == 0)
	{
		return "";
	}
	else
	{
		$res = $res->fetch_row();
		return $res[0];
	}

	$mysqli->close();
}

function addNewUser()
{

	return generateCookieId();

}