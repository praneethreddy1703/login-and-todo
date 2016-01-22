var EmailId = document.getElementById("EmailId");
var Security  = document.getElementById("Security");
var Retype = document.getElementById("Retype");
var emailids = document.getElementById("emailids");
var security = document.getElementById("security");
function val()
{
	var EmailId = document.getElementById("EmailId").value;
	var Security  = document.getElementById("Security").value;
	var Retype = document.getElementById("Retype").value;
	var Usernames=document.getElementById("Usernames").value
	if(EmailId == "" || Security == "" || Retype =="" || Usernames=="")
	{
		alert("Fill every fields on this page ");
		return false;
	}
	else if(EmailId.indexOf('@') == -1 || EmailId.indexOf('.') == -1)
	{
		alert("Enter valid Email Id");
		return false;
	}
	else if(Security.length <= 4)
	{
		alert("Password strenth is too WEAK please enter again");
		return false;
	}
	
	else if(Security.localeCompare(Retype) != 0)
	{
		alert("Retype password correctly");
		return false;
	}
	else
		document.forms["signup"].submit;
	
}
 function val1()
 {
 	var emailids = document.getElementById("emailids").value;
 	var security = document.getElementById("security").value;
 	if(emailids == "" || security == "")
 	{
 		alert("Fill every fields on this page ");
		return false;
 	}
 	else if(emailids.indexOf('@') == -1 || emailids.indexOf('.') == -1)
	{
		alert("Enter valid Email Id");
		return false;
	}
	else
		document.forms["login"].submit;

 }


 function checkMail()
{
	if(EmailId.value.indexOf('@') == -1 || EmailId.value.indexOf('.') == -1)
	{
		document.getElementById("p1").innerHTML="Invalid EmailId";	
	}
	else
	{
		document.getElementById("p1").innerHTML="All set";
	}	 
}
function checkPass(){
	if((Security.value.length <= 4))
	{
		document.getElementById("p2").innerHTML="Password is too short";

	}
	else
	{
		document.getElementById("p2").innerHTML="All set";
	}
}
function checkRetype(){
	if(Security.value != Retype.value)
	{
		document.getElementById("p3").innerHTML="Retype Password correctly";
	}
	else
	{
		document.getElementById("p3").innerHTML="All set";
	}
}

function loginMail(){
	if(emailids.value.indexOf('@') == -1 || emailids.value.indexOf('.') == -1)
	{
		document.getElementById("p1").innerHTML="Invalid Email Id";	
	}
	else
	{
		document.getElementById("p1").innerHTML="All set";
	}	 

}
function loginPass(){
	if((security.value.length <= 4))
	{
		document.getElementById("p2").innerHTML="Password is too short";

	}
	else
	{
		document.getElementById("p2").innerHTML="All set";
	}

}