<?php
	session_start();
	error_reporting(0);
	
	if(!empty($_SESSION['id'])) //!= "")
		{
			header('location:todo.php');
		}
	include "login.html";
	include "database1.php";
	mysqli_select_db($connectionStatus,'list');
	$createTb="CREATE TABLE log(
				id int NOT NULL AUTO_INCREMENT,
				username TEXT,
				emailid varchar(50) NOT NULL UNIQUE,
				password TEXT,
				retype TEXT,
				PRIMARY KEY (id)

				)";
	mysqli_query($connectionStatus,$createTb);
	if(isset($_POST['signup']))
	{	
		header('location:signup.php');

	}
		$username = $_POST['email'];
		$password = md5($_POST['password']);
		
		$select1 = "SELECT id,emailid,password FROM log WHERE emailid="."'$username'";
		$res=$db->prepare($select1);
		$res->execute();
		$rls=$res->fetch(PDO::FETCH_ASSOC);
		$_SESSION['id'] = $rls['id'];
		$_SESSION['emailid']=$rls['emailid'];
		if($username == $rls['emailid'] && $password == $rls['password'] )
		{
			if(isset($_POST['login']))
			{
				echo "login";
				header('location:todo.php');

			}
		}
		else echo "<center>Enter Registered Password and Email Id</center>";	
		
	

?>