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

<section>
<p> Generate Order History</p>
 


 <div class="signup-form-form">
     
           <form method="get" >
               
               <?php
                   $serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
                   $dBUsername = "admin";
                   $dBPassword = "cosc3380";
                   $dBname = "ZOOSchema";
                   $conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
                   $sql = "SELECT * FROM ZOOSchema.Products;";
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
               
               echo "Tickets: <select name='tickets'>";
                   while($row = mysqli_fetch_array($result)){
                       
                       echo "<option value='" . $row['Pr_Name'] ."'>" . $row['Pr_Name'] ."</option>";
                       
                   }
                   
                   echo "<option value='" . $all ."' placeholder='All'</option>";
                   echo "</select>";
                   
             
                  // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                 //  echo "<input type='text' name='name' placeholder='Full name...'>";
                   //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                   //echo "<input type='date' name='day' placeholder='day'>;
                       
                   ?>
                   User ID: <input type='text' name = 'id' value="<?php echo $newid; ?>" placeholder="<?php echo $newid; ?>" readonly>
                   Start Date: <input type='date' name='day1' placeholder='Start Date...'>
                   End Date: <input type='date' name='day2' placeholder='End Date'> 

                   <button type="submit" name="submit2"> Generate History</button>  
           </form>
           </div>
           <?php

                   
                   
                   






?>

<a = herf="#" onclick="widnow.print();"></a>
<?php
if (isset($_GET['tickets'])){
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
$dep = $_GET['tickets'];
$day1 = $_GET['day1'];
$day2 = $_GET['day2'];
$username1 = $newid;
$s = "SELECT Pr_ID FROM ZOOSchema.Products where Pr_Name = '$dep';";
$stmt1 = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt1, $s))
                {
                    header("location: ../profilec.php?error=stmt1failed");
                    exit();
            
                }

                mysqli_stmt_execute($stmt1);
            
                $result1 = mysqli_stmt_get_result($stmt1);
               
                
                $count = mysqli_num_rows($result1);

                while($row = mysqli_fetch_array($result1)){
                       
                    $tickname = $row["Pr_ID"];
                    
                }

  
                       
                    //echo $tickname.'<br>' SELECT PR_Id, sum(quantity) FROM ZOOSchema.Tickets
//where PR_Id != 1 and PR_Id != 2
//group by PR_Id
//order by sum(quantity) desc;;


//SELECT E_ID, sum(H_Id) FROM ZOOSchema.Hours
//where Date between '04-01-2022' and '04-30-2022'
//group by E_ID;
                    
                
                


$sql = "SELECT * FROM ZOOSchema.Tickets where PR_Id = ? and C_id = ? and date_sold between ? and ?";
$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profile.php?error=stmt1failed");
                    exit();
            
                }

                mysqli_stmt_bind_param($stmt, "ssss", $tickname, $username1, $day1, $day2);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
                
                $count = mysqli_num_rows($result);

            echo "<br/>$count Records Found";
            echo "<table border = '1' align = center'>";

            echo "<tr>";
            echo "<th>Ticket ID</th>";
            echo "<th>Ticket Name</th>";
            echo "<th>Quantity</th>";
            echo "<th>Date</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($result))
            {
            
                echo "<tr>";
                echo "<td>{$row['idTickets']}</td>";
                echo "<td>{$dep}</td>";
                echo "<td>{$row['quantity']}</td>";
                echo "<td>{$row['date_sold']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
            ?>

        

</section>

<section>


</section>









<?php
include_once 'footer.php'

?>