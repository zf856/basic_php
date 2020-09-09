<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','php_test');

$sql1="SELECT * FROM users_tbl WHERE user_id='$id'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$folder="uploader/".$row['name'];
$file=$row['picture'];

unlink($file);
rmdir($folder);

$sql="DELETE FROM users_tbl WHERE user_id='$id'";
mysqli_query($conn,$sql);
header("location:users_list.php?delete=ok");
