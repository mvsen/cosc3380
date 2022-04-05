<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) 
{
    $result;

    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result;
    $pattern = "/\w/";

    if(!preg_match($pattern,$username) )
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat)
{
    $result;

    if ($pwd !== $pwdrepeat)
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * from ZOOSchema.users where usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmt1failed");
        exit();

    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else{
        $reult = false;
        return $reult;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $email, $username, $pwd)
{
    $sql = "INSERT into ZOOSchema.users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmt2failed");
        exit();

    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);



    header("location: ../signup.php?error=none");
    exit();



}
function emptyInputLogin($username, $pwd) 
{
    $result;

    if (empty($username) || empty($pwd))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists  = uidExists($conn, $username, $username);

    if ($uidExists === false)
    {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    if ($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
    }
    else if ($checkPwd === true)
    {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();

    }

}

function createEmployee($conn, $name,$birthday,$gender, $email, $phone_number, $address, $wage, $job_title, $department, $worksAt)
    $sql = "INSERT into ZOOSchema.Employees(E_Name, E_Birthdate, E_Gender, E_Email, E_Phonenumber, E_Address, E_Pay, E_JobTitle, E_Department, E_WorksAt) VALUES (?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../staff.php?error=stmt2failed");
        exit();

    }

    //$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $name,$birthday,$gender, $email, $phone_number, $address, $wage, $job_title, $department, $worksAt );
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);



    header("location: ../staff.php?error=none");
    exit();

}

function emptyInputEmployee($name,$birthday,$gender, $email, $phone_number, $address, $username, $pwd, $pwdrepeat, $wage, $job_title, $department, $worksAt) 
{
    $result;

    if (empty($name) || empty($birthday) || empty($gender) || empty($email) || empty($phone_number) || empty($address) || empty($username) || empty($pwd) || empty($pwdrepeat) || empty($wage) || empty($job_title) || empty($department) || empty($worksAt))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

