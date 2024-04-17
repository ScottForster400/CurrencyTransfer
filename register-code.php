<?php
    require_once("includes\dbconfing-inc.php");
    //used https://www.php.net/manual/en/function.header.php to find how to use header function
    $firstName =$_POST["firstName"]?? null;
    $surname=$_POST["surname"]??null;
    $pword=$_POST["pword"]??null;
    $phone =$_POST["phone"]?? null;
    $email=$_POST["email"]??null;
    $dob =$_POST["dob"]?? null;

    $hashed_password = password_hash($pword, PASSWORD_DEFAULT);


    $stmnt=$mysqli->prepare("SELECT * FROM user_accounts WHERE email ='$email'");
    $stmnt->execute();
    $results=$stmnt->get_result();
    if($results->num_rows>0){
        $data=1;
        header("location:register.php?data=$data");
    }
    else{
        $stmnt=$mysqli->prepare("INSERT INTO `user_accounts` (`first_name`, `surname`, `pword`, `email`, `mobile_number`, `dob`) VALUES (?,?,?,?,?,?)");
        $stmnt->bind_param('ssssss',$firstName,$surname,$hashed_password,$email,$phone,$dob);
        $stmnt->execute();
        $stmnt=$mysqli->prepare("SELECT user_id FROM user_accounts WHERE email ='$email'");
        $stmnt->execute();
        $results=$stmnt->get_result();
        if($results->num_rows>0){
            while($account = $results -> fetch_object()){
                {
                    $user_id=$account->user_id;
                    }
                }
            }
        $stmnt=$mysqli->prepare("INSERT INTO currency_accounts(balance,user_id,exchange_id) VALUES(0,?,3);");
        $stmnt->bind_param('s',$user_id);
        $stmnt->execute();
        header('Location:login.php');
    }    
    
?>