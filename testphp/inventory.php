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
    .nametext {width : 80px}
    .quantext { width : 70px}
    .costtext {width : 50px}
</style>

<section class ="index-intro">
        <?php
                    if (isset($_SESSION["useruid"]))
                    {
                        echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
                        
                    }
                    $i = 0
        ?>

        

            <h1> This is a Inventory page</h1>
            <p> Here is some importnat information </p>
            <table>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                </tr>
            
            <?php
            $sql = "SELECT * FROM Products";
            $result = $conn->query($sql);
            // output data of each row
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<form action="" method = "post"';
                    echo "<tr>";
                    echo '<td> <input type = "text" class = "idtext" value = "'.$row["Pr_ID"].'" name = "id'.$i.'" readonly /> </td>';
                    echo '<td> <input type = "text" class = "nametext" value = "'.$row["Pr_Name"]. '" name = "name'.$i.'" /> </td>';
                    echo '<td> <input type = "text" class = "quantext" value = "'.$row["Pr_Quantity"].'" name = "quantity'.$i.'" /> </td>';
                    echo '<td> <input type = "text" class = "costtext" value = "'.$row["Pr_Cost"].'" name = "cost'.$i.'" /> </td>';
                    echo '<td>';
                    echo '<input type = "submit" value ="Update" name = "up_row'.$i.'" />';
                    
                    
                    if (isset($_POST['up_row'.$i.''])) {
                        echo "Hello Word";
                        $nID = $_POST['id'.$i.''];
                        $nName = $_POST['name'.$i.''];
                        $nQuan = $_POST['quantity'.$i.''];
                        $nCost = $_POST['cost'.$i.''];
                        $update = "UPDATE Products SET Pr_name ='$nName', Pr_Quantity = '$nQuan', Pr_Cost = '$nCost' WHERE Pr_ID = '$nID'";
                        $qry = $conn ->query($update);
                        if ($qry === false) {echo "FAIL";} else {
                            header ("location: inventory.php");
                        }
                    }
                    echo '</td>';

                    echo '<td>';
                    echo '<input type = "submit" value = "Delete" name = "del_row'.$i.'" />';

                    if (isset($_POST['del_row'.$i.''])) {
                        $nID = $_POST['id'.$i.''];
                        $delete = "DELETE from Products WHERE Pr_ID = '$nID'";
                        $qry = $conn -> query($delete);
                        if ($qry === false) {echo "Failed Delete";} else {
                            header ("location: inventory.php");
                        }
                    }
                    echo '</td>';
                    echo "</tr>";
                    echo '</form>';
                    $i++;
                }
                echo '<form action="" method = "post"';
                echo "<tr>";
                echo '<td> <input type = "text" class = "idtext" name = "newID" readonly /> </td>';
                echo '<td> <input type = "text" class = "nametext" name = "newName" /> </td>';
                echo '<td> <input type = "text" class = "quantext" name = "newQuantity" /> </td>';
                echo '<td> <input type = "text" class = "costtext" name = "newCost" /> </td>';
                echo '<td>';
                echo '<input type = "submit" value = "Add" name = "add" />';
                if (isset($_POST['add'])) {
                    $nName = $_POST['newName'];
                    $nQuan = $_POST['newQuantity'];
                    $nCost = $_POST['newCost'];
                    if (!$nName or !$nQuan or !$nCost) {
                        echo "Fill out all forms";
                    }
                    else {
                        $update = "INSERT into Products (Pr_Name, Pr_Quantity, Pr_Cost) values ('$nName', '$nQuan', '$nCost')";
                        $qry = $conn ->query($update);
                        if ($qry === false) {echo "Failed Insert";} else {
                            header ("location: inventory.php");
                        }
                    }
                }
                echo '</td>';
                echo '</tr>';
                echo '</form>';
              }
              else { //If no rows in DB only allow to add
                echo '<form action="" method = "post"';
                echo "<tr>";
                echo '<td> <input type = "text" class = "idtext" name = "newID" readonly /> </td>';
                echo '<td> <input type = "text" class = "nametext" name = "newName" /> </td>';
                echo '<td> <input type = "text" class = "quantext" name = "newQuantity" /> </td>';
                echo '<td> <input type = "text" class = "costtext" name = "newCost" /> </td>';
                echo '<td>';
                echo '<input type = "submit" value = "Add" name = "add" />';
                if (isset($_POST['add'])) {
                    $nName = $_POST['newName'];
                    $nQuan = $_POST['newQuantity'];
                    $nCost = $_POST['newCost'];
                    if (!$nName or !$nQuan or !$nCost) {
                        echo "Fill out all forms";
                    }
                    else {
                        $update = "INSERT into Products (Pr_Name, Pr_Quantity, Pr_Cost) values ('$nName', '$nQuan', '$nCost')";
                        $qry = $conn ->query($update);
                        if ($qry === false) {echo "Failed Insert";} else {
                            header ("location: inventory.php");
                        }
                    }
                }
                echo '</td>';
                echo '</tr>';
                echo '</form>';
              }
            ?>
            </table>
        </section>


        <?php
include_once 'footer.php'

?>