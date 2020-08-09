<?php
//Connect to Database
$db_host='192.168.64.2';
$db_name='store';
$db_user='Elva';
$db_pass='paopao1999';

//create mysql object
$mysqli=mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die($mysqli);


//Error Handler
if (mysqli_connect_error())
{
	echo 'This connection failed'.mysqli1_connect_error();
	die();
}
?>