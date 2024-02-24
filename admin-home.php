<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome || CTA</title>
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
                    <div class="account-display">
                        <div class="account-info">
                                <h2>Charlie mulnor</h2>
                                <div class="flag-detail">
                                    <div class="centre">
                                        <p>Flag Date:25/02/22</p>
                                    </div>
                                    <div class="centre">
                                        <p>Attempted Amount:500,000</p>
                                    </div>
                                    <div class="centre">
                                        <p>Account status:locked</p>
                                    </div>
                                </div>
                            <div class="flex-buttons">
                                <a href="add-currency.php"><button class="btn-width">Unlock</button></a>
                                <a href="account-review.php"><button class="btn-width">Review</button></a>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</body>
</html>