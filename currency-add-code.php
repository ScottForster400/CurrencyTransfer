<?php
        include("includes/dbconfing-inc.php");
        $user =$_GET["user"]?? null;
        $amount=$_GET["amount"]??null;
        $account=$_GET["account"]??null;
        $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = ? AND currency_name =?;");
        $stmnt->bind_param('ss',$user,$account);
        $stmnt->execute();
        $results=$stmnt->get_result();
        if($results->num_rows>0){
            while($account = $results -> fetch_object()){
                {
                    $amount=$amount*$account->exchange_rate;
                    $accountId=$account->currency_account_id;
                    $stmnt=$mysqli->prepare("UPDATE `currency_accounts` SET balance = balance+{$amount} WHERE currency_account_id = ?");
                    $stmnt->bind_param('s',$accountId);
                    $stmnt->execute();
                    header('Location:account-home.php?user='.$user);
                    }
                }
            }
        else{
            header('Location:add-currency.php?user='.$user);
        }
    ?>