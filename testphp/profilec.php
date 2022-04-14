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
                        User ID:<input type="text" name = id value="<?php echo $row['usersId']; ?>" placeholder="<?php echo $row['usersId']; ?>" readonly>
                Full Name:<input type="text" name="name" placeholder="Full name...">
                Email: <input type="text" name="email" placeholder="email...">
                Username: <input type="text" name="uid" placeholder="Username...">
                Password: <input type="password" name="pwd" placeholder="Password...">
                Repeat Password:<input type="password" name="pwdrepeat" placeholder="Repeat Password...">
                <button type="submit" name="update"> Update </button>

            </form>
            </div>
            <?php

                    }
                    
                






?>
</form></section>
<?php
include_once 'footer.php'

?>