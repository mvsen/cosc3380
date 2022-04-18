<?php
include_once 'header.php';

?>
<html>
<link rel="stylesheet" href="css/style.css">
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<div class = "container">
<section class ="index-intro">
   <h1> This is a Staff page </h1>
      <h2> Add an Employee</h2>
      <div class="add-employee-form-form">
      <form action="includes/staff.inc.php" method="post" >
      <input type="text" name="name" placeholder="Full name..." >
         <input type="date" name="birthday" placeholder="DOB YYYY-MM-DD" min="1901-01-01" >
         <select name="gender" id="gender" >
            <option value=''>Gender</option>
            <option value="Female">Female</option>
            <option value="Male">Male</option>
         </select>
         <input type="tel" id="phone" name="phone" placeholder="Phone Number XXX-XXX-XXXX" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >
         <input type="text" name="address" placeholder="Street, City, State, Zipcode" >
         <p> Create Account for Employee </p>
         <input type="text" name="email" placeholder="email..." >
         <input type="text" name="uid" placeholder="Username..." >
         <input type="password" name="pwd" placeholder="Password..." >
         <input type="password" name="pwdrepeat" placeholder="Repeat Password..." >
         <p> Job Description </p>                
         <input type="text" name="wage" placeholder="Wage ($/hr)" >
         <input type="text" name="job_title" placeholder="Job Title" >
         <input type="text" name="workHours" placeholder="Work Hours" >
               
<?php
         $serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
         $dBUsername = "admin";
         $dBPassword = "cosc3380";
         $dBname = "ZOOSchema";
         $conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
         $sql = "SELECT * FROM ZOOSchema.Departments;";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../staff.php?error=stmt1failed");
            exit();
         }
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         echo "<select name='department'>";
         echo "<option value=''>Select a Department</option>";
         while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['D_Name'] ."'>" . $row['D_Name'] ."</option>";
         }
         echo "</select>";
?> 
<?php
         $serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
         $dBUsername = "admin";
         $dBPassword = "cosc3380";
         $dBname = "ZOOSchema";
         $conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
         $sql = "SELECT * FROM ZOOSchema.Location;";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../staff.php?error=stmt1failed");
            exit();
         }
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         echo "<select name='worksat'>";
         echo "<option value='' disabled selected>Select a Location</option>";
         while($row = mysqli_fetch_array($result)){
            echo "<option value='" . $row['LO_Name'] ."'>" . $row['LO_Name'] ."</option>";
         }
         echo "</select>";
?> 
         <div class="form-group">
                  <label class="col-lg-2 control-label"></label>
                     <div class="col-lg-4">
                     <input type="submit" name="submit" class="form-control">
                     </div>
               </div> 
      </form>
      </div>
      </div>
<?php
if (isset($_GET["error"]))
{
    if($_GET["error"] == "emptyinput")
    {
       echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "invaliduid")
    {
       echo "<p>Choose a proper username!</p>";
    }
    else if ($_GET["error"] == "invalidemail")
    {
       echo "<p>Choose a proper email!</p>";
    }
    else if ($_GET["error"] == "passwordsdontmatch")
    {
       echo "<p>Make sure passwords match!!</p>";
    }
    else if ($_GET["error"] == "smtm1failed")
    {
       echo "<p>Something went wrong, try again.</p>";
    }
    else if ($_GET["error"] == "smtm2failed")
    {
       echo "<p>Something went wrong, try again.</p>";
    }
    else if ($_GET["error"] == "usernametaken")
    {
       echo "<p>Username already taken. Try something else.</p>";
    }
    else if ($_GET["error"] == "invalidBDay")
    {
       echo "<p>Invalid birthday. Try again.</p>";
    }
    else if ($_GET["error"] == "none")
    {
       echo "<p>You have succesfully signed the employee up!</p>";
    }
    
} 
   
?> 
</section>

<section id="ABC">
<html>
      <div class="container">
         <h2>Request Information about the Employees</h2>
         <div class="row">
            <form class="form-horizontal" action="staff.php" method="post">
               <div class="form-group">
                  <label class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-4">
                     <input type="text" class="form-control" name="Name">
                  </div>
               </div>

               <div class="form-group">
                  <label class="col-lg-2 control-label">Gender</label>
                     <div class="col-lg-4">
                        <select name="Gender">
                           <option value="">Select a Gender</option>
                           <option value='Female'>Female</option>
                           <option value='Male'>Male</option>
                        </select>
                     </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-2 control-label">Birthday Month</label>
                  <div class="col-lg-4">
                  <input type="number" name="Month"  min="1" max="12" class="form-control">
                  </div>
               </div>

               <div class="form-group">
                  <label class="col-lg-2 control-label">Department</label>
                     <div class="col-lg-4">
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
                header("location: ../staff.php?error=stmt1failed");
                exit();
                }
                mysqli_stmt_execute($stmt);
        
                $result = mysqli_stmt_get_result($stmt);
                     echo "<select name='Department'>";
                     echo "<option value=''>Select a Department</option>";
                        while($row = mysqli_fetch_array($result)){
         
                        echo "<option value='" . $row['D_Name'] ."'>" . $row['D_Name'] ."</option>";
                     }
                     echo "</select>";
?>
                     </div>
               </div>


               <div class="form-group">
                  <label class="col-lg-2 control-label">Works At</label>
                     <div class="col-lg-4">
<?php
                     $serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
                     $dBUsername = "admin";
                     $dBPassword = "cosc3380";
                     $dBname = "ZOOSchema";
                     $conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
                     $sql = "SELECT * FROM ZOOSchema.Location;";
                     $stmt = mysqli_stmt_init($conn);
                     if (!mysqli_stmt_prepare($stmt, $sql)){
                     header("location: ../staff.php?error=stmt1failed");
                     exit();
                     }
                     mysqli_stmt_execute($stmt);
        
                     $result = mysqli_stmt_get_result($stmt);
                     echo "<select name='WorksAt'>";
                     echo "<option value=''>Select a Location</option>";
                     while($row = mysqli_fetch_array($result)){
                        echo "<option value='" . $row['LO_Name'] ."'>" . $row['LO_Name'] ."</option>";
                     }
                     echo "</select>";
?>
                     </div>
               </div>

               <div class="form-group">
                  <label class="col-lg-2 control-label"></label>
                     <div class="col-lg-4">
                     <input type="submit" name="Submit" class="form-control">
                     </div>
               </div> 

            </form>
         </div>
<style type="text/css">
        table {
            border: 1px solid rgb(0,0,0);
            width: 100%;
        }
        table > thead > tr > th {
            font-size: 2em;
            border: 1px solid rgb(0,0,0);
        }
        table > tbody > tr > td {
            color: rgb(0,0,0);

        }
</style>
            <div class="row">
               <table class="table table-striped table-hover">
                  <thread>
                     <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Gender</th>
                        <th>Birthday</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Works At</th>
                     </tr>
                  </thread>
               <tbody>
<?php
               $serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
               $dBUsername = "admin";
               $dBPassword = "cosc3380";
               $dBname = "ZOOSchema";
               $conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
                  if(isset($_POST['Submit'])) {
                     
                     $Name = $_POST['Name'];
                     $Gender = $_POST['Gender'];
                     $Month = $_POST['Month'];
                     $Department = $_POST['Department'];
                     $WorksAt = $_POST['WorksAt'];
                     
                     if($Name != "" || $Gender !="" || $Month != "" || $Department != "" || $WorksAt != "") {
                        
                        $query = "SELECT * FROM ZOOSchema.Employees WHERE E_Name ='$Name' OR E_Gender = '$Gender' OR MONTH(E_Birthdate)='$Month'  OR E_Department = '$Department' OR E_Location = '$WorksAt'";
                        $data = mysqli_query($conn, $query) or die('error');
                        
                        if(mysqli_num_rows($data) > 0 ) {
                           while($row = mysqli_fetch_assoc($data)) {
                              $ID1 = $row['E_ID'];
                              $Name1 = $row['E_Name'];
                              $Gender1 = $row['E_Gender'];
                              $Month1 = $row['E_Birthdate'];
                              $pnumber1 = $row['E_PhoneNumber'];
                              $Email1 = $row['E_Email'];
                              $Department1 = $row['E_Department'];
                              $WorksAt1 = $row['E_Location'];
?>                       
                              <tr>
                                 <td width: 40%><?php echo $ID1;?></td>
                                 <td width: 40%><?php echo $Name1;?></td>
                                 <td width: 40%><?php echo $Gender1;?></td>
                                 <td width: 40%><?php echo $Month1;?></td>
                                 <td width: 40%><?php echo $pnumber1;?></td>
                                 <td width: 40%><?php echo $Email1;?></td>
                                 <td width: 40%><?php echo $Department1;?></td>
                                 <td width: 40%><?php echo $WorksAt1;?></td>
                              </tr>
<?php
                            }
                        }
                        else {
?>
                           <tr>
                              <td>'Records Not Found!'</td>;
                           </tr>
<?php
                        }
                     }
                  }
?>
               </tbody>
               </table>
         </div>
      </div>
               </body>
               </section>

               </section>
 </html>  
               </section>            
<?php
include_once 'footer.php';
?>
