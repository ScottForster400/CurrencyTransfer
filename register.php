<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register || CTA</title>
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

                <h1>Register</h1>
                <h3>Create account for CTA or <a href="login.php">login here</a></h3>
                <form  method="POST" action="register-code.php">
                    <div id=contact-frm>
                        <div class="form-items" >
                            <div class="centre">
                                <label for="firstName">First Name:</label>
                                <input type="text" name="firstName" id="firstName"required>
                                <label for="surname">Surname:</label>
                                <input type="text" name="surname" id="surname"required>
                                <div class="pword-container">
                                    <label for="pword">Password:</label>
                                    <input type="password" name="pword" id="pword"required>
                                    <i class="fa-solid fa-eye" id="eye" onclick="showPword()"></i>
                                </div>
                                <label for="phone">Phone Number:</label>
                                <input type="tel" name="phone" id="phone">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email"required>
                                <label for="dob">Date of Birth:</label>
                                <input type="date" name="dob" id="dob"required>
                            </div>
                        </div>
                        <div class="centre">
                            <input type="submit" value="register">
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