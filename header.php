<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en" dir= "ltr">

<head>
    <title> ZOO Group 6 </title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<style>


@import url('https://fonts.googleapis.com/css?family=Work+Sans:400,600');
body {
	margin: 1%;
	background: #FFFFFF;
	font-family: 'Work Sans', sans-serif;
	font-weight: 800;
}
header {
  margin-top: -1%;
  margin-bottom: 0;
  margin-left: -1%;
  margin-right: -1%;
}

.container {
	width: 80%;
	margin: 0 auto;
}

header {
  background: #55d6aa;
  height: 65px;
}

header::after {
  content: '';
  display: table;
  clear: both;
}

.logo {
  float: left;
  padding: 10px 0;
}

nav {
  float: right;
}

nav ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

nav li {
  display: inline-block;
  margin-left: 40px;
  padding-top: 23px;

  position: relative;
}

nav a {
  color: #444;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
}

nav a:hover {
  color: #000;
}

nav a::before {
  content: '';
  display: block;
  height: 5px;
  background-color: #444;

  position: absolute;
  top: 0;
  width: 0%;

  transition: all ease-in-out 250ms;
}

nav a:hover::before {
  width: 100%;
}

::placeholder { 
  color: gray;
  opacity: 1; 
}

:-ms-input-placeholder {
  color: gray;
}

::-ms-input-placeholder { 
  color: gray;
}
 

</style>
<header>
    <nav class="navbar navbar-light" >
        <div class="wrapper">
            <ul> 
                <li><a href ="/">Home</a><li>
                <li><a href ="discover.php">Discover</a><li>

                <?php
                    if (isset($_SESSION["useruid"]))
                    {
                        if(($_SESSION["userR"]) == "employee")
                        {
                            echo '<li><a href ="profile.php">Profile Page</a><li>';
                            echo '<li><a href ="schedule.php">Schedule</a><li>';
                            echo '<li><a href ="includes/logout.inc.php">Log Out</a><li>';
                        }
                        else if(($_SESSION["userR"]) =="customer") {
                            echo '<li><a href ="profilec.php">Profile Page</a><li>';
                            echo '<li><a href ="shop.php">Shop</a><li>';
                            echo '<li><a href ="includes/logout.inc.php">Log Out</a><li>';

                        }
                        else{
                          

                            echo '<li><a href ="staff.php">Staff</a><li>';
                            echo '<li><a href ="schedule.php">Schedule</a><li>';
                            echo '<li><a href ="inventory.php">Inventory</a><li>';
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
</header>
    <div class="wrapper">
    