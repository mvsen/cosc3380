<?php
include_once 'header.php'




?>


        <section class ="signup-form">
            <h2> Sign Up</h2>
            <div class="signup-form-form">
            <form action="includes/signup.inc.php" method="post" >
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="email" placeholder="email...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
                <button type="submit" name="submit"> Sign Up </button>

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
        </section>


 

<?php
include_once 'footer.php'

?>