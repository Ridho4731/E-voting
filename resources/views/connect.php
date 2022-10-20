<?php
$host="localhost";
$user_name="root";
$pwd='';
$database_name="praxeye1";
$db=mysql_connect($host, $user_name, $pwd);
error_reporting(0);
if (mysql_error() > "") print mysql_error() . "<br>";
mysql_select_db($database_name, $db);
$query1 = mysql_query('SELECT * FROM readings_db where DevID = "'.$devID.'" AND SensorType ="'.$sentype.'" ORDER BY Time')
or die(mysql_error());
$data = array();

while ($row = mysql_fetch_array($query1)) {
// $ConvertedReading = $row['ConvertedReading'];
$dat[] = "[$ConvertedReading]";
}
mysql_close($con);
// Set the JSON header
header("Content-type: text/json");

// The x value is the current JavaScript time, which is the Unix time multiplied by 1000.
//date_default_timezone_set('Asia/Calcutta');
$x = time() * 1000;
// The y value is a random number
$y = $dat;
// Create a PHP array and echo it as JSON
$data = array($x, $y);
echo json_encode($data);
?>