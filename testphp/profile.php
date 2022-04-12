<?php
include_once 'header.php'

?>


<section class ="index-intro">


        <p> Update your information </p>
 


  <div class="signup-form-form">
            <form action="includes/profile.inc.php" method="post" >
                <?php
                    $serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
                    $dBUsername = "admin";
                    $dBPassword = "cosc3380";
                    $dBname = "ZOOSchema";
                    $conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
                    $sql = "SELECT * from ZOOSchema.users where usersUid = ?;";
                    $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profile.php?error=stmt1failed");
                    exit();
            
                }
                $username1 = $_SESSION['useruid'];
                mysqli_stmt_bind_param($stmt, "s", $username1);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
            
                //$row = mysqli_fetch_assoc($resultData);
                //print_r($row);

            
                    while($row = mysqli_fetch_array($result)){
                        //print_r($row);
                        $newid = $row['usersId'];
                    ?>
                        <input type="text" name = id value="<?php echo $row['usersId']; ?>" placeholder="<?php echo $row['usersId']; ?>" readonly>
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="email" placeholder="email...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
                <button type="submit" name="update"> Update </button>

            </form>
            </div>
            <?php

                    }
                    
                






?>
</form></section>

<section>


<p> Add Work Hours</p>
 


  <div class="signup-form-form">
      
            <form action="includes/profile2.inc.php" method="post" >
                
                <?php
                    $serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
                    $dBUsername = "admin";
                    $dBPassword = "cosc3380";
                    $dBname = "ZOOSchema";
                    $conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
                    $sql = "SELECT * FROM ZOOSchema.Departments;";
                    $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profile.php?error=stmt1failed");
                    exit();
            
                }
                $username1 = $_SESSION['useruid'];
               // mysqli_stmt_bind_param($stmt, "s", $username1);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);

              
            
                //$row = mysqli_fetch_assoc($resultData);
                //print_r($row);
                
                
                echo "<select name='department'>";
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<option value='" . $row['D_Name'] ."'>" . $row['D_Name'] ."</option>";
                        
                    }
                    
                    
                    echo "</select>";
                    
              
                   // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                  //  echo "<input type='text' name='name' placeholder='Full name...'>";
                    //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                    //echo "<input type='date' name='day' placeholder='day'>;
                        
                    ?>
                    <input type='text' name = 'id' value="<?php echo $newid; ?>" placeholder="<?php echo $newid; ?>" readonly>
                    <input type='text' name='hours' placeholder='Hours Worked...'>
                    <input type='date' name='day' placeholder='day'>  
                    <button type="submit" name="submit2"> Submit Hours</button>  
            </form>
            </div>
            <?php

                    
                    
                    






?>


</section>



<section>


<p> Generate Work Report</p>
 


  <div class="signup-form-form">
      
            <form action="includes/profile.inc.php" method="post" >
                
                <?php
                    $serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
                    $dBUsername = "admin";
                    $dBPassword = "cosc3380";
                    $dBname = "ZOOSchema";
                    $conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
                    $sql = "SELECT * FROM ZOOSchema.Departments;";
                    $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profile.php?error=stmt1failed");
                    exit();
            
                }
                $username1 = $_SESSION['useruid'];
               // mysqli_stmt_bind_param($stmt, "s", $username1);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);

              
            
                //$row = mysqli_fetch_assoc($resultData);
                //print_r($row);
                $all = "All";
                
                echo "<select name='department'>";
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<option value='" . $row['D_Name'] ."'>" . $row['D_Name'] ."</option>";
                        
                    }
                    
                    echo "<option value='" . $all ."' placeholder='All'</option>";
                    echo "</select>";
                    
              
                   // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                  //  echo "<input type='text' name='name' placeholder='Full name...'>";
                    //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                    //echo "<input type='date' name='day' placeholder='day'>;
                        
                    ?>
                    <input type='text' name = 'id' value="<?php echo $newid; ?>" placeholder="<?php echo $newid; ?>" readonly>
                    <input type='date' name='day1' placeholder='Start Date...'>
                    <input type='date' name='day2' placeholder='End Date'>  
                    <button type="submit" name="submit2"> Generate Report</button>  
            </form>
            </div>
            <?php

                    
                    
                    






?>


</section>







<button type="submit" name="delete"> Delete My Account </button>
<?php

$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
                    $dBUsername = "admin";
                    $dBPassword = "cosc3380";
                    $dBname = "ZOOSchema";
                    $conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = "UPDATE 'ZOOSchema.users' SET usersName=" .$name.", usersEmail=".$email.", usersUid=".$uid.", usersPwd=".$hashedPwd." where usersId = ".$id." ";

    $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                     echo '<p> Nope </p>';
                    exit();
            
                }
    mysqli_stmt_execute($stmt);

            
    //$query_run = mysqli_query($conn, $sql);
    if($stmt)
    {
        echo '<p> Yes </p>';
        
    }
    else{
        echo '<p> No </p>';
        echo "<p> ID " .$id."</p>";
        echo "<p> Name " .$name."</p>";
        echo "<p> Email " .$_POST['email']."</p>";
        echo "<p> User " .$_POST['uid']."</p>";
        

    }
    mysqli_stmt_close($stmt);
    
}

include_once 'footer.php'

?>