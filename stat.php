<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	require "conn.php";
	$sql="select * from t1 where IP='0'";
	$result=$conn->query($sql);
	$row=mysqli_fetch_array($result);
	for($i=2;($i<count($row)/2);$i++)
	{
		$stat=json_decode($row[(string)$i],true);
		$tihao=$i-1;
		if(count($stat)>1)
		{
			echo "第".$tihao."题是选择题";
			echo "<br>";
			$total=0;
			for($j=1;$j<=count($stat)-1;$j++) $total=$total+$stat[(string)$j];
			echo "共被选".$total."次";
			echo "<br>";
			for($j=1;$j<=count($stat)-1;$j++)
			{
				echo $j."项被选".$stat[(string)$j]."次";
				$per=$stat[(string)$j]/$total;
				echo "占比".$per;
				echo "<br>";
			}
		}
		else 
		{
			echo "第".$tihao."题是简答题";
			echo "<br>";
		}
		echo '<br>';
	}
?>
</body>
</html>