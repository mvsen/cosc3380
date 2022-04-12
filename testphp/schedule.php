<?php
include_once 'header.php';
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}
?>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .idtext { width: 60px}
    .nametext {width : 180px}
    .jobtitletext {width : 100px}
    .workhourstext {width : 180px}
    .emailtext {width : 200px}
    .phonenumbertext {width : 120px}
    .worksatstext {width : 180px}
    .worksatastext {width : 180px}
    .addbut {display: block; margin:auto}
</style>

<section class ="index-intro">
        <?php
            if (isset($_SESSION["useruid"]))
            {
                echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
                
            }
            $i = 0
        ?>

        

            <h1> Schedule Page</h1>
            <p> See what employees, from each respective department, is currently on the schedule. Edit pre-existing employees' work hours to accomodate for the Zoo's needs.</p>
            <br>
        <p> Department Schedule - ANIMAL CARE </p>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Job Title</td>
                    <td>Work Hours (Editable)</td>
                    <td>Email Address</td>
                    <td>Phone Number</td>
                    <td>Location</td>
                </tr>

            <?php
            $sql = "SELECT * FROM Employees WHERE E_Department = 'Animal Care'"; //May need to specify departments here
            $result = $conn->query($sql);
            // output data of each row 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<form action="" method = "post"';
                    echo "<tr>";
                    echo '<td> <input type = "text" class = "idtext" value = "'.$row["E_ID"].'" name = "id'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "nametext" value = "'.$row["E_Name"].'" name = "name'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "jobtitletext" value = "'.$row["E_JobTitle"].'" name = "jobtitle'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "workhourstext" value = "'.$row["E_WorkHours"].'" name = "workhours'.$i.'" /> </td>';
                    echo '<td> <input type = "text" class = "emailtext" value = "'.$row["E_Email"].'" name = "email'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "phonenumbertext" value = "'.$row["E_PhoneNumber"].'" name = "phonenumber'.$i.'" readonly /> </td>';
                    if($row["E_WorksAtAS"] != null && $row["E_WorksAtS"] == null)
                    {
                        echo '<td> <input type = "text" class = "worksatastext" value = "'.$row["E_WorksAtAS"].' - Animal Section" name = "animalsection location'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] == null & $row["E_WorksAtS"] != null)
                    {
                        echo '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] != null & $row["E_WorksAtS"] != null)
                    {
                        '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store & '.$row["E_WorksAtAS"].' - Animal Section" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else{echo '<td> <input type = "text" class = "worksatstext" value = "Animal Care Department Building" name = "storelocation'.$i.'" readonly /> </td>';}
                    echo '<td>';
                    echo '<input type = "submit" value ="Update" name = "up_row'.$i.'" />';
                    
                    if (isset($_POST['up_row'.$i.''])) {
                        echo "Hello World";
                        $nID = $_POST['id'.$i.''];
                        $nWorkHours = $_POST['workhours'.$i.''];
                        $update = "UPDATE Employees SET E_WorkHours ='$nWorkHours' WHERE E_ID = '$nID'";
                        $qry = $conn ->query($update);
                        if ($qry === false) {echo "FAIL";} else {
                            header ("location: schedule.php");
                            //echo "Successful Update to: '$nWorkHours'";
                        }
                    }
                    echo '</td>';

                    /*echo '<td>';
                    echo '<input type = "submit" value = "Delete" name = "del_row'.$i.'" />';

                    if (isset($_POST['del_row'.$i.''])) {
                        $nID = $_POST['id'.$i.''];
                        $delete = "DELETE from Employees WHERE E_ID = '$nID'";
                        $qry = $conn -> query($delete);
                        if ($qry == false) {echo "Failed Delete";} else {
                            header ("location: schedule.php");
                        }
                    }
                
                    echo '</td>';*/
                    echo "</tr>";
                    echo '</form>';
                    //$i++;
            }
            /*echo '<form action="" method = "post"';
            echo "<tr>";
            echo '<td> <input type = "text" class = "idtext" name = "newID" readonly /> </td>';
            echo '<td> <input type = "text" class = "nametext" name = "newName" /> </td>';
            echo '<td> <input type = "text" class = "jobtitletext" name = "newJobTitle" /> </td>';
            echo '<td> <input type = "text" class = "workhourstext" name = "newWorkHours" /> </td>';
            echo '<td> <input type = "text" class = "emailtext" name = "newEmail" /> </td>';
            echo '<td> <input type = "text" class = "phonenumbertext" name = "newPhoneNumber" /> </td>';
            echo '<td> <input type = "text" class = "worksatstext" name = "newWorksAtS" /> </td>';
            echo '<td> <input type = "text" class = "worksatastext" name = "newWorksAtAS" /> </td>';
            echo '<td colspan = "2">';
            echo '<input type = "submit" class = "addbut" value = "Add" name = "add" />';
            if (isset($_POST['add'])) {
                $nName = $_POST['newName'];
                $nJobTitle = $_POST['newJobTitle'];
                $nWorkHours = $_POST['newWorkHours'];
                $nEmail = $_POST['newEmail'];
                $nPhoneNumber = $_POST['newPhoneNumber'];
                $nWorksAtS = $_POST['newWorksAtS'];
                $nWorksAtAS = $_POST['newWorksAtAS'];
                if(!$nName or !$JobTitle or !$nWorkHours or !$nEmail or !$nPhoneNumber or !$nWorksAtS or !$nWorksAtAS) {
                    echo "Fill out all forms";
                }
                else {
                    $update = "INSERT into Employees (E_Name, E_JobTitle, E_WorkHours, E_Email, E_PhoneNumber, E_WorksAtS, E_WorksAtAS) values ('$nName', '$nJobTitle', '$nWorkHours', '$nEmail', '$nPhoneNumber', '$nWorksAtS', '$nWorksAtAS')";
                    $qry = $conn ->query($update);
                    if ($qry === false) {echo "Failed Insert";} else {
                        header ("location: schedule.php");
                    }
                }
            }
            echo '</td>';
            echo '</tr>';
            echo '</form>';*/
        }
        /*else { //If no rows in DB only allow to add
            echo '<form action="" method = "post"';
            echo "<tr>";
            echo '<td> <input type = "text" class = "idtext" name = "newID" readonly /> </td>';
            echo '<td> <input type = "text" class = "nametext" name = "newName" /> </td>';
            echo '<td> <input type = "text" class = "jobtitletext" name = "newJobTitle" /> </td>';
            echo '<td> <input type = "text" class = "workhourstext" name = "newWorkHours" /> </td>';
            echo '<td> <input type = "text" class = "emailtext" name = "newEmail" /> </td>';
            echo '<td> <input type = "text" class = "phonenumbertext" name = "newPhoneNumber" /> </td>';
            echo '<td> <input type = "text" class = "worksatstext" name = "newWorksAtS" /> </td>';
            echo '<td> <input type = "text" class = "worksatastext" name = "newWorksAtAS" /> </td>';
            echo '<td colspan = "2">';
            echo '<input type = "submit" class = "addbut" value = "Add" name = "add" />';
            if (isset($_Post['add'])) {
                $nName = $_POST['newName'];
                $nJobTitle = $_POST['newJobtitle'];
                $nWorkHours = $_POST['newWorkHours'];
                $nEmail = $_POST['newEmail'];
                $nPhoneNumber = $_POST['newPhoneNumber'];
                $nWorksAtS = $_POST['newWorksAtS'];
                $nWorksAtAS = $_POST['newWorksAtAS'];
                if(!$nName or !$JobTitle or !$nWorkHours or !$nEmail or !$nPhoneNumber or !$nWorksAtS or !$nWorksAtAS) {
                    echo "Fill out all forms";
                }
                else {
                    $update = "INSERT into Employees (E_Name, E_JobTitle, E_WorkHours, E_Email, E_PhoneNumber, E_WorksAtS, E_WorksAtAS) values ('$nName', '$nJobTitle', '$nWorkHours', '$nEmail', '$nPhoneNumber', '$nWorksAtS', '$nWorksAtAS')";
                    $qry = $conn ->query($update);
                    if ($qry === false) {echo "Failed Insert";} else {
                        header ("location: schedule.php");
                    }
                }
            }
            echo '</td>';
            echo '</tr>';
            echo '</form>';
        }*/
        ?>
        </table>

        <p> Department Schedule - RETAIL </p>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Job Title</td>
                    <td>Work Hours (Editable)</td>
                    <td>Email Address</td>
                    <td>Phone Number</td>
                    <td>Location</td>
                </tr>

            <?php
            $sql = "SELECT * FROM Employees WHERE E_Department = 'Retail'"; //May need to specify departments here
            $result = $conn->query($sql);
            // output data of each row 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<form action="" method = "post"';
                    echo "<tr>";
                    echo '<td> <input type = "text" class = "idtext" value = "'.$row["E_ID"].'" name = "id'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "nametext" value = "'.$row["E_Name"].'" name = "name'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "jobtitletext" value = "'.$row["E_JobTitle"].'" name = "jobtitle'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "workhourstext" value = "'.$row["E_WorkHours"].'" name = "workhours'.$i.'" /> </td>';
                    echo '<td> <input type = "text" class = "emailtext" value = "'.$row["E_Email"].'" name = "email'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "phonenumbertext" value = "'.$row["E_PhoneNumber"].'" name = "phonenumber'.$i.'" readonly /> </td>';
                    if($row["E_WorksAtAS"] != null && $row["E_WorksAtS"] == null)
                    {
                        echo '<td> <input type = "text" class = "worksatastext" value = "'.$row["E_WorksAtAS"].' - Animal Section" name = "animalsection location'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] == null & $row["E_WorksAtS"] != null)
                    {
                        echo '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] != null & $row["E_WorksAtS"] != null)
                    {
                        '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store & '.$row["E_WorksAtAS"].' - Animal Section" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else{echo '<td> <input type = "text" class = "worksatstext" value = "Retail Department Building" name = "storelocation'.$i.'" readonly /> </td>';}
                    echo '<td>';
                    echo '<input type = "submit" value ="Update" name = "up_row'.$i.'" />';
                    
                    if (isset($_POST['up_row'.$i.''])) {
                        echo "Hello World";
                        $nID = $_POST['id'.$i.''];
                        $nWorkHours = $_POST['workhours'.$i.''];
                        $update = "UPDATE Employees SET E_WorkHours ='$nWorkHours' WHERE E_ID = '$nID'";
                        $qry = $conn ->query($update);
                        if ($qry === false) {echo "FAIL";} else {
                            header ("location: schedule.php");
                            //echo "Successful Update to: '$nWorkHours'";
                        }
                    }
                    echo '</td>';
                    echo "</tr>";
                    echo '</form>';
                    //$i++;
            }
        }
        ?>
        </table>

        <p> Department Schedule - POLICE </p>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Job Title</td>
                    <td>Work Hours (Editable)</td>
                    <td>Email Address</td>
                    <td>Phone Number</td>
                    <td>Location</td>
                </tr>

            <?php
            $sql = "SELECT * FROM Employees WHERE E_Department = 'Police'"; //May need to specify departments here
            $result = $conn->query($sql);
            // output data of each row 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<form action="" method = "post"';
                    echo "<tr>";
                    echo '<td> <input type = "text" class = "idtext" value = "'.$row["E_ID"].'" name = "id'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "nametext" value = "'.$row["E_Name"].'" name = "name'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "jobtitletext" value = "'.$row["E_JobTitle"].'" name = "jobtitle'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "workhourstext" value = "'.$row["E_WorkHours"].'" name = "workhours'.$i.'" /> </td>';
                    echo '<td> <input type = "text" class = "emailtext" value = "'.$row["E_Email"].'" name = "email'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "phonenumbertext" value = "'.$row["E_PhoneNumber"].'" name = "phonenumber'.$i.'" readonly /> </td>';
                    if($row["E_WorksAtAS"] != null && $row["E_WorksAtS"] == null)
                    {
                        echo '<td> <input type = "text" class = "worksatastext" value = "'.$row["E_WorksAtAS"].' - Animal Section" name = "animalsection location'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] == null & $row["E_WorksAtS"] != null)
                    {
                        echo '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] != null & $row["E_WorksAtS"] != null)
                    {
                        '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store & '.$row["E_WorksAtAS"].' - Animal Section" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else{echo '<td> <input type = "text" class = "worksatstext" value = "Police Department Building" name = "storelocation'.$i.'" readonly /> </td>';}
                    echo '<td>';
                    echo '<input type = "submit" value ="Update" name = "up_row'.$i.'" />';
                    
                    if (isset($_POST['up_row'.$i.''])) {
                        echo "Hello World";
                        $nID = $_POST['id'.$i.''];
                        $nWorkHours = $_POST['workhours'.$i.''];
                        $update = "UPDATE Employees SET E_WorkHours ='$nWorkHours' WHERE E_ID = '$nID'";
                        $qry = $conn ->query($update);
                        if ($qry === false) {echo "FAIL";} else {
                            header ("location: schedule.php");
                        }
                    }
                    echo '</td>';
                    echo "</tr>";
                    echo '</form>';
                    //$i++;
            }
            
        }
        ?>
        </table>

        <p> Department Schedule - VETERINARY </p>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Job Title</td>
                    <td>Work Hours (Editable)</td>
                    <td>Email Address</td>
                    <td>Phone Number</td>
                    <td>Location</td>
                </tr>

            <?php
            $sql = "SELECT * FROM Employees WHERE E_Department = 'Veterinary'"; //May need to specify departments here
            $result = $conn->query($sql);
            // output data of each row 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<form action="" method = "post"';
                    echo "<tr>";
                    echo '<td> <input type = "text" class = "idtext" value = "'.$row["E_ID"].'" name = "id'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "nametext" value = "'.$row["E_Name"].'" name = "name'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "jobtitletext" value = "'.$row["E_JobTitle"].'" name = "jobtitle'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "workhourstext" value = "'.$row["E_WorkHours"].'" name = "workhours'.$i.'" /> </td>';
                    echo '<td> <input type = "text" class = "emailtext" value = "'.$row["E_Email"].'" name = "email'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "phonenumbertext" value = "'.$row["E_PhoneNumber"].'" name = "phonenumber'.$i.'" readonly /> </td>';
                    if($row["E_WorksAtAS"] != null && $row["E_WorksAtS"] == null)
                    {
                        echo '<td> <input type = "text" class = "worksatastext" value = "'.$row["E_WorksAtAS"].' - Animal Section" name = "animalsection location'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] == null & $row["E_WorksAtS"] != null)
                    {
                        echo '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] != null & $row["E_WorksAtS"] != null)
                    {
                        '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store & '.$row["E_WorksAtAS"].' - Animal Section" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else{echo '<td> <input type = "text" class = "worksatstext" value = "Veterinary Department Building" name = "storelocation'.$i.'" readonly /> </td>';}
                    echo '<td>';
                    echo '<input type = "submit" value ="Update" name = "up_row'.$i.'" />';
                    
                    if (isset($_POST['up_row'.$i.''])) {
                        echo "Hello World";
                        $nID = $_POST['id'.$i.''];
                        $nWorkHours = $_POST['workhours'.$i.''];
                        $update = "UPDATE Employees SET E_WorkHours ='$nWorkHours' WHERE E_ID = '$nID'";
                        $qry = $conn ->query($update);
                        if ($qry === false) {echo "FAIL";} else {
                            header ("location: schedule.php");
                            //echo "Successful Update to: '$nWorkHours'";
                        }
                    }
                    echo '</td>';
                    echo "</tr>";
                    echo '</form>';
                    //$i++;
            }
        }
        ?>
        </table>

        <p> Department Schedule - ATTRACTIONS </p>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Job Title</td>
                    <td>Work Hours (Editable)</td>
                    <td>Email Address</td>
                    <td>Phone Number</td>
                    <td>Location</td>
                </tr>

            <?php
            $sql = "SELECT * FROM Employees WHERE E_Department = 'Attractions'"; //May need to specify departments here
            $result = $conn->query($sql);
            // output data of each row 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<form action="" method = "post"';
                    echo "<tr>";
                    echo '<td> <input type = "text" class = "idtext" value = "'.$row["E_ID"].'" name = "id'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "nametext" value = "'.$row["E_Name"].'" name = "name'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "jobtitletext" value = "'.$row["E_JobTitle"].'" name = "jobtitle'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "workhourstext" value = "'.$row["E_WorkHours"].'" name = "workhours'.$i.'" /> </td>';
                    echo '<td> <input type = "text" class = "emailtext" value = "'.$row["E_Email"].'" name = "email'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "phonenumbertext" value = "'.$row["E_PhoneNumber"].'" name = "phonenumber'.$i.'" readonly /> </td>';
                    if($row["E_WorksAtAS"] != null && $row["E_WorksAtS"] == null)
                    {
                        echo '<td> <input type = "text" class = "worksatastext" value = "'.$row["E_WorksAtAS"].' - Animal Section" name = "animalsection location'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] == null & $row["E_WorksAtS"] != null)
                    {
                        echo '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else if($row["E_WorksAtAS"] != null & $row["E_WorksAtS"] != null)
                    {
                        '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].' - Store & '.$row["E_WorksAtAS"].' - Animal Section" name = "storelocation'.$i.'" readonly /> </td>';
                    }
                    else{echo '<td> <input type = "text" class = "worksatstext" value = "Attraction Department Building" name = "storelocation'.$i.'" readonly /> </td>';}
                    echo '<td>';
                    echo '<input type = "submit" value ="Update" name = "up_row'.$i.'" />';
                    
                    if (isset($_POST['up_row'.$i.''])) {
                        echo "Hello World";
                        $nID = $_POST['id'.$i.''];
                        $nWorkHours = $_POST['workhours'.$i.''];
                        $update = "UPDATE Employees SET E_WorkHours ='$nWorkHours' WHERE E_ID = '$nID'";
                        $qry = $conn ->query($update);
                        if ($qry === false) {echo "FAIL";} else {
                            header ("location: schedule.php");
                            //echo "Successful Update to: '$nWorkHours'";
                        }
                    }
                    echo '</td>';
                    echo "</tr>";
                    echo '</form>';
                    //$i++;
                    
            }
        }
        ?>
        </table>

        <br>
        <p> Work Hours are made up of TWO parts: (Work Days):(Work Shift(Hours))</p>
            <p> Work Days: </p>
            <ul> 
                <li> Sunday - Thursday (Su-Th)</li>
                <li> Wednesday - Sunday (W-Su)</li>
                <li> Friday - Tuesday (F-T)</li>
            </ul>
            <p> Work Shifts: </p>
            <ul>
                <li> Open (6am-2pm)</li>
                <li> Mid (12pm-8pm)</li>
                <li> Close (6pm-2pm)</li>
                <li> Night (12am - 8am)</li>
            </ul>
            <br>

    </section>
    


    <?php
include_once 'footer.php'

//I'm stealing Jeffery's whole style lol
//Currently standing on the shoulder of giants

?>