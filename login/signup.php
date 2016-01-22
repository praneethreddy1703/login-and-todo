<?php
	require "signup.html";
	session_start();
	require "database1.php";
	$select1= "SELECT * FROM log";
	$data =$db->prepare($select1);
	$data->execute();
	while($record1=$data->fetch(PDO::FETCH_ASSOC))
	{
		$name[]=$record1['emailid'];
	}
		
		
	$a=1;

	if(!empty($_POST['email1']) && !empty($_POST['password1']) && !empty($_POST['retype']) && !empty($_POST['usernames']))
	{
		$emailid=$_POST['email1'];
		for($i=0;$i<count($name);$i += 1)
		{
			//echo $name[$i];
			if($emailid == $name[$i])
			{
				$a=0;
			}		
		}
		//echo $a;
		
		$match = preg_match( '/^[A-z0-9_.\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $_POST['email1']);
		$a1=md5($_POST['password1']);	
		$a2=md5($_POST['retype']);
		$_POST['password1'] = $a1;
		$_POST['retype'] = $a2;
		if($match)
		{		
			if($_POST['password1'] == $_POST['retype'])
			{
				if($a)
				{
					
					if(isset($_POST['signup1']))
					{
						$insert="INSERT INTO log(username,emailid,password,retype) VALUES ('$_POST[usernames]','$_POST[email1]','$_POST[password1]','$_POST[retype]')";
						$data1=$db->prepare($insert);
						$data1->execute();
								
						echo "<center>Successfully Registered</center>";
						
					}
					
				}
				else echo "<center>This Email Id already exists</center>";
			}
			else echo "<center>Retype password correctly</center>";
		}
		else echo "<center>Enter valid Email Id</center>";
	}
	else echo "<center>Fill all the fields</center>";
	//unset($_POST['signup1'])
	if(isset($_POST['return']))
		header('location:login.php');

?>
