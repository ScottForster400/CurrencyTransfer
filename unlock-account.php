<?php
        include("includes/dbconfing-inc.php");
        $user =$_GET["user"]?? null;
        var_dump($user);
        $stmnt=$mysqli->prepare("UPDATE `user_accounts` SET `suspicious_account`='0',`approved_account`='1' WHERE user_id=$user");
        $stmnt->execute();
        header("Location:admin-home.php");
?>