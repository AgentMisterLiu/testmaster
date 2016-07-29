<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
    $name=$_POST['username'];
    $password=$_POST['password'];
	require 'conn.php';
    $sql="select * from users where username='{$name}'";
    $result=$conn->query($sql);
    if($row=mysqli_fetch_array($result))
    {
        echo "用户名已被注册";
    }
    else
    {

        $sql2="insert into users(username,password,reg)VALUES('{$name}','{$password}',NOW())";
        $conn->query($sql2);
		$row2=mysqli_affected_rows($conn);
        if($row2>0)
        {
            echo "注册成功";
        }else{
            echo "注册失败";
        }

    }

?>
</body>
</html>