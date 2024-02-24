<?php
    include("includes/dbconfing-inc.php");
    $user=$_GET["user"]??null;
    $account_id=$_GET["account"]??null;
    $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = '$user' AND currency_accounts.exchange_id ='$account_id' ;");
    $stmnt->execute();
    $results=$stmnt->get_result();
    if($results->num_rows>0){
        while($account = $results -> fetch_object()){
            {
                $GBPamount=$account->balance/$account->exchange_rate;
                var_dump($GBPamount);
                }
            }
        }
    $stmnt=$mysqli->prepare("UPDATE `currency_accounts` SET balance = balance+{$GBPamount} WHERE exchange_id ='3' AND user_id=$user;");
    $stmnt->execute();
    $stmnt=$mysqli->prepare("DELETE FROM `currency_accounts` WHERE user_id=$user AND exchange_id=$account_id");
    $stmnt->execute();
    header('Location:account-home.php?user='.$user);
?>