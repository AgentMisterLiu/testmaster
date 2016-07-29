<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	session_start();
	require "conn.php";
	$i=1;
	$flag=false;
	$sql1="INSERT INTO t1 (IP,UID";
	$sql="VALUES('".$_SERVER["REMOTE_ADDR"]."'";
	if(isset($_SESSION['UID']))
	{
		$sql=$sql.','.(string)$_SESSION['UID'];
	}
	else $sql=$sql.',0';
//	echo $sql;
	while(true)
	{
		$name="q".(string)$i;
		if(isset($_POST[$name]))
		{
			$sql2="select q".(string)$i." from t1 where IP='0'";
			$result=$conn->query($sql2);
			$row=mysqli_fetch_array($result);
			if(!is_null(json_decode($row['q'.(string)$i]))) 
			{
				$stat=json_decode($row['q'.(string)$i]);
				$flag2=true;
			}
			else $flag2=false;
			
			if($i==1) $flag=true;
			$sql1=$sql1.",q".(string)$i;
			if(is_array($_POST[$name]))
			{
				$json=json_encode($_POST[$name]);
				$sql=$sql.",'".$json."'";
				for($j=0;$j<count($_POST[$name]);$j++)
				{
					$num=(string)$_POST[$name][$j];
					$stat->{$num}++;
				}
			}
			else 
			{
				if($flag2)
				{
					
					$num=$_POST[$name];
					$stat->{$num}++;
					
				}
				$sql=$sql.",'".$_POST[$name]."'";
			}
			
			$resu=json_encode($stat);
			$sql2="update t1 set q".(string)$i."='".$resu."' where IP='0'";
//			echo $sql2;
			$conn->query($sql2);
			$i++;
		}
		else	break;
	}
	$sql=$sql1.")".$sql.")";
	echo $sql;
	if($flag) $conn->query($sql);
	echo "回答成功";
?>
</body>
</html>