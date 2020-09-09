<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','php_test');
$sql="SELECT * FROM users_tbl WHERE user_id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
//var_dump($row);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="process.php">
        <table class="main">
            <tr>
                <td class="lable">Name : </td>
                <td class="frmelement">
                    <input type="text" name="frm[name]" value="<?php echo $row['name']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="lable">Lastname : </td>
                <td class="frmelement">
                    <input type="text" name="frm[lastname]" value="<?php echo $row['lastname']; ?>"/>
                </td>
            </tr>
            <tr>
                <td class="lable">Age : </td>
                <td class="frmelement">
                    <input type="text" name="frm[age]" value="<?php $age1=1395-$row['age']; echo $age1; ?>"/>
                </td>
            </tr>
            <tr>
                <td class="lable">Field : </td>
                <td class="frmelement">
                    <select name="frm[field]">
                        <option value="group1" <?php if($row['field']=='group1'){echo "selected";} ?>>Group1</option>
                        <option value="group2" <?php if($row['field']=='group2'){echo "selected";} ?>>Group2</option>
                        <option value="group3" <?php if($row['field']=='group3'){echo "selected";} ?>>Group3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="lable">Picture : </td>
                <td class="frmelement">
                    <input type="file" name="image" />
                    <img src="<?php echo $row['picture']; ?>"  align="right" height="50"/>
                </td>
            </tr>
            <tr>
                <td class="lable">Comment : </td>
                <td class="frmelement">
                    <textarea name="frm[comment]"><?php echo $row['comment']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="frmbtn" colspan="2">
                    <input type="submit" name="btn" />
                </td>
            </tr>
        </table>
    </form>
    <?php if(isset($_GET['user'])){?>
        <div class="alert">
            User Added
        </div>
    <?php }?>
</body>
</html>