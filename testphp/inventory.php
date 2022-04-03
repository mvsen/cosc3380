<?php
include_once 'header.php';
require_once 'includes\dbh.inc.php';

?>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<section class ="index-intro">
        <?php
                    if (isset($_SESSION["useruid"]))
                    {
                        echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
                        
                    }
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
                    echo "<tr>";
                    echo "<td>".$row["Pr_ID"]."</td>";
                    echo "<td>".$row["Pr_Name"]."</td>";
                    echo "<td>".$row["Pr_Quantity"]."</td>";
                    echo "<td>".$row["Pr_Cost"]."</td>";
                    echo "</tr>";
                }
              }
            ?>
            </table>
        </section>


        <?php
include_once 'footer.php'

?>