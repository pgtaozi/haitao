<?php
    //声明变量

    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $re_password = isset($_POST['re_password'])?$_POST['re_password']:"";
    

    if($password == $re_password) {
        //建立连接
        $conn = mysqli_connect('localhost','root','','jingcai');
        //准备SQL语句,查询用户名
        $sql_select="SELECT username FROM user WHERE username = '$username'";
        //执行SQL语句
        $ret = mysqli_query($conn,$sql_select);
        $row = mysqli_fetch_array($ret);
        //判断用户名是否已存在
        if($username == $row['username']) {
            //用户名已存在，显示提示信息
            header("Location:register.php?err=1");
        } else {

            //用户名不存在，插入数据
            //准备SQL语句
            $sql_insert = "INSERT INTO user(username,password) VALUES('$username','$password')";
            //执行SQL语句
            mysqli_query($conn,$sql_insert); 
            echo "<script>alert('注册成功')</script>";         
            header("Refresh:1;url=login.php?err=3");
        }

        //关闭数据库
        mysqli_close($conn);
    } else {
        header("Location:register.php?err=2");
    }

?>
