<?php
        include("includes/dbconfing-inc.php");
        $date = date('Y-m-d');
        $user =$_GET["user"]?? null;
        $amount=$_GET["amount"]??null;
        $accountFrom=$_GET["account-from"]??null;
        $accountTo=$_GET["account-to"]??null;
        $limit=$_GET["limit"]?? null;

        $stmnt=$mysqli->prepare("SELECT approved_account FROM user_accounts WHERE user_id = ?;");
        $stmnt->bind_param('s',$user);
        $stmnt->execute();
        $results=$stmnt->get_result();
        if($results->num_rows>0){
            while($userAccount = $results -> fetch_object()){
                {
                   $approved=$userAccount->approved_account;
                }
            }
        }

        $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = ? AND currency_name =?;");
        $stmnt->bind_param('ss',$user,$accountFrom);
        $stmnt->execute();
        $results=$stmnt->get_result();
        if($results->num_rows>0){
            while($account = $results -> fetch_object()){
                {
                    $accountFromId=$account->currency_account_id;
                    $balance=$account->balance;
                    var_dump($balance);
                }
            }
        }
        

        $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = ? AND currency_name =?;");
        $stmnt->bind_param('ss',$user,$accountTo);
        $stmnt->execute();
        $results=$stmnt->get_result();
        if($results->num_rows>0){
            while($account = $results -> fetch_object()){
                {
                    $accountToId=$account->currency_account_id;
                }
            }
        }

        if($amount>= $limit){
            $stmnt=$mysqli->prepare("UPDATE user_accounts SET suspicious_account = 1 WHERE user_id=?;");
            $stmnt->bind_param('s',$user);
            $stmnt->execute();
            $stmnt=$mysqli->prepare("INSERT INTO `transfers` ( `transfer_date`,`transfer_amount`,`account_from`,`account_to`, `user_id`) VALUES ('$date', '$amount','$accountToId','$accountFromId', '$user');");
            $stmnt->execute();
            header('Location:login.php?user=');
        }
        elseif($amount>100000 and $approved == 0){
            $stmnt=$mysqli->prepare("UPDATE user_accounts SET suspicious_account = 1 WHERE user_id=?;");
            $stmnt->bind_param('s',$user);
            $stmnt->execute();
            $stmnt=$mysqli->prepare("INSERT INTO `transfers` ( `transfer_date`,`transfer_amount`,`account_from`,`account_to`, `user_id`) VALUES ('$date', '$amount','$accountToId','$accountFromId', '$user');");
            $stmnt->execute();
            header('Location:login.php?user=');
        }
        elseif($balance<$amount){
            $data='1';
            header("Location:transfer.php?user=$user & data=$data");
        }
        else{
            $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = '$user' AND currency_name ='$accountFrom' ;");
            $stmnt->execute();
            $results=$stmnt->get_result();
            if($results->num_rows>0){
                while($account = $results -> fetch_object()){
                    {
                        $GBPamount=$amount/$account->exchange_rate;
                        $accountFromId=$account->currency_account_id;
                        var_dump($GBPamount);
                        var_dump($amount);
                        $stmnt=$mysqli->prepare("UPDATE `currency_accounts` SET balance = balance-{$amount} WHERE currency_account_id = ?");
                        $stmnt->bind_param('s',$accountFromId);
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
                        $accountToId=$account->currency_account_id;
                        var_dump($addAmount);
                        $stmnt=$mysqli->prepare("UPDATE `currency_accounts` SET balance = balance+{$addAmount} WHERE currency_account_id = ?");
                        $stmnt->bind_param('s',$accountToId);
                        $stmnt->execute();
                        }
                    }
                }
                $stmnt=$mysqli->prepare("INSERT INTO `transfers` ( `transfer_date`,`transfer_amount`,`account_from`,`account_to`, `user_id`) VALUES ('$date', '$amount','$accountFromId','$accountToId', '$user');");
                $stmnt->execute();
                header('Location:account-home.php?user='.$user);
        }
    ?>