<?php
    require_once("includes/dbconfing-inc.php");
    $selection = array("","","");
    for ($i = 0; $i < 3; $i++) {
        $selection[$i] = rand(18,42);
    }
    $stmnt=$mysqli->prepare("SELECT * FROM exchange_rates WHERE exchange_id IN ('$selection[0]',$selection[1],$selection[2]); ");
    $stmnt->execute();
    $results=$stmnt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
            include("includes/nav-inc.php");
        ?>
        
            <div class="banner">
                <img src="imgs/banner-alt.png" alt="banner">
            </div>
        
        <div class="info">
                <h2>Popular Exchanges</h2>

                <?php
                     if($results->num_rows>0){
                        while($currency = $results -> fetch_object()){
                            {
                                echo("<div class=\"exchange-display\">");
                                echo("<div class=\"exchange-image\">");
                                echo("<div class=\"img-container\">");
                                echo("<img src=\"imgs/$currency->currency_image\" alt=\"$currency->currency_name\">");
                                echo("</div>");
                                echo("</div>");
                                echo("<div class=\"exchange-info\">");
                                echo("<div class=\"balance\">");
                                echo("<h2>$currency->currency_name</h2>");
                                echo("<P>$currency->exchange_rate</P>");
                                echo("</div>");
                                echo("</div>");
                                echo("</div>");
                            }
                        }
                    }
                ?>
                <!-- <div class="exchange-display">
                    <div class="exchange-image">
                        <div class="img-container">
                            <img src="imgs/Euro.png" alt="euro">
                        </div>
                    </div>
                    <div class="exchange-info">
                        <div class="balance">
                            <h2>Euro</h2>
                            <P>1.17</P>
                        </div>
                    </div>
                </div>
                <div class="exchange-display">
                    <div class="exchange-image">
                        <div class="img-container">
                            <img src="imgs/Norway.jpg" alt="kroner">
                        </div>
                    </div>
                    <div class="exchange-info">
                        <div class="balance">
                            <h2>Kroner</h2>
                            <P>8.72</P>
                        </div>
                    </div>
                </div>
                <div class="exchange-display">
                    <div class="exchange-image">
                        <div class="img-container">
                            <img src="imgs/US.jpg" alt="dollar">
                        </div>
                    </div>
                    <div class="exchange-info">
                        <div class="balance">
                            <h2>Dollar</h2>
                            <P>1.26</P>
                        </div>
                    </div>
                </div> -->

        </div>
        <?php
            include("includes/footer-inc.php")
        ?>
    </div>
</body>
</html>