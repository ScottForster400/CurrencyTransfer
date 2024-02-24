<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome || CTA</title>
    <!-- Load an icon library to show icon for showing password -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
            include("includes/nav-admin-inc.php")
        ?>
        <main>
            <div class="info">
                <h1>Transfer Limit</h1>
                <h3>Current Limit:£1,000,000</h3>
                <form  method="GET">
                    <div id=contact-frm>
                        <div class="form-items">
                            <div class="centre">
                                <label for="amount">New Limit:</label>
                                <input type="number" name="amount" id="amount"required min='5'>
                            </div>
                        </div>
                        <div class="centre">
                            <input type="submit" value="Set Limit">
                        </div>   
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>