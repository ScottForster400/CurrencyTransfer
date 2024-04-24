<?php
        include("includes/dbconfing-inc.php");
        $limit=$_GET["limit"]?? null;
        $date = date('Y-m-d');
        $user =$_GET["user"]?? null;
        $amount=$_GET["amount"]??null;
        $account=$_GET["account"]??null;
        
        //checks if account is approved
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
            //finds account id
            $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = ? AND currency_name =?;");
            $stmnt->bind_param('ss',$user,$account);
            $stmnt->execute();
            $results=$stmnt->get_result();
            if($results->num_rows>0){
                while($accountTo = $results -> fetch_object()){
                    {
                        $accountId=$accountTo->currency_account_id;
                    }
                }
            }
        //sees if amount is over transfer limit
        if($amount>= $limit){
            $stmnt=$mysqli->prepare("UPDATE user_accounts SET suspicious_account = 1 WHERE user_id=?;");
            $stmnt->bind_param('s',$user);
            $stmnt->execute();
            $stmnt=$mysqli->prepare("INSERT INTO `transfers` ( `transfer_date`, `transfer_amount`, `account_to`, `user_id`) VALUES ('$date', '$amount', '$accountId', '$user');");
            $stmnt->execute();
            header('Location:login.php?user='.$user);
        }
        //sees if amount is over 100000 and not approved
        elseif($amount>100000 and $approved == 0){
            $stmnt=$mysqli->prepare("UPDATE user_accounts SET suspicious_account = 1 WHERE user_id=?;");
            $stmnt->bind_param('s',$user);
            $stmnt->execute();
            $stmnt=$mysqli->prepare("INSERT INTO `transfers` ( `transfer_date`, `transfer_amount`, `account_to`, `user_id`) VALUES ('$date', '$amount', '$accountId', '$user');");
            $stmnt->execute();
            header('Location:login.php?user='.$user);
        }
        //adds currency
        else{
            var_dump($account);
            $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = ? AND currency_name =?;");
            $stmnt->bind_param('ss',$user,$account);
            $stmnt->execute();
            $results=$stmnt->get_result();
            if($results->num_rows>0){
                while($account = $results -> fetch_object()){
                    {
                        var_dump($amount);
                        $amountconv=$amount*$account->exchange_rate;
                        var_dump($amount);
                        var_dump($accountId);
                        $stmnt=$mysqli->prepare("UPDATE `currency_accounts` SET balance = balance+{$amountconv} WHERE currency_account_id = ?");
                        $stmnt->bind_param('s',$accountId);
                        $stmnt->execute();
                        }
                    }
                }
            else{
                header('Location:add-currency.php?user='.$user);
            }
            //stores transfer
            $stmnt=$mysqli->prepare("INSERT INTO `transfers` ( `transfer_date`, `transfer_amount`, `account_to`, `user_id`) VALUES ('$date', '$amount', '$accountId', '$user');");
            $stmnt->execute();
            header('Location:account-home.php?user='.$user);
        }
    ?>