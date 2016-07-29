<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
require "conn.php";
$time=time()*10000+rand(1000,9999);
echo $time;
$sql="insert into tests (time)values (".(string)$time.")";
$conn->query($sql);
$sql="select * from tests where time=".(string)$time;
$result=$conn->query($sql);
$row=mysqli_fetch_array($result);
$nnn=$row['TID'];

$sql="create table t".(string)$nnn."(AID int NOT NULL AUTO_INCREMENT,UID int,IP TINYTEXT";
$sql2="INSERT INTO t".(string)$nnn." VALUES(1,0,'0'";
$doc=new DOMDocument("1.0");  #声明文档类型  
$doc->formatOutput=true;               #设置可以输出操作  
  
#声明根节点，最好一个XML文件有个跟节点  
$root=$doc->createElement("test");    #创建节点对象实体   
$root=$doc->appendChild($root);      #把节点添加进来  
    
	
	$name=$doc->createElement("name");
	$name=$root->appendChild($name);
	$name->appendChild($doc->createTextNode($_POST["name"]));
	
	$number=$doc->createElement("number");
	$number=$root->appendChild($number);
	$number->appendChild($doc->createTextNode($_POST['number']));
	
	$description=$doc->createElement("description");
	$description=$root->appendChild($description);
	$description->appendChild($doc->createTextNode($_POST["brief"]));
	$i=1;
	while(true)
	{
		if(isset($_POST['q'.(string)$i]) and $i<1000)
		{
			$sql=$sql.",q".(string)$i." TINYTEXT";
			$question=$doc->createElement("question");
			$question=$root->appendChild($question);
			$type=$doc->createElement("type");
			$type=$question->appendChild($type);
			$type->appendChild($doc->createTextNode($_POST[(string)$i."type"]));
			
			$description2=$doc->createElement("description");
			$description2=$question->appendChild($description2);
			$description2->appendChild($doc->createTextNode($_POST['q'.(string)$i]));
			
//			echo (string)$i.":".$_POST[(string)$i.'type'];
			if($_POST[(string)$i.'type']=="choice" or $_POST[(string)$i.'type']=="mchoice")
			{
				$j=1;
				while(true)
				{
					$stat[$j]=0;
					if(isset($_POST[(string)$i."-".(string)$j]))
					{
						$choice=$doc->createElement("option");
						$choice=$question->appendChild($choice);
						$content=$doc->createElement("content");
						$content=$choice->appendChild($content);
						$content->appendChild($doc->createTextNode($_POST[(string)$i."-".(string)$j]));
						
						$score=$doc->createElement("score");
						$score=$choice->appendChild($score);
						$score->appendChild($doc->createTextNode($_POST[(string)$i."-".(string)$j."-s"]));
						
						$j++;
					}
					else	
					{
						$sql2=$sql2.",'".json_encode($stat)."'";
						break;
					}
				}
			}
			else
			{
				$sql2=$sql2.",'0'";
			}
			$i++;
		}
		else break;
	}
	$sql=$sql.",PRIMARY KEY (AID))";
	$sql2=$sql2.")";
	$conn->query($sql);
	$conn->query($sql2);
   $doc->save("tests/info".(string)$nnn.".xml"); #保存路径  
//   echo "问题发布成功".$sql.$sql2;  
?>  
</body>
</html>