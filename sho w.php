<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	if(!isset($_GET['id']))
	echo "<script language='javascript'>document.location = 'index.html'</script>";
?>
<script type="text/javascript">
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","tests/info<?php echo $_GET['id']; ?>.xml",false);
xmlhttp.send();
xmlDoc=xmlhttp.responseXML;

var x=xmlDoc.getElementsByTagName("name");
document.write("<p>测试名:");
document.write(x[0].childNodes[0].nodeValue);
document.write("</p>");

x=xmlDoc.getElementsByTagName("description");
document.write("<p>测试简介:");
document.write(x[0].childNodes[0].nodeValue);
document.write("</p>");



document.write("<form action='answer.php' method='post'>");
var x0=xmlDoc.getElementsByTagName("question");
for(i=0;i<x0.length;i++)
{
	document.write("<p>---------------------------------</p>")
	var x1=x0[i].getElementsByTagName("description");
	document.write("<p>"+x1[0].childNodes[0].nodeValue+"<p>");
	var x2=x0[i].getElementsByTagName("type");
	if(x2[0].childNodes[0].nodeValue=="choice")
	{
		var x3=x0[i].getElementsByTagName("option");
		for(j=0;j<x3.length;j++)
		{
			document.write("<input type='radio' name='q"+String(i+1)+"' value='"+String(j+1)+"'/>");
			var x4=x3[j].getElementsByTagName("content");
			document.write(x4[0].childNodes[0].nodeValue);
			document.write("<br />");
		}
	}
	else if(x2[0].childNodes[0].nodeValue=="mchoice")
	{
		var x3=x0[i].getElementsByTagName("option");
		for(j=0;j<x3.length;j++)
		{
			document.write("<input type='checkbox' name='q"+String(i+1)+"[]' value='"+String(j+1)+"'/>");
			var x4=x3[j].getElementsByTagName("content");
			document.write(x4[0].childNodes[0].nodeValue);
			document.write("<br />");
		}
	}
	else if(x2[0].childNodes[0].nodeValue=="text")
	{
		document.write("<input type='text' name='q"+String(i+1)+"'/>")
		document.write("<br />");
	}
}
document.write("<br />");
document.write("<input type='submit' value='提交' />")
document.write("</form>");

</script>
</body>
</html>