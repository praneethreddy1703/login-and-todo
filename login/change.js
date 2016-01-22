var emailId = document.getElementById("emailid");
var password  = document.getElementById("passwords");
var newPass = document.getElementById("newpass");
var changePass = document.getElementById("changepass");

function val()
{
	var emailId = document.getElementById("emailid").value;
	var password  = document.getElementById("passwords").value;
	var newPass = document.getElementById("newpass").value;
	var changePass=document.getElementById("changepass").value
	if(emailId == "" || password == "" || newPass =="" || changePass=="")
	{
		alert("Fill every fields on this page ");
		return false;
	}
	else if(emailId.indexOf('@') == -1 || emailId.indexOf('.') == -1)
	{
		alert("Enter valid Email Id");
		return false;
	}
	else if(password.length <= 4)
	{
		alert("Password mismatch");
		return false;
	}
	else if(newPass.length <= 4)
	{
		alert("New Password strenth is too WEAK please enter again");
		return false;
	}
	
	else if(newPass.localeCompare(changePass) != 0)
	{
		alert("Retype password correctly");
		return false;
	}
	else
		document.forms["change"].submit;

}

function checkMail()
{
	if(emailId.value.indexOf('@') == -1 || emailId.value.indexOf('.') == -1)
	{
		document.getElementById("p1").innerHTML="Invalid EmailId";	
	}
	else
	{
		document.getElementById("p1").innerHTML="All set";
	}	 
}
function checkPass(){
	if((password.value.length <= 4))
	{
		document.getElementById("p2").innerHTML="Password is too short";

	}
	else
	{
		document.getElementById("p2").innerHTML="All set";
	}
}
function checkNew(){
	if((newPass.value.length <= 4))
	{
		document.getElementById("p3").innerHTML="Password is too short";

	}
	else
	{
		document.getElementById("p3").innerHTML="All set";
	}
}
function checkChange(){
	if(newPass.value != changePass.value)
	{
		document.getElementById("p4").innerHTML="Retype Password correctly";
	}
	else
	{
		document.getElementById("p4").innerHTML="All set";
	}
}
