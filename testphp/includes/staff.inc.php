<?php

if (isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $wage = $_POST["wage"];
    $ephone_number1 = $_POST["ephone_number1"];
    $job_title = $_POST["job_title"];
    $department = $_POST["department"];
    $worksAt = $_POST["worksAt"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name,$birthday,$gender, $email, $phone_number, $address, $username, $pwd, $pwdrepeat, $wage, $job_title, $department, $worksAt) !== false)
    {
        header("location: ../staff.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false)
    {
        header("location: ../staff.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false)
    {
        header("location: ../staff.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdrepeat) !== false)
    {
        header("location: ../staff.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false)
    {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);
    createEmployee($conn, $name, $birthday, $gender, $email, $phone_number, $wage, $job_title, $department, $worksAt);

}
else {
    header("location: ../staff.php?error=none");
    exit();
}

