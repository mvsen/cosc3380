<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en" dir= "ltr>

<head>
    <title> ZOO Group 6 </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <div class="wrapper">
            <ul> 
                <li><a href ="index.php">Home</a><li>
                <li><a href ="discover.php">Discover</a><li>

                <?php
                    if (isset($_SESSION["useruid"]))
                    {
                        if(($_SESSION["useruid"]) == 'adminZOO')
                        {
                            echo '<li><a href ="staff.php">Staff</a><li>';
                            echo '<li><a href ="schedule.php">Schedule</a><li>';
                            echo '<li><a href ="inventory.php">Inventory</a><li>';
                            echo '<li><a href ="includes/logout.inc.php">Log Out</a><li>';
                        }
                        else{
                            echo '<li><a href ="profile.php">Profile Page</a><li>';
                            echo '<li><a href ="shop.php">Shop</a><li>';
                            echo '<li><a href ="includes/logout.inc.php">Log Out</a><li>';

                        }
                       
         

                    }
                    else
                    {
                        echo '<li><a href ="signup.php">Sign Up</a><li>';
                        echo '<li><a href ="login.php">Log In</a><li>';
                    

                    }


                ?>

                
            <ul>
        </div>
    </nav>

    <div class="wrapper">
    