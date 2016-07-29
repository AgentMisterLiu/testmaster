<html > 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>创建测试/问卷</title> 
<script language="javascript"> 
	var ii=0;
	var c=new Array();
	c[0]=0;
</script>
 <!-- 配置文件 -->
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="ueditor/ueditor.all.js"></script>

</head> 
<script language="javascript"> 
function AddChoice(divid,id)
{
	c[id]=c[id]+1;
	
	var TemO=document.getElementById(divid); 
	var newp= document.createElement("div");
	newp.innerHTML="选项内容";
	TemO.appendChild(newp);
	
	newp= document.createElement("input");
	newp.type="text";
	newp.name=String(id)+"-"+String(c[id]);
	TemO.appendChild(newp);
	var newline= document.createElement("br"); 
	TemO.appendChild(newline); 
	
	
	newp= document.createElement("div");
	newp.innerHTML="此项分值";
	TemO.appendChild(newp);
	
	newp= document.createElement("input");
	newp.type="text";
	newp.name=String(id)+"-"+String(c[id])+"-s";
	TemO.appendChild(newp);
	
	newline= document.createElement("br"); 
	TemO.appendChild(newline); 
}

function AddElement(mytype){ 
ii=ii+1;
document.getElementById("num").value=String(ii);
c[ii]=0;
var mytype,TemO=document.getElementById("add"); 

var newp= document.createElement("p");
newp.innerHTML="---------------";
TemO.appendChild(newp);

newp= document.createElement("div");
newp.innerHTML="第"+String(ii)+"题";
TemO.appendChild(newp);

newp= document.createElement("div");
newp.innerHTML="题干：";
TemO.appendChild(newp);



/*var newInput = document.createElement("input"); 
//newInput.type=mytype;  
newInput.name=String(ii); 
TemO.appendChild(newInput); */


newInput = document.createElement("script");
newInput.id='container'+String(ii);
newInput.setAttribute("name","q"+String(ii));
TemO.appendChild(newInput);
UE.getEditor('container'+String(ii), {
    toolbars: [
        ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload','insertimage','attachment','charts','spechars']
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true});

if (mytype=="choice")
{
	newp= document.createElement("div");
	newp.innerHTML="选项(单项选择)：";
	TemO.appendChild(newp);
	
	newp= document.createElement("div");
	var id=ii;
	var divid="div"+String(ii);
	newp.id=divid;
	TemO.appendChild(newp);
	
	var input2 = document.createElement("input"); 
	input2.type="button";
	input2.setAttribute("onclick","AddChoice('"+divid+"',"+ii+")");
	input2.value="增加选项";
	TemO.appendChild(input2);
}

else if(mytype=="mchoice")
{	
	newp= document.createElement("div");
	newp.innerHTML="选项(多项选择)：";
	TemO.appendChild(newp);
	
	newp= document.createElement("div");
	var id=ii;
	var divid="div"+String(ii);
	newp.id=divid;
	TemO.appendChild(newp);
	
	var input2 = document.createElement("input"); 
	input2.type="button";
	input2.setAttribute("onclick","AddChoice('"+divid+"',"+ii+")");
	input2.value="增加选项";
	TemO.appendChild(input2);
}

var hidden=document.createElement("input");
hidden.type="hidden";
hidden.name=String(ii)+"type";
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
        测试名/问卷名：<input type="text" name="name" />
		<br />
		简介：<script id="container" name="brief" type="text/plain">
			这里写简介
        </script>
		<input name="number" type="hidden" id="num" value="0"/>
</div> 
 <input name="" type="button" value="增加简答题" onClick="AddElement('text')" /> 
 <input name="" type="button" value="增加单选题" onClick="AddElement('choice')" /> 
 <input name="" type="button" value="增加多选题" onClick="AddElement('mchoice')" /> 
 <br />
<input type="submit" value="提交" />
 </form>  



    <!-- 实例化编辑器 -->
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
