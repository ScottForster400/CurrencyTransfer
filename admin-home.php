<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("includes/dbconfing-inc.php");

        $user =$_GET["user"]?? null;
        $stmnt=$mysqli->prepare("SELECT * FROM `user_accounts` WHERE suspicious_account = 1;");
        $stmnt->execute();
       $results=$stmnt->get_result();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home || CTA</title>
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
            <h2 class="title">Suspicious Accounts</h2>
                <div class="info">
                    <?php
                        if($results->num_rows>0){
                            while($account = $results -> fetch_object()){
                                {
                                    echo("<div class=\"account-display\">");
                                    echo("<div class=\"account-info\">");
                                    echo("</div>");
                                    echo("<h2>{$account->first_name} {$account->surname}</h2>");
                                    echo("<div class=\"flag-detail\">");
                                    $stmnt=$mysqli->prepare("SELECT * FROM transfers WHERE user_id ={$account->user_id} AND transfer_date<= CURRENT_DATE ORDER BY transfer_date DESC LIMIT 1;");
                                    $stmnt->execute();
                                    $resas=$stmnt->get_result();
                                    if($resas->num_rows>0){
                                        while($transfer = $resas -> fetch_object()){{
                                            echo("<div class=\"centre\">");
                                            echo("<p>Flag Date:{$transfer->transfer_date}</p>");
                                            echo("</div>");
                                            echo("<div class=\"centre\">");
                                            echo("<p>Attempted Amount:{$transfer->transfer_amount}</p>");
                                            echo("</div>");
                                            $trans_date=$transfer->transfer_date;
                                        }
                                        }
                                    }
                                    echo("<div class=\"centre\">");
                                    echo("<p>Status:Locked</p>");
                                    echo("</div>");
                                    echo("</div>");
                                    echo("<div class=\"flex-buttons\">");
                                    echo("<a href=\"account-review.php?user={$account->user_id} & flag_date={$trans_date}\"><button class=\"btn-width\">Review</button></a>");
                                    echo("<a href=\"unlock-account.php?user={$account->user_id}\"><button class=\"btn-width\">Unlock</button></a>");
                                    echo("</div>");
                                    echo("</div>");
                                }
                            }
                        }
                        else{
                            echo("<p>No Accounts</p>");
                        }
                    ?>
                </div>

        </div>
    </div>
</body>
</html>