<?php
try{
	$db = new PDO ('mysql:host=localhost;dbname=list','praneeth','praneeth');
}
catch(PDOException $e)
{
	echo "Could not connect";
}
$connectionStatus = mysqli_connect("localhost","praneeth","praneeth");


?>