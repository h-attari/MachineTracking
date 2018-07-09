
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
 $(document).ready(function () {
     $('#sidebarCollapse').on('click', function () {
         $('#sidebar').toggleClass('active');
         $(this).toggleClass('active');
     });
 });
