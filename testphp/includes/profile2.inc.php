<?php



if(isset($_POST["submit2"]))
{
    $department = $_POST["department"];
    $id = $_POST["id"];
    $hours = $_POST["hours"];
    $day = $_POST["day"];






    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    updateHours($conn, $department, $id, $hours, $day);
}
else {
    header("location: ../profilea.php?error=none1");
    exit();
}
