<?php
        include("includes/dbconfing-inc.php");
        $user =$_GET["user"]?? null;
        $amount=$_GET["amount"]??null;
        $accountFrom=$_GET["account-from"]??null;
        $accountTo=$_GET["account-to"]??null;
        $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = '$user' AND currency_name ='$accountFrom' ;");
        $stmnt->execute();
        $results=$stmnt->get_result();
        if($results->num_rows>0){
            while($account = $results -> fetch_object()){
                {
                    $GBPamount=$amount/$account->exchange_rate;
                    $accountId=$account->currency_account_id;
                    $stmnt=$mysqli->prepare("UPDATE `currency_accounts` SET balance = balance-{$amount} WHERE currency_account_id = ?");
                    $stmnt->bind_param('s',$accountId);
                    $stmnt->execute();
                    }
                }
            }
        $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = '$user' AND currency_name ='$accountTo' ;");
        $stmnt->execute();
        $results=$stmnt->get_result();
        if($results->num_rows>0){
            while($account = $results -> fetch_object()){
                {
                    $addAmount=$GBPamount*$account->exchange_rate;
                    $accountId=$account->currency_account_id;
                    $stmnt=$mysqli->prepare("UPDATE `currency_accounts` SET balance = balance+{$addAmount} WHERE currency_account_id = ?");
                    $stmnt->bind_param('s',$accountId);
                    $stmnt->execute();
                    header('Location:account-home.php?user='.$user);
                    }
                }
            }
    ?>