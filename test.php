<?php
	$stat=array("1"=>0,"2"=>1);
	$a=json_encode($stat);
	$b=json_decode($a);
	$b->{"1"}++;
	echo $b->{"1"};
?>