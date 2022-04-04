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

        

            <h1> Profile Page</h1>
            
        </section>

        <section><form action="/action_page.php">
        <p> Update your information </p>
  <label for="cars">Choose field to Update:</label>
  <select name="cars" id="cars">
    <option value="name">Name</option>
    <option value="email">Email</option>
    <option value="uid">Username</option>
    <option value="pwd">Password</option>
  </select>
  <br><br>

  <div class="signup-form-form">
            <form action="includes/signup.inc.php" method="post" >
                <input type="text" name="oldX" placeholder="Current info...">
                <input type="text" name="newX" placeholder="New Info...">
                <button type="submit" name="submit"> Submit </button>

            </form>
            </div>


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





</form></section>

</section>

<section><form action="/action_page.php">
<p> Add information to your profile </p>
<label for="cars">Choose field to add:</label>
<select name="cars" id="cars">
<option value="birthday">Birthday</option>
<option value="Address">Address</option>

</select>
<br><br>

<div class="signup-form-form">
    <form action="includes/signup.inc.php" method="post" >
        <input type="text" name="addX" placeholder="New info...">
        <input type="text" name="addX" placeholder="Confirm Info...">
        <button type="submit" name="submit"> Submit </button>

    </form>
    </div>


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

<body class="bg-gray-900">
  <div class="mt-20 p-4 rounded bg-white max-w-sm text-center border-t-4 border-red-600 mx-auto text-gray-700 pt-0">
  

</span>
    <h3 class="font-bold text-2xl text-black mb-2">Delete Account?</h3>
    <p>You'll permanently loose your</p>
    <ul class="list-disc inline-block text-left pt-2 ml-2">
      <li>Profile</li>
      <li>Invoice History</li>
      <li>Disocunts</li>
    </ul>
    <div class="flex pt-8">
      <button class="w-1/2 mr-1 bg-white border text-gray-600 border-gray-400 hover:bg-gray-300 py-2 px-4 rounded font-medium">Cancel</button>
      <button class="w-1/2 ml-1 bg-red-600 border border-red-600 text-white border-gray-500 hover:bg-red-700 hover:border-red-700 py-2 px-4 rounded font-medium">Delete Account</button>
    </div>
  </div>
</body>





<?php
include_once 'footer.php'

?>