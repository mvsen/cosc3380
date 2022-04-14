<?php



if(isset($_POST["submit5"]))
{
    $department = $_POST["department2"];
    $id = $_POST["id"];
    $day = $_POST["day"];






    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    deleteHours($conn, $department, $id, $day);
}
else {
    header("location: ../profilea.php?error=none4");
    exit();
}
