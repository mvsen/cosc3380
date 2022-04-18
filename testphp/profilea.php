<?php
include_once 'header.php'

?>

<link rel="stylesheet" href="css/style.css">
<section class ="index-intro">


        <H2> Update your information </H2>
 


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
                       User ID: <input type="text" name = id value="<?php echo $row['usersId']; ?>" placeholder="<?php echo $row['usersId']; ?>" readonly>
                Full Name:<input type="text" name="name" placeholder="Full name...">
                Email:<input type="text" name="email" placeholder="email...">
                Username:<input type="text" name="uid" placeholder="Username...">
                Password:<input type="password" name="pwd" placeholder="Password...">
                Repeat Password:<input type="password" name="pwdrepeat" placeholder="Repeat Password...">
                <button type="submit" name="update"> Update </button>

            </form>
            </div>
            <?php

                    }
                    
                






?>
</form></section>


<section id="ABC">

<H2> Admin </H2>
<p> Add Admin Work Hours</p>
 


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
                    header("location: ../profilea.php?error=stmt1failed");
                    exit();
            
                }
                $username1 = $_SESSION['useruid'];
               // mysqli_stmt_bind_param($stmt, "s", $username1);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);

              
            
                //$row = mysqli_fetch_assoc($resultData);
                //print_r($row);
                
                
                echo "Department: <select name='department'>";
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<option value='" . $row['D_Name'] ."'>" . $row['D_Name'] ."</option>";
                        
                    }
                    
                    
                    echo "</select>";
                    
              
                   // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                  //  echo "<input type='text' name='name' placeholder='Full name...'>";
                    //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                    //echo "<input type='date' name='day' placeholder='day'>;
                        
                    ?>
                    User ID :<input type='text' name = 'id' value="<?php echo $newid; ?>" placeholder="<?php echo $newid; ?>" readonly>
                    Hours :<input type='text' name='hours' placeholder='Hours Worked...'>
                    Date : <input type='date' name='day' placeholder='day'>  
                    <button type="submit" name="submit2"> Submit Hours</button>  
            </form>
            </div>
            <?php

                    
                    
                    






?>


</section>


<section>




<p> Delete Admin Work Hours</p>
 


  <div class="signup-form-form">
      
            <form action="includes/profile3.inc.php" method="post" >
                
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
                
                
                echo "Department: <select name='department'>";
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<option value='" . $row['D_Name'] ."'>" . $row['D_Name'] ."</option>";
                        
                    }
                    
                    
                    echo "</select>";
                    
              
                   // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                  //  echo "<input type='text' name='name' placeholder='Full name...'>";
                    //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                    //echo "<input type='date' name='day' placeholder='day'>;
                        
                    ?>
                    User ID :<input type='text' name = 'id' value="<?php echo $newid; ?>" placeholder="<?php echo $newid; ?>" readonly>

                    Date : <input type='date' name='day' placeholder='day'>  
                    <button type="submit" name="submit5"> Delete Hours</button>  
            </form>
            </div>
            <?php

                    
                    
                    






?>


</section>
<section id="ABC">
<p> Generate Admin Work History</p>
 


 <div class="signup-form-form">
     
           <form method="get" >
               
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
               
               echo "Department: <select name='department'>";
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
                   User ID: <input type='text' name = 'id' value="<?php echo $newid; ?>" placeholder="<?php echo $newid; ?>" readonly>
                   Start Date: <input type='date' name='day1' placeholder='Start Date...'>
                   End Date: <input type='date' name='day2' placeholder='End Date'>  
                   <button type="submit" name="submit2"> Generate History</button>  
           </form>
           </div>
           <?php

                   
                   
                   






?>


<?php
if (isset($_GET['department'])){
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
$dep = $_GET['department'];
$day1 = $_GET['day1'];
$day2 = $_GET['day2'];
$username1 = $newid;
$sql = "SELECT * FROM ZOOSchema.Hours where D_Name = ? and E_Id = ? and ZOOSchema.Hours.Date between ? and ?";
$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profile.php?error=stmt1failed");
                    exit();
            
                }

                mysqli_stmt_bind_param($stmt, "ssss", $dep, $username1, $day1, $day2);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
                
                $count = mysqli_num_rows($result);

            echo "<br/>$count Records Found";
            echo "<table border = '1' align = center'>";

            echo "<tr>";
            echo "<th>hours</th>";
            echo "<th>Date</th>";
            echo "<th>E_Id</th>";
            echo "<th>D_Name</th>";
            echo "<th>H_id</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>{$row['hours']}</td>";
                echo "<td>{$row['Date']}</td>";
                echo "<td>{$row['E_Id']}</td>";
                echo "<td>{$row['D_Name']}</td>";
                echo "<td>{$row['H_Id']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
            ?>

        

</section>


<section>

<H2> Employees </H2>

<section id="ABC">
 <H3> Staff</H3>           
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

               $sql2 = "SELECT * FROM ZOOSchema.users;";
               $stmt2 = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt2, $sql2))
           {
               header("location: ../profile.php?error=stmt1failed");
               exit();
       
           }
           $username1 = $_SESSION['useruid'];
          // mysqli_stmt_bind_param($stmt, "s", $username1);
           mysqli_stmt_execute($stmt2);
       
           $result2 = mysqli_stmt_get_result($stmt2);


             
           
               //$row = mysqli_fetch_assoc($resultData);
               //print_r($row);
               $all = "All";




                   
             
                  // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                 //  echo "<input type='text' name='name' placeholder='Full name...'>";
                   //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                   //echo "<input type='date' name='day' placeholder='day'>;
                       
                   ?>
        
    
        <button type="submit" name="submit20"> Show Staff</button>  
           </form>
           </div>
           <?php

                   
                   
                   






?>

<a = herf="#" onclick="widnow.print();"></a>
<?php
if (isset($_GET['submit20'])){
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);


    $sql = "SELECT * FROM ZOOSchema.users where usersRank = 'employee';";


$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profilea.php?error=stmt1failed");
                    exit();
            
                }

               
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
              

                
                


  
                
            $count = mysqli_num_rows($result);

        echo "<br/>$count Records Found";
        echo "<table border = '1' align = center'>";

        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Name</th>";
        echo "<th>User Name</th>";
        echo "<th>Email</th>";
        echo "</tr>";

        while($row = mysqli_fetch_array($result))
        {
        
            echo "<tr>";
            echo "<td>{$row['usersId']}</td>";
            echo "<td>{$row['usersName']}</td>";
            echo "<td>{$row['usersUid']}</td>";
            echo "<td>{$row['usersEmail']}</td>";
            echo "</tr>";
        }
        echo "</table>";
           
          
        }
            ?>

</section>
<p> Add Employee Work Hours</p>
 


  <div class="signup-form-form">
      
            <form action="includes/profile4.inc.php" method="post" >
                
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


                $sql2 = "SELECT * FROM ZOOSchema.users where usersRank = 'employee';";
                $stmt2 = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt2, $sql2))
            {
                header("location: ../profile.php?error=stmt1failed");
                exit();
        
            }
            $username1 = $_SESSION['useruid'];
           // mysqli_stmt_bind_param($stmt, "s", $username1);
            mysqli_stmt_execute($stmt2);
        
            $result2 = mysqli_stmt_get_result($stmt2);


              
            
                //$row = mysqli_fetch_assoc($resultData);
                //print_r($row);
                
                
                echo "Department: <select name='department2'>";
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<option value='" . $row['D_Name'] ."'>" . $row['D_Name'] ."</option>";
                        
                    }
                    
                    
                    echo "</select>";

                    echo "User ID: <select name='id'>";
                    while($row2 = mysqli_fetch_array($result2)){
                        
                        echo "<option value='" . $row2['usersId'] ."'>" . $row2['usersId'] ."</option>";
                        
                    }
                    
                    
                    echo "</select>";
                    

                    
              
                   // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                  //  echo "<input type='text' name='name' placeholder='Full name...'>";
                    //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                    //echo "<input type='date' name='day' placeholder='day'>;
                        
                    ?>
                   
                    Hours :<input type='text' name='hours' placeholder='Hours Worked...'>
                    Date : <input type='date' name='day' placeholder='day'>  
                    <button type="submit" name="submit4"> Submit Hours</button>  
            </form>
            </div>
            <?php

                    
                    
                    






?>


</section>
<p> Delete Employee Work Hours</p>
 


  <div class="signup-form-form">
      
            <form action="includes/profile3.inc.php" method="post" >
                
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


                $sql2 = "SELECT * FROM ZOOSchema.users where usersRank = 'employee';";
                $stmt2 = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt2, $sql2))
            {
                header("location: ../profile.php?error=stmt1failed");
                exit();
        
            }
            $username1 = $_SESSION['useruid'];
           // mysqli_stmt_bind_param($stmt, "s", $username1);
            mysqli_stmt_execute($stmt2);
        
            $result2 = mysqli_stmt_get_result($stmt2);


              
            
                //$row = mysqli_fetch_assoc($resultData);
                //print_r($row);
                
                
                echo "Department: <select name='department2'>";
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<option value='" . $row['D_Name'] ."'>" . $row['D_Name'] ."</option>";
                        
                    }
                    
                    
                    echo "</select>";

                    echo "User ID: <select name='id'>";
                    while($row2 = mysqli_fetch_array($result2)){
                        
                        echo "<option value='" . $row2['usersId'] ."'>" . $row2['usersId'] ."</option>";
                        
                    }
                    
                    
                    echo "</select>";
              
                   // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                  //  echo "<input type='text' name='name' placeholder='Full name...'>";
                    //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                    //echo "<input type='date' name='day' placeholder='day'>;
                        
                    ?>
                    
                    Date : <input type='date' name='day' placeholder='day'>  
                    <button type="submit" name="submit5"> Delete Hours</button>  
            </form>
            </div>
            <?php

                    
                    
                    






?>


</section>





<section>





</section>






<section>
<p> Generate Employee Work History</p>
 


 <div class="signup-form-form">
     
           <form method="get" >
               
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

               $sql2 = "SELECT * FROM ZOOSchema.users where usersRank = 'employee';";
               $stmt2 = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt2, $sql2))
           {
               header("location: ../profile.php?error=stmt1failed");
               exit();
       
           }
           $username1 = $_SESSION['useruid'];
          // mysqli_stmt_bind_param($stmt, "s", $username1);
           mysqli_stmt_execute($stmt2);
       
           $result2 = mysqli_stmt_get_result($stmt2);


             
           
               //$row = mysqli_fetch_assoc($resultData);
               //print_r($row);
               $all = "All";
               
               echo "Department: <select name='department2'>";
                   while($row = mysqli_fetch_array($result)){
                       
                       echo "<option value='" . $row['D_Name'] ."'>" . $row['D_Name'] ."</option>";
                       
                   }
                   
                   echo "<option value='" . $all ."' placeholder='All'</option>";
                   echo "</select>";

                   echo "User ID: <select name='id'>";
                   while($row2 = mysqli_fetch_array($result2)){
                       
                       echo "<option value='" . $row2['usersId'] ."'>" . $row2['usersId'] ."</option>";
                       
                   }
                   
                   
                   echo "</select>";
                   
             
                  // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                 //  echo "<input type='text' name='name' placeholder='Full name...'>";
                   //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                   //echo "<input type='date' name='day' placeholder='day'>;
                       
                   ?>
                  
                   Start Date: <input type='date' name='day1' placeholder='Start Date...'>
                   End Date: <input type='date' name='day2' placeholder='End Date'>  
                   <button type="submit" name="submit2"> Generate History</button>  
           </form>
           </div>
           <?php

                   
                   
                   






?>

<a = herf="#" onclick="widnow.print();"></a>
<?php
if (isset($_GET['department2'])){
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
$dep = $_GET['department2'];
$day1 = $_GET['day1'];
$day2 = $_GET['day2'];
$username1 = $_GET['id'];;
$sql = "SELECT * FROM ZOOSchema.Hours where D_Name = ? and E_Id = ? and ZOOSchema.Hours.Date between ? and ?";
$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profile.php?error=stmt1failed");
                    exit();
            
                }

                mysqli_stmt_bind_param($stmt, "ssss", $dep, $username1, $day1, $day2);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
                
                $count = mysqli_num_rows($result);

            echo "<br/>$count Records Found";
            echo "<table border = '1' align = center'>";

            echo "<tr>";
            echo "<th>hours</th>";
            echo "<th>Date</th>";
            echo "<th>E_Id</th>";
            echo "<th>D_Name</th>";
            echo "<th>H_id</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>{$row['hours']}</td>";
                echo "<td>{$row['Date']}</td>";
                echo "<td>{$row['E_Id']}</td>";
                echo "<td>{$row['D_Name']}</td>";
                echo "<td>{$row['H_Id']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
            ?>

        

</section>


<section id="ABC">
<H2> All</H2>
<p> Generate All Work History</p>
 


 <div class="signup-form-form">
     
           <form method="get" >
               
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

               $sql2 = "SELECT * FROM ZOOSchema.users;";
               $stmt2 = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt2, $sql2))
           {
               header("location: ../profile.php?error=stmt1failed");
               exit();
       
           }
           $username1 = $_SESSION['useruid'];
          // mysqli_stmt_bind_param($stmt, "s", $username1);
           mysqli_stmt_execute($stmt2);
       
           $result2 = mysqli_stmt_get_result($stmt2);


             
           
               //$row = mysqli_fetch_assoc($resultData);
               //print_r($row);
               $all = "All";
               
               echo "Department: <select name='department3'>";
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
                  
                   Start Date: <input type='date' name='day1' placeholder='Start Date...'>
                   End Date: <input type='date' name='day2' placeholder='End Date'>  
                   <button type="submit" name="submit2"> Generate History</button>  
           </form>
           </div>
           <?php

                   
                   
                   






?>

<a = herf="#" onclick="widnow.print();"></a>
<?php
if (isset($_GET['department3'])){
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
$dep = $_GET['department3'];
$day1 = $_GET['day1'];
$day2 = $_GET['day2'];
$username1 = $_GET['id'];;
$sql = "SELECT * FROM ZOOSchema.Hours where D_Name = ? and ZOOSchema.Hours.Date between ? and ?";
$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profile.php?error=stmt1failed");
                    exit();
            
                }

                mysqli_stmt_bind_param($stmt, "sss", $dep, $day1, $day2);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
                
                $count = mysqli_num_rows($result);

            echo "<br/>$count Records Found";
            echo "<table border = '1' align = center'>";

            echo "<tr>";
            echo "<th>hours</th>";
            echo "<th>Date</th>";
            echo "<th>E_Id</th>";
            echo "<th>D_Name</th>";
            echo "<th>H_id</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>{$row['hours']}</td>";
                echo "<td>{$row['Date']}</td>";
                echo "<td>{$row['E_Id']}</td>";
                echo "<td>{$row['D_Name']}</td>";
                echo "<td>{$row['H_Id']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
            ?>

        

</section>




<H2> Reports</H2>
<H3> Work History</H3>
 


 <div class="signup-form-form">
     
           <form method="get" >
               
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

               $sql2 = "SELECT * FROM ZOOSchema.users;";
               $stmt2 = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt2, $sql2))
           {
               header("location: ../profile.php?error=stmt1failed");
               exit();
       
           }
           $username1 = $_SESSION['useruid'];
          // mysqli_stmt_bind_param($stmt, "s", $username1);
           mysqli_stmt_execute($stmt2);
       
           $result2 = mysqli_stmt_get_result($stmt2);


             
           
               //$row = mysqli_fetch_assoc($resultData);
               //print_r($row);
               $all = "All";
               
               echo "Type: <select name='type'>";
               echo "<option value='least'>Worked the Least</option>";
               echo "<option value='most'>Worked the Most</option>";
               echo "</select>";

               echo "Department: <select name='department6'>";
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
                  
                   Start Date: <input type='date' name='day1' placeholder='Start Date...'>
                   End Date: <input type='date' name='day2' placeholder='End Date'>  
                   <button type="submit" name="submit2"> Generate History</button>  
           </form>
           </div>
           <?php

                   
                   
                   






?>

<a = herf="#" onclick="widnow.print();"></a>
<?php
if (isset($_GET['type'])){
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
$type = $_GET['type'];
$dep= $_GET['department6'];
$day1 = $_GET['day1'];
$day2 = $_GET['day2'];
$username1 = $_GET['id'];
if ($type == "most")
{
    $sql = "SELECT sum(hours), E_Id FROM ZOOSchema.Hours
where D_Name = ? and ZOOSchema.Hours.Date between ? and ? 
group by E_Id
order by sum(hours)desc;";
}
else{
    $sql = "SELECT sum(hours), E_Id FROM ZOOSchema.Hours
    where D_Name = ? and ZOOSchema.Hours.Date between ? and ? 
    group by E_Id
    order by sum(hours)asc;";
}

$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profilea.php?error=stmt1failed");
                    exit();
            
                }

                mysqli_stmt_bind_param($stmt, "sss", $dep, $day1, $day2);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_array($result);
                $temp = $row['E_Id'];

                $s = "SELECT usersName FROM ZOOSchema.users where usersId = ?;";
                $stmt1 = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt1, $s))
                {
                    header("location: ../profilea.php?error=stmt1failed");
                    exit();
            
                }

                mysqli_stmt_bind_param($stmt1, "s", $temp);
                mysqli_stmt_execute($stmt1);
            
                $result1 = mysqli_stmt_get_result($stmt1);
                $row1 = mysqli_fetch_array($result1);
                $n = $row1['usersName'];
                
                

            if ($type == "Worked the Most")
            {
                echo"<br/> " . $n . "," . $row['E_Id'] . ",worked the most!";
            }
            else{
                echo"<br/> " . $n. "," . $row['E_Id'] . ",worked the least!";
            }
           
          
        }
            ?>
            </section>
            <section>
 <H3> Ride History</H3>           
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

               $sql2 = "SELECT * FROM ZOOSchema.users;";
               $stmt2 = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt2, $sql2))
           {
               header("location: ../profile.php?error=stmt1failed");
               exit();
       
           }
           $username1 = $_SESSION['useruid'];
          // mysqli_stmt_bind_param($stmt, "s", $username1);
           mysqli_stmt_execute($stmt2);
       
           $result2 = mysqli_stmt_get_result($stmt2);


             
           
               //$row = mysqli_fetch_assoc($resultData);
               //print_r($row);
               $all = "All";

            
               
               echo "Type: <select name='type3'>";
               echo "<option value='least'>Least Purchased Voucher</option>";
               echo "<option value='most'>Most Purchased Voucher </option>";
               echo "</select>";



                   
             
                  // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                 //  echo "<input type='text' name='name' placeholder='Full name...'>";
                   //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                   //echo "<input type='date' name='day' placeholder='day'>;
                       
                   ?>
        
    
        <button type="submit" name="submit2"> Generate History</button>  
           </form>
           </div>
           <?php

                   
                   
                   






?>

<a = herf="#" onclick="widnow.print();"></a>
<?php
if (isset($_GET['type3'])){
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
$type = $_GET['type3'];

if ($type == "least")
{
    $sql = "SELECT Products.Pr_Name as 'Name', Products.PR_Quantity as 'Inventory Left', Pr_Cost as 'Cost', sum(Tickets.quantity) as 'Quantity Purchased', (Pr_Cost*sum(Tickets.quantity)) as 'Revenue'
    FROM ZOOSchema.Products
    Left join Tickets on Products.Pr_ID = Tickets.PR_Id
    where Products.PR_ID != 1 and Products.PR_ID != 2
    group by Pr_Name
    order by sum(Tickets.quantity) asc;";
}
else{
    $sql = "SELECT Products.Pr_Name as 'Name', Products.PR_Quantity as 'Inventory Left', Pr_Cost as 'Cost', sum(Tickets.quantity) as 'Quantity Purchased', (Pr_Cost*sum(Tickets.quantity)) as 'Revenue'
    FROM ZOOSchema.Products
    Left join Tickets on Products.Pr_ID = Tickets.PR_Id
    where Products.PR_ID != 1 and Products.PR_ID != 2
    group by Pr_Name
    order by sum(Tickets.quantity) desc;";
}

$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profilea.php?error=stmt1failed");
                    exit();
            
                }

               
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
              

                
                


  
                
            $count = mysqli_num_rows($result);

        echo "<br/>$count Records Found";
        echo "<table border = '1' align = center'>";

        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Inventory Left</th>";
        echo "<th>Cost</th>";
        echo "<th>Quantity Purchased</th>";
        echo "<th>Revenue</th>";
        echo "</tr>";

        while($row = mysqli_fetch_array($result))
        {
        
            echo "<tr>";
            echo "<td>{$row['Name']}</td>";
            echo "<td>{$row['Inventory Left']}</td>";
            echo "<td>{$row['Cost']}</td>";
            echo "<td>{$row['Quantity Purchased']}</td>";
            echo "<td>{$row['Revenue']}</td>";
            echo "</tr>";
        }
        echo "</table>";
           
          
        }
            ?>

</section>
<section>
 <H3> Ticket History</H3>           
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

               $sql2 = "SELECT * FROM ZOOSchema.users;";
               $stmt2 = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt2, $sql2))
           {
               header("location: ../profile.php?error=stmt1failed");
               exit();
       
           }
           $username1 = $_SESSION['useruid'];
          // mysqli_stmt_bind_param($stmt, "s", $username1);
           mysqli_stmt_execute($stmt2);
       
           $result2 = mysqli_stmt_get_result($stmt2);


             
           
               //$row = mysqli_fetch_assoc($resultData);
               //print_r($row);
               $all = "All";

            
               
               echo "Type: <select name='type2'>";
               echo "<option value='least'>Least Busiest Day</option>";
               echo "<option value='most'>Most Busiest Day</option>";
               echo "</select>";



                   
             
                  // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                 //  echo "<input type='text' name='name' placeholder='Full name...'>";
                   //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                   //echo "<input type='date' name='day' placeholder='day'>;
                       
                   ?>
        
    
        <button type="submit" name="submit2"> Generate History</button>  
           </form>
           </div>
           <?php

                   
                   
                   






?>

<a = herf="#" onclick="widnow.print();"></a>
<?php
if (isset($_GET['type2'])){
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
$type = $_GET['type2'];

if ($type == "least")
{
    $sql = "SELECT sum(quantity) as 'Number of Tickets',
    CASE WHEN dayofweek(date_sold) = 6 THEN 'Friday'
    WHEN dayofweek(date_sold) = 5 THEN 'Thursday'
    WHEN dayofweek(date_sold) = 4 THEN 'Wednesday'
    WHEN dayofweek(date_sold) = 3 THEN 'Tuesday'
    WHEN dayofweek(date_sold) = 2 THEN 'Monday'
    WHEN dayofweek(date_sold) = 7 THEN 'Saturday'
    ELSE 'Sunday'
    END AS Day
    FROM ZOOSchema.Tickets
    where date_sold !='0000-00-00 00:00:00' and (PR_Id = 1 or PR_Id =2)
    group by Day
    order by sum(quantity)  asc;";
}
else{
    $sql = "SELECT sum(quantity) as 'Number of Tickets',
    CASE WHEN dayofweek(date_sold) = 6 THEN 'Friday'
    WHEN dayofweek(date_sold) = 5 THEN 'Thursday'
    WHEN dayofweek(date_sold) = 4 THEN 'Wednesday'
    WHEN dayofweek(date_sold) = 3 THEN 'Tuesday'
    WHEN dayofweek(date_sold) = 2 THEN 'Monday'
    WHEN dayofweek(date_sold) = 7 THEN 'Saturday'
    ELSE 'Sunday'
    END AS Day
    FROM ZOOSchema.Tickets
    where date_sold !='0000-00-00 00:00:00' and (PR_Id = 1 or PR_Id =2)
    group by Day
    order by sum(quantity)  desc;";
}

$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profilea.php?error=stmt1failed");
                    exit();
            
                }

               
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
              
                $temp = $row1['Day'];

                
                


  
                
            $count = mysqli_num_rows($result);

        echo "<br/>$count Records Found";
        echo "<table border = '1' align = center'>";

        echo "<tr>";
        echo "<th>Ticket Quantity</th>";
        echo "<th>Day of the Week</th>";
        echo "</tr>";

        while($row = mysqli_fetch_array($result))
        {
        
            echo "<tr>";
            echo "<td>{$row['Number of Tickets']}</td>";
            echo "<td>{$row['Day']}</td>";
            echo "</tr>";
        }
        echo "</table>";
           
          
        }
            ?>

</section>

<p> Profits from admission and vouchers within a given time frame </p>
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

               $sql2 = "SELECT * FROM ZOOSchema.users;";
               $stmt2 = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt2, $sql2))
           {
               header("location: ../profile.php?error=stmt1failed");
               exit();
       
           }
           $username1 = $_SESSION['useruid'];
          // mysqli_stmt_bind_param($stmt, "s", $username1);
           mysqli_stmt_execute($stmt2);
       
           $result2 = mysqli_stmt_get_result($stmt2);


             
           
               //$row = mysqli_fetch_assoc($resultData);
               //print_r($row);
               $all = "All";

            
               



                   
             
                  // echo "<input type='text' name = 'id' value='". $newid." placeholder='". $newid." readonly>";
                 //  echo "<input type='text' name='name' placeholder='Full name...'>";
                   //echo "<input type='text' name='hours' placeholder='Hours Worked...'>";
                   //echo "<input type='date' name='day' placeholder='day'>;
                       
                   ?>
                           Start Date: <input type='date' name='day1' placeholder='Start Date...'>
                   End Date: <input type='date' name='day2' placeholder='End Date'> 
    
        <button type="submit" name="submit7"> Generate Report</button>  
           </form>
           </div>
           <?php

                   
                   
                   






?>

<a = herf="#" onclick="widnow.print();"></a>
<?php
if (isset($_GET['submit7'])){
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);

$day1 = $_GET['day1'];
$day2 = $_GET['day2'];


    $sql = "SELECT Products.Pr_Name as 'Name', Products.PR_Quantity as 'Inventory Left', Pr_Cost as 'Cost', sum(Tickets.quantity) as 'Quantity Purchased', (Pr_Cost*sum(Tickets.quantity)) as 'Revenue',   SUM((Pr_Cost*sum(Tickets.quantity))) OVER(ORDER BY  Pr_Cost
    ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) 
         AS RunningTotal
   FROM ZOOSchema.Products
   Left join Tickets on Products.Pr_ID = Tickets.PR_Id
   where Tickets.date_sold between '?' and '?'
   group by Pr_Name;
";



$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../profilea.php?error=stmt1failed");
                    exit();
            
                }

               mysqli_stmt_bind_param($stmt, "ss", $day1, $day2);
                mysqli_stmt_execute($stmt);
            
                $result = mysqli_stmt_get_result($stmt);
              


                
                


  
                
            $count = mysqli_num_rows($result);

        echo "<br/>$count Records Found";
        echo "<table border = '1' align = center'>";

        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Inventory Left</th>";
        echo "<th>Cost</th>";
        echo "<th>Quantity Purchased</th>";
        echo "<th>Revenue</th>";
        echo "<th>Running Total</th>";
        echo "</tr>";

        while($row = mysqli_fetch_array($result))
        {
        
            echo "<tr>";
            echo "<td>{$row['Name']}</td>";
            echo "<td>{$row['Inventory Left']}</td>";
            echo "<td>{$row['Cost']}</td>";
            echo "<td>{$row['Quantity Purchased']}</td>";
            echo "<td>{$row['Revenue']}</td>";
            echo "<td>{$row['RunningTotal']}</td>";
            echo "</tr>";
        }
        echo "</table>";
           
          
        }
            ?>

</section>







<?php















include_once 'footer.php'

?>