<body style="background-image: url(http://inkensoul.com/wp-content/uploads/2014/12/pen-on-paper.jpg);background-size: cover;
 background-position: center center;"></body>
<form action="update.php" method="post"><center>
<input type="submit" name="return" value="Return">
</form></center>	
<?php
	session_start();
	require "database1.php";
	$select1 = "SELECT * FROM nottodo WHERE emailid='$_SESSION[emailid]' ORDER BY Enterdates ASC";
	$query3= $db->prepare($select1);
	$query3->execute();
	if(isset($_POST['update']))
	{
		$updates = "UPDATE nottodo SET Enterevents='$_POST[events]' WHERE Enterdates='$_POST[hidden]'";
		$query4 =$db->prepare($updates); 
		$query4->execute();
		header('location:display1.php');
	}



	echo "<center>";
	echo "<table border=1 style=margin-top:50px>
			<tr>
			<th>Dates</th> <th>Events</th> <th></th>
		    <th>Delete</th>
			</tr>";
	while($record = $query3->fetch(PDO::FETCH_ASSOC))
	{
		echo "<form action=update.php method=post>";
		echo "<tr>";
		echo "<td>"."<input type=text name=dates value='$record[Enterdates]'"." < /td>";
		echo "<td>"."<input type=text name=events value='$record[Enterevents]'"." < /td>";
		echo "<td>"."<input type=hidden name=hidden value=".$record['Enterdates']." < /td>";
		echo "<td>"."<input type=submit name=update value=update"." < /td>";
		echo "</tr>";
		echo "</form>";
	}
		
	echo "</table>";
	echo "</center>";
	if(isset($_POST['return']))
	{
		header('location:display1.php');
	}
?>
		
		






