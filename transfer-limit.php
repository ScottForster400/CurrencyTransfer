<!DOCTYPE html>
<html lang="en">
<head>
    <?php
         $data=$_GET["data"]??null;
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Limit || CTA</title>
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
                <div class="centre">
                    <a href="api/webscraper-update-rates.php">
                        <button>Update Exchnage Rates</button>
                    </a>
                    <?php  
                       if($data ==1){
                            echo "<p>Exchange Rates Succesfully Updated</p>";
                       }
                    ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>