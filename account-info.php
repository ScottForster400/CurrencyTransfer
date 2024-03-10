<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $user =$_GET["user"]?? null;
        $data=$_GET["data"]?? null;
        include("includes/dbconfing-inc.php");
        $stmnt=$mysqli->prepare("SELECT * FROM user_accounts WHERE user_id=?");
        $stmnt->bind_param('s',$user);
        $stmnt->execute();
        $results=$stmnt->get_result();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Info || CTA</title>
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
            include("includes/nav-account-inc.php")
        ?>
        <div class="info">

                <h1>Update</h1>
                <h3>Update your account details</h3>
                <form  method="POST" action="update-account-code.php">
                    <div id=contact-frm>
                        <div class="form-items" >
                            <div class="centre">
                            <?php
                                    if($results->num_rows>0){
                                        while($account = $results -> fetch_object()){
                                        {
                                            echo("<label for=\"firstName\">First Name:</label>");
                                            echo("<input type=\"text\" name=\"firstName\" id=\"firstName\" value=\"{$account->first_name}\"required>");
                                            echo("<label for=\"surname\">Surname:</label>");
                                            echo("<input type=\"text\" name=\"surname\" id=\"surname\" value=\"{$account->surname}\"required>");
                                            echo("<label for=\"phone\">Phone Number:</label>");
                                            echo("<input type=\"tel\" name=\"phone\" id=\"phone\" value=\"{$account->mobile_number}\">");
                                            echo("<label for=\"email\">Email:</label>");
                                            echo("<input type=\"email\" name=\"email\" id=\"email\" value=\"{$account->email}\"required>");
                                            echo("<label for=\"dob\">Date of Birth:</label>");
                                            echo("<input type=\"date\" name=\"dob\" id=\"dob\" value=\"{$account->dob}\"required>");
                                            echo("<input type=\"hidden\" name=\"user\" id=\"user\" value=\"{$user}\">");
                                            if($data ==='true'){
                                                echo("<p> account successfully updated</p>");
                                            }
                                        }
                                    }
                                }
                                ?>
                                <!-- <label for="firstName">Name:</label>
                                <input type="text" name="fisrtName" id="firstName"required>
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
                                <input type="date" name="dob" id="dob"required> -->
                            </div>
                        </div>
                        <div class="centre">
                            <input type="submit" value="update">
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