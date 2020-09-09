<?php
    if(isset($_POST['btn'])){
        $data=$_POST['frm'];
        $txt=$data['str'];
        //var_dump($data);
        //echo $str;
        $a=mysqli_connect("localhost","root","","php_test");
        $sql="SELECT * FROM users_tbl WHERE $data[field] LIKE '%$txt%'";
        //echo $sql;die;
        $row=mysqli_query($a,$sql);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <input type="text" name="frm[str]" />
            <select name="frm[field]">
                <option value="name">name</option>
                <option value="lastname">lastname</option>
                <option value="age">age</option>
                <option value="field">field</option>
            </select>
        <input type="submit" name="btn" />
    </form>
    <?php  if(isset($_POST['btn'])){ ?>
    <table class="maintbl">
        <tr>
            <th>Name</th>
            <th>Lastname</th>
            <th>Age</th>
            <th>Field</th>
            <th>Comment</th>
            <th>Picture</th>
            <th>Delete</th>
            <th>edit</th>
        </tr>

        <?php
        while($res=mysqli_fetch_array($row)){
            ?>
            <tr>
                <td><?php echo $res['name']; ?></td>
                <td><?php echo $res['lastname']; ?></td>
                <td><?php echo $res['age']; ?></td>
                <td><?php echo $res['field']; ?></td>
                <td><?php echo $res['comment']; ?></td>
                <td><img src="<?php echo $res['picture']; ?>" height="30" /></td>
                <td>
                    <a href="delete.php?id=<?php echo $res['user_id']; ?>">
                        <img src="delete.png" width="20" />
                    </a>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $res['user_id']; ?>">
                        <img src="edit.png" width="20" />
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>


    </table>
    <?php } ?>
</body>
</html>