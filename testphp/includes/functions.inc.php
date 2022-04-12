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
    $sql = "INSERT into ZOOSchema.users (usersName, usersEmail, usersUid, usersPwd, usersRank) VALUES (?,?,?,? ,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmt2failed");
        exit();

    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $uRank = "customer";
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd,  $uRank);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);



    header("location: ../signup.php?error=none");
    exit();




}
function updateHours($conn, $department, $id, $hours, $day)
{
    $sql = "INSERT into ZOOSchema.Hours (hours, Date, E_Id, D_Name) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../profile.php?error=stmt2failed");
        exit();

    }


    mysqli_stmt_bind_param($stmt, "isss", $hours, $day, $id, $department);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);



    header("location: ../profile.php?error=none21");
    exit();




}

function updateUser($conn, $name, $email, $username, $pwd, $id)
{




    $sql = "UPDATE ZOOSchema.users SET usersName =?, usersEmail = ?, usersUid = ?, usersPwd=? WHERE usersID = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../profile.php?error=stmt2failed");
        exit();

    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $username, $hashedPwd, $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    session_start();
    session_unset();
    session_destroy();

    header("location: ../login.php");



    //header("location: ../profile.php?error=okay");
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
        header("location: ../login.php?error=wronglogin1");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    if ($checkPwd === false){
        header("location: ../login.php?error=wronglogin2");
    }
    else if ($checkPwd === true)
    {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];

        
        header("location: ../index.php");

        $sql = "SELECT usersRank from ZOOSchema.users where usersUid = ? OR usersEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmt1failed");
        exit();

    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($resultData);
    $_SESSION["userR"] = $row['usersRank'];

    

}
}

function createUserEmployee($conn, $name, $email, $username, $pwd)
{
    $sql = "INSERT into ZOOSchema.users (usersName, usersEmail, usersUid, usersPwd, usersRank) VALUES (?,?,?,?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../staff.php?error=stmt2failed");
        exit();

    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $rank = "employee";
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd, $rank);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);



    header("location: ../staff.php?error=none");
    exit();

}

function createEmployee($conn, $name,$birthday,$gender, $email, $phone_number, $address, $wage, $job_title, $workHours, $department, $worksAt,$username,$pwd) {
    $sql = "INSERT into ZOOSchema.Employees(E_Name, E_Birthdate, E_Gender, E_Email, E_Phonenumber, E_Address, E_Pay, E_JobTitle, E_WorkHours, E_Department, E_WorksAtS) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../staff.php?error=stmt2failed");
        exit();

    }

    //$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssssssssss", $name,$birthday,$gender, $email, $phone_number, $address, $wage, $job_title,$workHours, $department, $worksAt );
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    createUserEmployee($conn, $name, $email, $username, $pwd);

    header("location: ../staff.php?error=none");
    exit();

}


function emptyInputEmployee($name,$birthday,$gender, $email, $phone_number, $address, $username, $pwd, $pwdrepeat, $wage, $job_title, $workHours, $department, $worksAt) 
{
    $result;

    if (empty($name) || empty($birthday) || empty($gender) || empty($email) || empty($phone_number) || empty($address) || empty($username) || empty($pwd) || empty($pwdrepeat) || empty($wage) || empty($job_title) || empty($workHours) || empty($department) || empty($worksAt))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidBDay($birthday) {
    $result;
    $max = new DateTime();
    if($birthday>=$max) {
        $result = false;
    }
    else{$result = true;}
    return $result;
}
