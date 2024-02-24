<!-- Used https://www.w3schools.com/howto/howto_js_mobile_navbar.asp to make a burger menu -->
<div class="nav-bar">
            <div class="logo">
            <?php
                echo("<a href=\"account-home.php?user={$user}\"><img src=\"imgs/logo-white.png\" alt=\"logo\"></a>")
            ?>
            </div>
            <div id="page-links">
                <?php
                    echo("<a href=\"account-info.php?user={$user}\">Account</a>");
                    echo("<a href=\"transfer.php?user={$user}\">Transfer</a>");
                    echo("<a href=\"exchnage-rates.php?user={$user}\">Exchange Rates</a>");
                    echo("<a href=\"index.php\">Log Out</a>");
                ?>
            </div>
                <a href="javascript:void(0)" class="burger" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
        </div>