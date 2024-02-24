<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("includes/dbconfing-inc.php");
        $user =$_GET["user"]?? null;
        $stmnt=$mysqli->prepare("SELECT * FROM `currency_accounts` INNER JOIN exchange_rates ON currency_accounts.exchange_id = exchange_rates.exchange_id WHERE user_id = ?;");
        $stmnt->bind_param('s',$user);
        $stmnt->execute();
       $results=$stmnt->get_result();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome || CTA</title>
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mobile-home.css">
    <link rel="stylesheet" href="css/desktop-home.css" media="only screen and (min-width : 720px)">
    <script src="javascript/main.js" defer></script>
    <script src="javascript\jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="container">
        <?php
            include("includes/nav-account-inc.php");
        ?>
        <main>
                <div class="account-header">
                    <h2>Accounts</h2>
                    <?php
                        echo("<a href=\"add-account.php?user=$user\"><button>Add Account</button></a>")
                    ?>
                </div>
                <div class="info">
                    <?php
                        if($results->num_rows>0){
                            while($account = $results -> fetch_object()){
                                {
                                    echo("<div class=\"exchange-display\">");
                                    echo("<div class=\"exchange-image\">");
                                    echo("<div class=\"img-container\">");
                                    echo("<img src=\"imgs/{$account->currency_image}\" alt=\"$account->currency_name\">");
                                    echo("</div>");
                                    echo("</div>");
                                    echo("<div class=\"exchange-info\">");
                                    echo("<div class=\"balance\">");
                                    echo("<h2>{$account->currency_name}</h2>");
                                    echo("<p>{$account->currency_symbol}{$account->balance}</p>");
                                    echo("</div>");
                                    echo("<div class=\"flex-buttons\">");
                                    echo("<a href=\"add-currency.php?user={$user}\"><button class=\"btn-width\">Add</button></a>");
                                    if($account->exchange_id != 3){
                                        echo("<a href=\"delete-code.php?user=$user & account=$account->exchange_id\"><button class=\"btn-width\">Delete</button></a>");
                                    }
                                    echo("</div>");
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