<!DOCTYPE html>
<html lang="en">
<head>
    <?php
         include("includes/dbconfing-inc.php");
         $user =$_GET["user"]?? null;
         $data=$_GET["data"]??null;
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Limit || CTA</title>
    <!-- Load an icon library to show icon for showing password -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
            include("includes/nav-inc.php")
        ?>
        <main>
            <div class="info">
                <h1>Evidence Of Funds</h1>
                <h3>Submit evidence of funds for Review</h3>
                <form action="evidence-upload-code.php" method="post" enctype="multipart/form-data">
                    <div id=contact-frm>
                        <div class="form-items" >
                            <div class="centre">
                            <!-- Used https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/file to find input type file and to chnage what files it accepts-->
                                <label for="evidence">Evidence:</label>
                            
                                    <input type="file" name="evidence" id="evidence"required accept="image/jpeg, image/png">
                                    <?php
                                         echo("<input type=\"hidden\" name=\"user\" id=\"user\" value=\"{$user}\">");
                                         if($data ==1){
                                            echo("<p>Evidence succesfully submitted</p>");
                                        }
                                        elseif($data==2){
                                            echo("<p>Evidence failed to submit please retry</p>");
                                        }
                                    ?>
                            </div>
                        <div class="centre">
                            <input type="submit" value="Upload" onclick="setLimit()">
                        </div>   
                    </div>
                </form>
            </div>
        </main>
        <?php
            include("includes/footer-inc.php")
        ?>
    </div>
</body>
</html>