             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
function Device()
{
	val = document.getElementById('device-drop').value;
	if(val=="Other")
	{
		document.getElementById('other-device').disabled=false;
	}
	else
	{
		document.getElementById('other-device').disabled=true;
		
	}
}
