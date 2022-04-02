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

        

            <h1> This is a profile page</h1>
            <p> Update your information </p>
        </section>

        <section class ="signup-form">
            <h2> Update Personal Information</h2>
            <div class="signup-form-form">
            <form action="includes/profile.inc.php" method="post" >
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="email" placeholder="email...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
                <button type="submit" name="submit"> Update </button>

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
echo "<p>You have succesfully signed up!</p>";
}

}

?>


<section><form action="/action_page.php">
  <label for="cars">Choose field to Update:</label>
  <select name="cars" id="cars">
    <option value="name">Name</option>
    <option value="email">Email</option>
    <option value="uid">Username</option>
    <option value="pwd">Password</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form></section>







<?php
include_once 'footer.php'

?>