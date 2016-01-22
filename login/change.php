<link rel="stylesheet" type="text/css" href="login.css">
<center>
<div class="e">
<form action="change.php" method="post" name="change" onsubmit="return val()">
	Enter Email ID:<input class="c" type="text" autocomplete="off" id="emailid" name="email" onkeyup="checkMail()">
	<span><p id="p1"></p></span>
	Previous Password:<input class="c" type="password" id="passwords" name="password" onkeyup="checkPass()" /><br>
	<span><p id="p2"></p></span>
	Enter New Password:<input class="c" type="password" id="newpass" name="new" onkeyup="checkNew()"/><br>
	<span><p id="p3"></p></span>
	Retype New Password:<input class="c" type="password" id="changepass" name="changed" onkeyup="checkChange()"/><br>
	<span><p id="p4"></p></span>
	<input class="b" type="submit" name="okdone" value="OK DONE"/>
</form>
<form action="change.php" method="post">
	<input class="b" type="submit" name="return" value="Return"/>
</form></div></center>
<script src="change.js"></script>
<?php
require "database1.php";
error_reporting(0);
$select1= "SELECT * FROM log WHERE emailid='$_POST[email]'";
/*$data1 =queryInit($connectionStatus,$select1);
$record1=mysqli_fetch_assoc($data1);*/

$data =$db->prepare($select1);
$data->execute();
$record1=$data->fetch(PDO::FETCH_ASSOC);
$pass=$record1['password'];
$password=md5($_POST['password']);
$new=md5($_POST['new']);
$changed=md5($_POST['changed']);
if($password == $pass)
{
	if($new == $changed)
	{	
		if(isset($_POST['okdone']))
		{
			
			$update="UPDATE log SET password='$new',retype='$new' WHERE emailid='$_POST[email]'";
			$query1=$db->prepare($update);
			$query1->execute();
			echo "<center>password is changed succesfully</center>";
		}
		
	}
	else echo "<center>Retype Password Correctly</center>";
}
else echo "<center>Previous Password not matched</center>";

if(isset($_POST['return']))
	header('location:login.php');

?>

