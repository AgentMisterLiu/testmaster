<html > 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>��������/�ʾ�</title> 
<script language="javascript"> 
	var i=0;
	var c=new Array();
	c[0]=0;
</script>
 <!-- �����ļ� -->
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<!-- �༭��Դ���ļ� -->
<script type="text/javascript" src="ueditor/ueditor.all.js"></script>

</head> 
<script language="javascript"> 
function AddChoice(divid,id)
{
	c[id]=c[id]+1;
	
	var TemO=document.getElementById(divid); 
	var newp= document.createElement("div");
	newp.innerHTML="ѡ������";
	TemO.appendChild(newp);
	
	newp= document.createElement("input");
	newp.type="text";
	newp.name=String(id)+"-"+String(c[id]);
	TemO.appendChild(newp);
	var newline= document.createElement("br"); 
	TemO.appendChild(newline); 
	
	
	newp= document.createElement("div");
	newp.innerHTML="�����ֵ";
	TemO.appendChild(newp);
	
	newp= document.createElement("input");
	newp.type="text";
	newp.name=String(id)+"-"+String(c[id])+"-s";
	TemO.appendChild(newp);
	
	newline= document.createElement("br"); 
	TemO.appendChild(newline); 
}

function AddElement(mytype){ 
i=i+1;
document.getElementById("num").value=String(i);
c[i]=0;
var mytype,TemO=document.getElementById("add"); 

var newp= document.createElement("p");
newp.innerHTML="---------------";
TemO.appendChild(newp);

newp= document.createElement("div");
newp.innerHTML="��"+String(i)+"��";
TemO.appendChild(newp);

newp= document.createElement("div");
newp.innerHTML="��ɣ�";
TemO.appendChild(newp);



/*var newInput = document.createElement("input"); 
//newInput.type=mytype;  
newInput.name=String(i); 
TemO.appendChild(newInput); */


newInput = document.createElement("script");
newInput.id='container'+String(i);
newInput.setAttribute("name","q"+String(i));
TemO.appendChild(newInput);
UE.getEditor('container'+String(i), {
    toolbars: [
        ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload','insertimage','attachment','charts','spechars']
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true});

if (mytype=="choice")
{
	newp= document.createElement("div");
	newp.innerHTML="ѡ��(����ѡ��)��";
	TemO.appendChild(newp);
	
	newp= document.createElement("div");
	var id=i;
	var divid="div"+String(i);
	newp.id=divid;
	TemO.appendChild(newp);
	
	var input2 = document.createElement("input"); 
	input2.type="button";
	input2.setAttribute("onclick","AddChoice('"+divid+"',"+i+")");
	input2.value="����ѡ��";
	TemO.appendChild(input2);
}

else if(mytype=="mchoice")
{	
	newp= document.createElement("div");
	newp.innerHTML="ѡ��(����ѡ��)��";
	TemO.appendChild(newp);
	
	newp= document.createElement("div");
	var id=i;
	var divid="div"+String(i);
	newp.id=divid;
	TemO.appendChild(newp);
	
	var input2 = document.createElement("input"); 
	input2.type="button";
	input2.setAttribute("onclick","AddChoice('"+divid+"',"+i+")");
	input2.value="����ѡ��";
	TemO.appendChild(input2);
}

var hidden=document.createElement("input");
hidden.type="hidden";
hidden.name=String(i)+"type";
hidden.value=mytype;
TemO.appendChild(hidden);

var newline= document.createElement("br"); 
TemO.appendChild(newline); 

newline= document.createElement("br"); 
TemO.appendChild(newline); 

} 
</script> 
<body> 
 <form action="creatego.php" method="post" name="frm"> 
 <div id="add"> 
        ������/�ʾ�����<input type="text" name="name" />
		<br />
		��飺<script id="container" name="brief" type="text/plain">
			����д���
        </script>
		<input name="number" type="hidden" id="num" value="0"/>
</div> 
 <input name="" type="button" value="���Ӽ����" onClick="AddElement('text')" /> 
 <input name="" type="button" value="���ӵ�ѡ��" onClick="AddElement('choice')" /> 
 <input name="" type="button" value="���Ӷ�ѡ��" onClick="AddElement('mchoice')" /> 
 <br />
<input type="submit" value="�ύ" />
 </form>  



    <!-- ʵ�����༭�� -->
    <script type="text/javascript">
        var editor = UE.getEditor('container', {
    toolbars: [
        ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload','insertimage','attachment','charts','spechars']
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true});
    </script>
</body> 
</html>