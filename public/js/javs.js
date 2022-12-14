function changeSelect()
{
	if(document.getElementById('status').value == '0')
    {
		document.getElementById('manut').style.display='block';
		document.getElementById('manut').getAttribute("required");
	}
	else document.getElementById('manut').style.display='none';
}