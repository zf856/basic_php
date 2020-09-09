<?php
session_start();
    $config=mysqli_connect("localhost","root","","php_test");
    if(isset($_POST['btn'])){
        $data=$_POST['frm'];
        //var_dump($data);
        $sql="SELECT * FROM users_tbl WHERE username='$data[username]'" ;
        $row=mysqli_query($config,$sql);
        $res=mysqli_fetch_array($row);
       //var_dump($res);
        if($res['password']==sha1($data['password'])){

            $_SESSION['name']=$res['name'];
            header("location:welcome.php");
        }
        else{
            header("location:login.php?login=error");
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="post">
        <input type="text" name="frm[username]" placeholder="Username ?" />
        <br />
        <input type="password" name="frm[password]" placeholder="Password ?" />
        <br />
        <input type="submit" name="btn" value="Login !"/>
    </form>
    <?php if(isset($_GET['login'])){
        if($_GETp['login']=="error"){
            echo "<p class='alert'>ERROR 1</p>";
        }
        else if($_GET['login']=="error1"){
            echo "<p class='alert'>222222</p>";
        }
        else if($_GET['login']=="logout"){
            echo "<p class='alert'>Logout OK</p>";
        }
    } ?>
</body>
</html>