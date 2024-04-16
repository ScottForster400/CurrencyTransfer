<?php
        include("includes/dbconfing-inc.php");
        $user =$_POST["user"]?? null;
        $firstName =$_POST["firstName"]?? null;
        $surname=$_POST["surname"]??null;
        $phone =$_POST["phone"]?? null;
        $email=$_POST["email"]??null;
        $dob =$_POST["dob"]?? null;

        $stmnt=$mysqli->prepare("SELECT * FROM user_accounts WHERE email ='$email'");
        $stmnt->execute();
        $results=$stmnt->get_result();
        if($results->num_rows>0){
                while($account = $results -> fetch_object()){
                        {
                            if($user==$account->user_id){
                                $stmnt=$mysqli->prepare("UPDATE user_accounts SET first_name = ?,surname= ?,email= ?,mobile_number = ?,dob= ? WHERE user_id=?");
                                $stmnt->bind_param('ssssss',$firstName,$surname,$email,$phone,$dob,$user);
                                $stmnt->execute();
                                $data="true";
                                header("Location:account-info.php?user=$user & data=$data");
                            }
                            else{
                                $data=1;
                                header("location:account-info.php?user=$user & data=$data");
                            }
                        }
                }
        }
        else{
                $stmnt=$mysqli->prepare("UPDATE user_accounts SET first_name = ?,surname= ?,email= ?,mobile_number = ?,dob= ? WHERE user_id=?");
                $stmnt->bind_param('ssssss',$firstName,$surname,$email,$phone,$dob,$user);
                $stmnt->execute();
                $data="true";
                header("Location:account-info.php?user=$user & data=$data");
        }
?>