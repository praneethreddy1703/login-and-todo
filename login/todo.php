<?php
if(!empty($_SESSION['id'])) //!= "")
{
	header('location:todo.php');
}
	include "input1.html";
	include "database1.php";
	session_start();
	mysqli_select_db($connectionStatus,'list');
	$createTb1="CREATE TABLE nottodo(
				id int NOT NULL AUTO_INCREMENT,
				emailid varchar(50),
				Enterdates varchar(50),
				Enterevents TEXT,
				PRIMARY KEY (id),
				FOREIGN KEY (emailid) REFERENCES log(emailid)
				)";
	mysqli_query($connectionStatus,$createTb1);
if(isset($_POST['save']))
{
	if(!empty($_POST['dates']) && !empty($_POST['events']) )
	{ 
		$insert= "INSERT INTO nottodo(emailid,Enterdates,Enterevents) VALUES (:emailid,:dates,:events)";
		$query1=$db->prepare($insert);
		$query1->execute(array(
				':emailid' =>$_SESSION['emailid'],
				':dates' => $_POST['dates'],
				':events' => $_POST['events']
			));
	}
	else echo "<center>please enter date and events</center>";
}

if(isset($_POST['display']))
{
	header('location:display1.php');
}
if(isset($_POST['changes'])){
	$_SESSION['id'] = "";
    session_destroy();
	header('location:change.php');

}


if(isset($_POST['logout']))
{
	$_SESSION['id'] = "";
    session_destroy();
    		
    header('location:login.php');
}
?>