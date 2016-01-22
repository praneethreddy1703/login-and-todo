//var date = document.getElementById("date");
//var list  = document.getElementById("list");

function val()
{
	var date = document.getElementById("date").value;
	var list  = document.getElementById("list").value;
	if(date =="" || list =="")
	{
		alert("Enter Date and Event");
		return false;
	}
	else return true;
}
