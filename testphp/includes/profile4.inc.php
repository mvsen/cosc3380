<?php



if(isset($_POST["submit4"]))
{
    $department = $_POST["department2"];
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
