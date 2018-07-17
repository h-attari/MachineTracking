             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
function fetch_select(val)
{
    $.ajax({
    type: 'post',
    url: 'fetch_device.php',
    data: {
     get_option:val
    },
    success: function (response) {
     document.getElementById("drop-description").innerHTML=response;
    }
    });
}
function Device()
{
	val = document.getElementById('drop-name').value;
	if(val=="Other")
	{
		document.getElementById('hide-drop-name').disabled=false;
		document.getElementById('alert-server-new-device').value="1";
	}
	else
	{
		document.getElementById('hide-drop-name').disabled=true;
		document.getElementById('alert-server-new-device').value="0";
	}
}
function Company()
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
		document.getElementById('alert-server-new').value="0";
	}
}
function Supplier()
{
	val = document.getElementById('drop-supplier').value;
	if(val=="Other")
	{
		document.getElementById('other-supplier').disabled=false;
		document.getElementById('alert-server-new-supplier').value="1";
	}
	else
	{
		document.getElementById('other-supplier').disabled=true;
		document.getElementById('alert-server-new-supplier').value="0";	
		
	}
}
function Description()
{
	val = document.getElementById('drop-description').value;
	if(val=="Other")
	{
		document.getElementById('other-description').disabled=false;
		document.getElementById('alert-server-new-description').value="1";
	}
	else
	{
		document.getElementById('other-description').disabled=true;
		document.getElementById('alert-server-new-description').value="0";	
		
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
		document.getElementById('alert-server-new-device').value="0";	
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
function Other(val)
{
	var o=/\bother\b/i;
	if(o.test(document.getElementById(val).value))
	{
		document.getElementById('error').innerHTML="Invalid Input";
		document.getElementById(val).value="";
		return false;
	}
	else
	{
		document.getElementById('error').innerHTML=null;
		return true;
	}
}