<?php
    require_once("includes\dbconfing-inc.php");
    //used to find how to use header function
    //Websdite:PHP
    //Name Of Webpage:header
    //Date: N/A
    //URL:https://www.php.net/manual/en/function.header.php
    $user =$_POST["user"]?? null;
    $account=$_POST["account"]??null;
    $stmnt=$mysqli->prepare("SELECT exchange_id FROM exchange_rates WHERE currency_name='$account';");
    $stmnt->execute();
    $results=$stmnt->get_result();
    if($results->num_rows>0){
        while($currency = $results -> fetch_object()){
            {
                $currency_id=$currency->exchange_id;
            }
        }
    }
    $stmnt=$mysqli->prepare("SELECT exchange_id FROM currency_accounts WHERE user_id=$user AND exchange_id=$currency_id;");
    $stmnt->execute();
    $results=$stmnt->get_result();
    var_dump($results);
    if($results->num_rows<=0){
        $stmnt=$mysqli->prepare("INSERT INTO currency_accounts(balance,user_id,exchange_id) VALUES(0,?,?);");
        $stmnt->bind_param('ss',$user,$currency_id);
        $stmnt->execute();
        header("Location:account-home.php?user=$user");
    }
    else{
        $data=1;
        header("Location:add-account.php?data=$data & user=$user");
    }

?>