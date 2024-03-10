<!DOCTYPE html>
<html lang="en">
<head>
<?php
        include("includes/dbconfing-inc.php");
        $user =$_GET["user"]?? null;
        $flag_date=$_GET["flag_date"]??null;
        $stmnt=$mysqli->prepare("SELECT * FROM evidence_of_funds WHERE user_id=$user");
        $stmnt->execute();
        $results=$stmnt->get_result();
        if($results->num_rows>0){
            while($evidenceOf = $results -> fetch_object()){
                {
                    $evidence=$evidenceOf->evidence_img_path??null;
                }
            }
        }
        else{
            $evidence=null;
        }
        $stmnt=$mysqli->prepare("SELECT * FROM user_accounts WHERE user_accounts.user_id=$user");
        $stmnt->execute();
        $results=$stmnt->get_result();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Review || CTA</title>
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin-mobile-home.css">
    <link rel="stylesheet" href="css/admin-desktop-home.css" media="only screen and (min-width : 720px)">
    <script src="javascript/main.js" defer></script>
    <script src="javascript\jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="container">
        <?php
            include("includes/nav-admin-inc.php");
        ?>
        <main>
            <h2 class="title">Account Review</h2>
                <div class="info">
                    <div class="account-display">
                        <div class="suspicious-account-info">
                            <div class="left-side">
                                <div class="user-info">
                                <?php
                                if($results->num_rows>0){
                                    while($account = $results -> fetch_object()){
                                        {
                                            echo("<h2>{$account->first_name} {$account->surname}</h2>");
                                            echo("<p>Email:{$account->email}</p>");
                                            echo("<p>Phone:{$account->mobile_number}</p>");
                                            echo("<p>DOB:{$account->dob}</p>");
                                            echo("<p>Flag Date:{$flag_date}");
                                            echo("<p>Account Status:Locked</p>");
                                        }
                                    }
                                }
                                ?>
                                    <!-- <h2>Charlie mulnor</h2>
                                    <p>Email:Demo@gmail.com</p>
                                    <p>Phone Num:0437327392</p>
                                    <p>DOB:06/02/98</p>
                                    <p>Flag Date:25/02/22</p>
                                    <p>Account status:locked</p> -->
                                </div>
                                <div class="img-container">
                                    <?php
                                        
                                            echo("<img src=\"$evidence\" alt=\"Evidence of funds\">");
                                        
                                    ?>
                                   
                                </div>
                                <?php
                                    echo("<a href=\"unlock-account.php?user={$user}\"><button class=\"btn-width\">Unlock</button></a>");
                                ?>
                            </div>
                            <div class="right-side">
                                <h2>Transfer History</h2>
                                <div class="transfer-history">
                                    <?php
                                        $stmnt=$mysqli->prepare("SELECT * FROM transfers  WHERE transfers.user_id=$user ORDER BY transfer_date DESC;");
                                        $stmnt->execute();
                                        $results=$stmnt->get_result();
                                        if($results->num_rows>0){
                                            while($transfer = $results -> fetch_object()){
                                                {
                                                    if($transfer->account_from != null){
                                                        $stmnt=$mysqli->prepare("SELECT * FROM currency_accounts INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_Id WHERE user_id=$user AND currency_account_id={$transfer->account_from};");
                                                        $stmnt->execute();
                                                        $results3=$stmnt->get_result();
                                                        if($results3->num_rows>0){
                                                         while($accountFrom=$results3->fetch_object()){
                                                             {
                                                                 echo("<details>");
                                                                 echo("<summary>{$transfer->transfer_date}: {$accountFrom->currency_symbol}{$transfer->transfer_amount}</summary>");
                                                                 echo("<p>Account from: {$accountFrom->currency_name}</p>");
                                                             }
                                                         }
                                                        }
                                                    }
                                                   else{
                                                        echo("<details>");
                                                        echo("<summary>{$transfer->transfer_date}: £{$transfer->transfer_amount}</summary>");
                                                        echo("<p>Account from: External Account</p>");
                                                   }
                                                   $stmnt=$mysqli->prepare("SELECT * FROM currency_accounts INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_Id WHERE user_id=$user AND currency_account_id={$transfer->account_to};");
                                                   $stmnt->execute();
                                                   $results3=$stmnt->get_result();
                                                   if($results3->num_rows>0){
                                                    while($accountTo=$results3->fetch_object()){
                                                        {
                                                            echo("<p>Account to:{$accountTo->currency_name}</p>");
                                                        }
                                                    }
                                                   }
                                                   
                                                   echo("</details>");
                                                }
                                            }
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</body>
</html>