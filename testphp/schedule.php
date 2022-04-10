<?php
include_once 'header.php';
require_once 'includes\dbh.inc.php';

?>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .idtext { width: 50px}
    .nametext {width : 150px}
    .jobtitletext {width : 100px}
    .workhourstext {width : 180px}
    .emailtext {width : 250px}
    .phonenumbertext {width : 120px}
    .worksatstext {width : 120px}
    .worksatastext {width : 120px}
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
            <p> Here is some important information </p>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Job Title</td>
                    <td>Work Hours (Editable)</td>
                    <td>Email Address</td>
                    <td>Phone Number</td>
                    <td>Store Location</td>
                    <td>Animal Section Location</td>
                </tr>

            <?php
            $sql = "SELECT * FROM Employees";
            $result = $conn->query($sql);
            // output data of each row 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<form action="" method = "post"';
                    echo "<tr>";
                    echo '<td> <input type = "text" class = "idtext" value = "'.$row["E_ID"].'" name = "id'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "nametext" value = "'.$row["E_Name"].'" name = "name'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "jobtitletext" value = "'.$row["E_JobTitle"].'" name = "job title'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "workhourstext" value = "'.$row["E_WorkHours"].'" name = "work hours'.$i.'" /> </td>';
                    echo '<td> <input type = "text" class = "emailtext" value = "'.$row["E_Email"].'" name = "email'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "phonenumbertext" value = "'.$row["E_PhoneNumber"].'" name = "phone number'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "worksatstext" value = "'.$row["E_WorksAtS"].'" name = "store location'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "worksatastext" value = "'.$row["E_WorksAtAS"].'" name = "animal section location'.$i.'" readonly /> </td>';
                    /*echo '<td>';
                    echo '<input type = "submit" value ="Update" name = "up_row'.$i.'" />';
                    
                    if (isset($_POST['up_row'.$i.''])) {
                        echo "Hello World";
                        $nID = $_POST['id'.$i.''];
                        $nName = $_POST['name'.$i.''];
                        $nJobTitle = $_POST['job title'.$i.''];
                        $nWorkHours = $_POST['work hours'.$i.''];
                        $nEmail = $_POST['email'.$i.''];
                        $nPhoneNumber = $_POST['phone'.$i.''];
                        $nWorksAtS = $_POST['store location'.$i.''];
                        $nWorksAtAS = $_POST['animal section location'.$i.''];
                        $update = "UPDATE Employee SET E_Name ='$nName', E_JobTitle ='$nJobTitle', E_WorkHours ='$nWorkHours', E_Email ='$nEmail', E_PhoneNumber = '$nPhoneNumber', E_WorksAtS = '$nWorksAtS', E_WorksAtAS = '$nWorksAtAS' WHERE E_ID = '$nID'";
                        $qry = $conn ->query($update);
                        if ($qry == false) {echo "FAIL";} else {
                            header ("location: schedule.php");
                        }
                    }
                    echo '</td>';

                    echo '<td>';
                    echo '<input type = "submit" value = "Delete" name = "del_row'.$i.'" />';

                    if (isset($_POST['del_row'.$i.''])) {
                        $nID = $_POST['id'.$i.''];
                        $delete = "DELETE from Employees WHERE E_ID = '$nID'";
                        $qry = $conn -> query($delete);
                        if ($qry == false) {echo "Failed Delete";} else {
                            header ("location: inventroy.php");
                        }
                    }
                
                echo '</td>';*/
                echo "</tr>";
                echo '</form>';
                $i++;
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
    </section>


    <?php
include_once 'footer.php'

?>
//I'm stealing Jeffery's whole style lol
//Currently standing on the shoulder of giants