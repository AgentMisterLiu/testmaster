<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
	require 'conn.php';
    $result=$conn->query("SELECT * FROM users WHERE username='{$username}' and password='{$password}'");
    if($row=mysqli_fetch_array($result))
    {
        $_SESSION['UID']=$row['UID'];
        $_SESSION['username']=$row['username'];
        echo '登录成功'.$_SESSION['UID'].$_SESSION['username'];
    }
    else
    {
        echo '用户名或密码错误';
    }
?>

</body>
</html>