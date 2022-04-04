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

                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="birthday" placeholder="DOB MM/DD/YYYY">
                <input type="text" name="phone_number" placeholder="Phone # (XXX-XXX-XXXX)">
                
                <p> Create Account </p>
                <input type="text" name="email" placeholder="email...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
                <p> Emergency Contact Information 1 </p>
                <input type="text" name="emergencycontactname1" placeholder="Emergency Contact Name">
                <input type="text" name="ephone_number1" placeholder="Phone # (XXX-XXX-XXXX)">
                <input type="text" name="relationship1" placeholder="Relationship">
                <p> Emergency Contact Information 2 </p>
                <input type="text" name="emergencycontactname2" placeholder="Emergency Contact Name">
                <input type="text" name="ephone_number2" placeholder="Phone # (XXX-XXX-XXXX)">
                <input type="text" name="relationship2" placeholder="Relationship">
                <p> Job Description </p>                
                <input type="text" name="wage" placeholder="Wage ($/hr)">
                <input type="text" name="department" placeholder="Department">
                <input type="text" name="job_title" placeholder="Job Title">
                <button type="submit" name="submit"> Add Employee </button>

            </form>
            </div>
            <?php

        ?>
   
            <p> Here is some important information </p>
        </section>


        <?php
include_once 'footer.php'

?>