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
    .nidtext {width : 100px}
    .pidtext {width : 100px}
    .counttext {width : 100px}
    .timetext {width : 150px}
    .messagetext {width : 700px}
    .addbut {display: block; margin:auto}
</style>

<section class ="index-intro">
        <?php
            if (isset($_SESSION["useruid"]))
            {
                echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
                
            }
            $i = 1;
        ?>

            <h1> Notification Page</h1>
            <p> Database communications to supervisors of notable data modification events. </p>
            <br>

            <p> Messages: </p>
            <table>
                <tr>
                    <td>Notification ID</td>
                    <td>Product ID</td>
                    <td>Product Count</td>
                    <td>Time</td>
                    <td>Message</td>
                </tr>

                <?php
                $sql = "SELECT * FROM Notifications";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        echo '<form action="" method = "post"';
                        echo "<tr>";
                        echo '<td> <input type = "text" class = "nidtext" value = "'.$row["N_ID"].'" name = "nid'.$i.'" readonly /> </td>';
                        echo '<td> <input type = "text" class = "pidtext" value = "'.$row["Product_ID"].'" name = "pid'.$i.'" readonly /> </td>';
                        echo '<td> <input type = "text" class = "counttext" value = "'.$row["N_ProductCount"].'" name = "count'.$i.'" readonly /> </td>';
                        echo '<td> <input type = "text" class = "timetext" value = "'.$row["N_Time"].'" name = "time'.$i.'" readonly /> </td>';
                        echo '<td> <input type = "text" class = "messagetext" value = "'.$row["N_Message"].'" name = "message'.$i.'" readonly /> </td>';
                        echo '<td>';
                        echo '<input type = "submit" value = "Delete" name = "del_row'.$i.'" />';

                        if (isset($_POST['del_row'.$i.''])) {
                            $nID = $_POST['nid'.$i.''];
                            $delete = "DELETE from Notifications WHERE N_ID = '$nID'";
                            $qry = $conn -> query($delete);
                            if ($qry === false) {echo "Failed Delete";} else {
                                header ("location: notification.php");
                            }
                        }
                        echo "</td>";
                        echo "</tr>";
                        echo '</form>';
                        //$i++;
                    }
                }
                ?>
            </table>

    <?php
include_once 'footer.php'
?>