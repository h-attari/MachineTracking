 $(document).ready(function () {
     $('#sidebarCollapse').on('click', function () {
         $('#sidebar').toggleClass('active');
         $(this).toggleClass('active');
     });
 });
function Device()
{
	val = document.getElementById('drop-other').value;
	if(val=="Other")
	{
		document.getElementById('hide-drop-other').disabled=false;
		document.getElementById('alert-server-new').value="1";
	}
	else
	{
		document.getElementById('hide-drop-other').disabled=true;
		
	}
}
function Name()
{
	val = document.getElementById('drop-name').value;
	if(val=="Other")
	{
		document.getElementById('other-device').disabled=false;
		document.getElementById('alert-server-new-device').value="1";
	}
	else
	{
		document.getElementById('other-device').disabled=true;
		
	}
}
function Number(val)
{
	n=/^[0-9]+$/;
	if(n.test(document.getElementById(val).value)||document.getElementById(val).value=="")	
	{
		document.getElementById('error').innerHTML=null;
		return true;
	}
	else
	{
		document.getElementById('error').innerHTML="Invalid Input";
		document.getElementById(val).value="";
		return false;
	}
}
function Names(val)
{
	n=/^[a-zA-Z]+$/;
	if(n.test(document.getElementById(val).value)||document.getElementById(val).value=="")	
	{
		document.getElementById('error').innerHTML=null;
		return true;
	}
	else
	{
		document.getElementById('error').innerHTML="Invalid Input";
		document.getElementById(val).value="";
		return false;
	}
}
function Size(val)
{
	var n=/\d\s\wb$/i;
	if(n.test(document.getElementById(val).value)||document.getElementById(val).value=="")
	{
		document.getElementById('error').innerHTML=null;
		return true;
	}
	else
	{
		document.getElementById('error').innerHTML="Invalid Input";
		document.getElementById(val).value="";
		return false;
	}
}