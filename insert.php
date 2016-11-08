<?php
$data = json_decode(file_get_contents("php://input"));
$id = mysql_real_escape_string($data->id);
$first_name = mysql_real_escape_string($data->first_name);
$last_name = mysql_real_escape_string($data->last_name);
$address = mysql_real_escape_string($data->address);
$city = mysql_real_escape_string($data->city);

mysql_connect("localhost", "root", "");
mysql_select_db("student_registry");
mysql_query("INSERT INTO students (`first_name`, `last_name`, `address`, `city`) VALUES('".$id."', '".$first_name."', '".$last_name."', '".$address."', '".$city."')");
 ?>
