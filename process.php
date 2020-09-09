<?php
$data=$_POST['frm'];
//var_dump($data);

$dir='uploader/';
$file='image';
mkdir($dir.$data['name']);
$picname=$_FILES[$file]['name'];
$array=explode(".",$picname);
$ext=end($array);
$new_name=rand().".".$ext;
$from=$_FILES[$file]['tmp_name'];
$to=$dir.$data['name']."/".$new_name;
move_uploaded_file($from,$to);

$conn=mysqli_connect('localhost','root','','php_test');
$sql="INSERT INTO users_tbl (name,lastname,age,field,comment,picture) VALUES ('$data[name]','$data[lastname]','$data[age]','$data[field]','$data[comment]','$to')";
mysqli_query($conn,$sql);

header("location:form.php?user=add");