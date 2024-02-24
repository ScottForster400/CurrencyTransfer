<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $user =$_GET["user"]?? null;
        $data=$_GET["data"]?? null;
        include("includes/dbconfing-inc.php");
        $user =$_GET["user"]?? null;
        $stmnt=$mysqli->prepare("SELECT * FROM exchange_rates");
        $stmnt->execute();
        $results=$stmnt->get_result();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome || CTA</title>
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
        <main>
            <div class="info">
                <h1>Add Currency</h1>
                <h3>Add funds to selected account</h3>
                <?php
                    echo("<form method=\"POST\" action=\"add-account-code.php\">")
                ?>
                    <div id=contact-frm>
                        <div class="form-items">
                            <div class="centre">
                                <label for="account">Account:</label>
                                <select name="account" id="account">
                                <?php
                                    if($results->num_rows>0){
                                        while($currency = $results -> fetch_object()){
                                        {
                                            echo("<option value=\"{$currency->currency_name}\">{$currency->currency_name}</option>");

                                        }
                                    }
                                }
                                ?>
                                </select>
                                <!-- this is required in order to send over user id to next form -->
                                <?php
                                    echo("<input type=\"hidden\" name=\"user\" id=\"user\" value=\"{$user}\">");
                                ?>
                                <?php
                                // had to use number as wasnt recognising text
                                    if($data ==1){
                                        echo("<p> account already exists</p>");
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="centre">
                            <button type="submit" id="addFund">Add Funds</button> 
                        </div>   
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>