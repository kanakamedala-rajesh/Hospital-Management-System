<?php

$username = "root";
$password = "technology";
$host = "localhost";
$database = "clinicosight";

@mysql_connect($host, $username, $password) or die("Can not connect to database: ".mysql_error());

@mysql_select_db($database) or die("Can not select the database: ".mysql_error());

$id = 32;

if(!isset($id) || empty($id)){
die("Please select your image!");
}else{

$query = mysql_query("SELECT * FROM doctor WHERE docid='".$id."'");
$row = mysql_fetch_array($query);
$content = $row['image'];

header('Content-type: image/jpg');
echo $content;

}

?>