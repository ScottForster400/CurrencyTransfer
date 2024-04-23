<!-- used to make burger menu nav -->
<!--Websdite:w3schools
Name Of Webpage: How TO - Mobile Navigation Menu
Date:N/A
URL:https://www.w3schools.com/howto/howto_js_mobile_navbar.asp -->
<div class="nav-bar">
            <div class="logo">
            <?php
                echo("<a href=\"account-home.php?user={$user}\"><img src=\"imgs/logo-white.png\" alt=\"logo\"></a>")
            ?>
            </div>
            <div id="page-links">
                <?php
                    echo("<a href=\"account-home.php?user={$user}\">Home</a>");
                    echo("<a href=\"account-info.php?user={$user}\">Account</a>");
                    echo("<a href=\"transfer.php?user={$user}\">Transfer</a>");
                    echo("<a href=\"exchnage-rates.php?user={$user}\">Exchange Rates</a>");
                    echo("<a href=\"index.php\">Log Out</a>");
                ?>
            </div>
                <a href="javascript:void(0)" class="burger" onclick="burgerMenu()">
                    <i class="fa fa-bars"></i>
                </a>
        </div>