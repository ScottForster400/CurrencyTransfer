<?php
    require_once("includes\dbconfing-inc.php");
    $email =$_POST["email"]?? null;
    $password=$_POST["pword"]??null;
    $stmnt=$mysqli->prepare("SELECT * FROM user_accounts WHERE email ='$email'");
    $stmnt->execute();
    $results=$stmnt->get_result();
   if($results->num_rows>0){
        while($account = $results -> fetch_object()){
            {
                $hashed_password=$account->pword;
                if(password_verify($password,$hashed_password)){
                    if($account->admin_account==1){
                        header('Location:admin-home.php');
                    }
                    elseif($account->suspicious_account==1){
                        header('Location:evidence-funds.php?user='.$account->user_id);
                    }
                    else{
                        header('Location:account-home.php?user='.$account->user_id);
                    }
                }
                else{
                    $data='true';
                    header('Location:login.php?data ='.$data);
                }
            }
        }
    }
    else{
        $data='true';
        header('Location:login.php?data ='.$data);
    }
?>