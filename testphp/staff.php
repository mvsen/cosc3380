<?php
include_once 'header.php'

?>

<section class ="index-intro">
        <?php
                    if (isset($_SESSION["useruid"]))
                    {
                        echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
                        
                    }
                    ?>
        <h1> This is a Staff page </h1>
        <section class ="add-employee-form">
            <h2> Add an Employee</h2>
            <div class="add-employee-form-form">
            <form action="includes/staff.inc.php" method="post" >
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="birthday" placeholder="DOB MM/DD/YYYY">
                <input type="text" name="gender" placeholder="Gender">
                <input type="text" name="phone_number" placeholder="Phone # (XXX-XXX-XXXX)">
                <input type="text" name="address" placeholder="Street, City, State, Zipcode">
                <p> Create Account </p>
                <input type="text" name="email" placeholder="email...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
                <p> Job Description </p>                
                <input type="text" name="wage" placeholder="Wage ($/hr)">
                <input type="text" name="job_title" placeholder="Job Title">
                <input type="text" name="department" placeholder="Department">
                <input type="text" name="worksAt" placeholder="Works at">
                <button type="submit" name="submit"> Add Employee </button>

            </form>
            </div>
            <?php

if (isset($_GET["error"]))
{
    if($_GET["error"] == "emptyinput")
    {
       echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "invaliduid")
    {
       echo "<p>Choose a proper username!</p>";
    }
    else if ($_GET["error"] == "invalidemail")
    {
       echo "<p>Choose a proper email!</p>";
    }
    else if ($_GET["error"] == "passwordsdontmatch")
    {
       echo "<p>Make sure passwords match!!</p>";
    }
    else if ($_GET["error"] == "smtm1failed")
    {
       echo "<p>Something went wrong, try again.</p>";
    }
    else if ($_GET["error"] == "smtm2failed")
    {
       echo "<p>Something went wrong, try again.</p>";
    }
    else if ($_GET["error"] == "usernametaken")
    {
       echo "<p>Username already taken. Try something else.</p>";
    }
    else if ($_GET["error"] == "none")
    {
       echo "<p>You have succesfully signed the employee up!</p>";
    }
    
}
    

        ?>
   
            <p> Here is some important information </p>
        </section>


        <?php
include_once 'footer.php'

?>
