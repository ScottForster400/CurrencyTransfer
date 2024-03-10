<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || CTA</title>
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
        <div class="info">
                <h1>Log In</h1>
                <h3>Log in to CTA or <a href="register.php">register here</a></h3>
                <form action="login-check.php" method="POST">
                    <div id=contact-frm>
                        <div class="form-items" >
                            <div class="centre">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email"required>
                                <div class="pword-container">
                                    <label for="pword">Password:</label>
                                    <input type="password" name="pword" id="pword"required>
                                    <i class="fa-solid fa-eye" id="eye" onclick="showPword()"></i>
                                </div>
                                <?php
                                    $incorrect=$_GET['data_']??null;
                                    if($incorrect =='true'){
                                    echo("<p>Incorrect login try again</p>");
                                }
                                ?>
                            </div>
                        </div>
                        <div class="flex-buttons">
                            <div class="button-padding">
                                <input type="submit" value="Log In" id="width-100" class="float-right">
                            </div>
                            <div class="button-padding">
                                <a href="" class="float-left"><button>Forgot Password</button></a>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
        <?php
            include("includes/footer-inc.php")
        ?>
    </div>
</body>
</html>