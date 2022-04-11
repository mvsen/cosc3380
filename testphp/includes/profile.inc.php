<?php



if(isset($_POST["update"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $id = $_POST["id"];





    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';



    if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false)
    {
        header("location: ../profile.php?error=emptyinput");
        exit();
    }


    updateUser($conn, $name, $email, $username, $pwd, $id);
}
else {
    header("location: ../profile.php?error=none");
    exit();
}

