<body style="background-image: url(http://inkensoul.com/wp-content/uploads/2014/12/pen-on-paper.jpg);background-size: cover;
 background-position: center center;"></body>
<form method="post" action="display1.php"><center>
<input type="submit" name="return" value="Return">
<input type="submit" name="update" value="Update">
<input type="submit" name="delete" value="Delete">
</center></form>
<?php
	session_start();
	require "database1.php";
	$select = "SELECT * FROM nottodo WHERE emailid='$_SESSION[emailid]' ORDER BY Enterdates ASC";
	$query2= $db->prepare($select);
	$query2->execute();
	echo "<center>";
	echo "<table border=1 style=margin-top:50px>
			<tr>
			<th>Dates</th> <th>Events</th> 
			</tr>";
		while($record = $query2->fetch(PDO::FETCH_ASSOC))
		{
			echo "<tr>";
			echo "<td>"."<input type=text name=dates value='$record[Enterdates]'"." < /td>";
			echo "<td>"."<input type=text name=events value='$record[Enterevents]'"." < /td>";
			echo "</tr>";
			echo "</form>";
			
		}
		
	echo "</table>";	
	echo "</center>";	
	if(isset($_POST['return'])){
		header('location:todo.php');
	}
	if(isset($_POST['update']))
		header('location:update.php');

	if(isset($_POST['delete']))
		header('location:delete.php');
	

	?>
<body style="background-color: gray"></body>
