
<?php
    session_start();
    if(isset($_SESSION['name'])){
        echo "Welcome ".$_SESSION['name'];
    }
    else{
        header("location:login.php?login=error1");
    }


?>
<a href="expire.php">
    logout
</a>
