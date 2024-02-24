<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("includes/dbconfing-inc.php");
        $user =$_GET["user"]?? null;
        $stmnt=$mysqli->prepare("SELECT * FROM exchange_rates");
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
            <section>
                <div class="side-bar">
                    <?php
                        if($results->num_rows>0){
                            while($currency = $results -> fetch_object()){
                                {
                                    echo("<p>{$currency->currency_name}</p>");
                                }
                            }
                        }
                    ?>
                </div>
                <div class="info">
                    <h2>Exchange Rates</h2>
                    <?php
                        $stmnt=$mysqli->prepare("SELECT * FROM exchange_rates");
                        $stmnt->execute();
                        $results=$stmnt->get_result();
                        if($results->num_rows>0){
                            while($currency = $results -> fetch_object()){
                                {
                                    echo("<div class=\"exchange-display\">");
                                    echo("<div class=\"exchange-image\">");
                                    echo("<div class=\"img-container\">");
                                    echo("<img src=\"imgs/{$currency->currency_image}\" alt=\"$currency->currency_name\">");
                                    echo("</div>");
                                    echo("</div>");
                                    echo("<div class=\"exchange-info\">");
                                    echo("<div class=\"balance\">");
                                    echo("<h2>{$currency->currency_name}</h2>");
                                    echo("<p>{$currency->exchange_rate}</p>");
                                    echo("</div>");
                                    echo("<div class=\"flex-buttons\">");
                                    //echo("<a href=\"add-currency.php\"><button class=\"btn-width\">Add</button></a>");
                                    //echo("<a href=\"\"><button class=\"btn-width\">Delete</button></a>");
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
    </div>
</body>
</html>