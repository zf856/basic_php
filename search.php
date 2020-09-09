<?php
if(isset($_POST['btn'])){
    $str=$_POST['str'];
    //echo $str;
    $a=mysqli_connect('localhost','root','','php_test');
    //عینا
    //$sql="SELECT * FROM user_tbl WHERE name LIKE 'str'";
    //باهرچیزی شروع بشه اما بااون که کاربر می نویسه تموم بشه
   // $sql="SELECT * FROM user_tbl WHERE name LIKE '%str'";
    //شاملش باشه
    $sql="SELECT * FROM user_tbl WHERE name LIKE '%str'";
    $row=mysqli_query($a,$sql);
    var_dump($row);
}



?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form  method="post">

    <input type="text" name="str">
    <input type="submit" name="btn">
</form>

<?php
while($res=mysqli_fetch_array($row)){
    echo "<li>".$res['name']."</li>";
}
?>
</ul>
</body>
</html>