<?php
include_once 'header.php'

<<<<<<< HEAD
?>

<section class ="index-intro">
        <?php
        
                    if (isset($_SESSION["useruid"]))
                    {
                        echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
                    }
                    ?>
        <h1> This is a Staff page </h1>
=======

?>

<section class ="index-intro">
 

   
       
        </section>
         



>>>>>>> Jeffery
        <section class ="add-employee-form">
            <h2> Add an Employee</h2>
            <div class="add-employee-form-form">
            <form action="includes/staff.inc.php" method="post" >
                <input type="text" name="name" placeholder="Full name..." style="height:50px; width:150px;">
                <input type="date" name="birthday" placeholder="DOB YYYY-MM-DD" min="1901-01-01" style="height:50px; width:150px;">
                <select name="gender" id="gender" style="height:50px; width:150px;">
                <option value=''>Gender</option>
                   <option name="gender">Female</option>
                   <option name="gender">Male</option>
                </select>
                <input type="tel" id="phone" name="phone_number" placeholder="Phone Number XXX-XXX-XXXX" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" style="height:50px; width:150px;">
                <input type="text" name="address" placeholder="Street, City, State, Zipcode" style="height:50px; width:150px;">
                <p> Create Account for Employee </p>
                <input type="text" name="email" placeholder="email..." style="height:50px; width:150px;">
                <input type="text" name="uid" placeholder="Username..." style="height:50px; width:150px;">
                <input type="password" name="pwd" placeholder="Password..." style="height:50px; width:150px;">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password..." style="height:50px; width:150px;">
                <p> Job Description </p>                
                <input type="text" name="wage" placeholder="Wage ($/hr)" style="height:50px; width:150px;">
                <input type="text" name="job_title" placeholder="Job Title" style="height:50px; width:150px;">
                <input type="text" name="workHours" placeholder="Work Hours" style="height:50px; width:150px;">
                <!--getting department names from mysql department-->

    
                <input type="text" name="department" placeholder="Department" style="height:50px; width:150px;">
                <input type="text" name="worksAt" placeholder="Works at" style="height:50px; width:150px;">
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
    else if ($_GET["error"] == "invalidBDay")
    {
       echo "<p>Invalid birthday. Try again.</p>";
    }
    else if ($_GET["error"] == "none")
    {
       echo "<p>You have succesfully signed the employee up!</p>";
    }
    
}
    

        ?>
   
        </section>
<<<<<<< HEAD
         
=======
   
        </section>



>>>>>>> Jeffery

        <?php
include_once 'footer.php'

<<<<<<< HEAD
?>
=======
?>
>>>>>>> Jeffery
