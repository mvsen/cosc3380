<?php
include_once 'header.php';
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBname);
if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}

if (isset($_POST['purchase'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $keys => $value) {
            $id = $value['id'];
            $name = $value['name'];
            $quan = $value['quantity'];
            $cid = $_SESSION['userid'];
            $today = date("Y-m-d H:i:s");
            $sql = "UPDATE Products SET Pr_Quantity =  Pr_Quantity - '$quan' WHERE Pr_ID = '$id'";
            
            $qry = $conn->query($sql);
            if ($qry === false) {
                echo "FAIL";
                header("location: checkout.php");
            }
            $sql2 = "INSERT Tickets SET C_id = '$cid', PR_Id = '$id', quantity = '$quan', date_sold = '$today' ";
            $qry = $conn->query($sql2);
            if ($qry === false) {
                echo "FAIL";
                header("location: checkout.php");
            }
            
        }
        echo '<script>alert("Purchase Succecful")</script>';
        unset($_SESSION['cart']);
   
    }
}

?>

<head>
    <title>Check Out</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    table,
    th,
    td {
        margin: auto;
        border: 1px solid black;
        border-collapse: collapse;
    }

    .purchase_butt {
        background-color: #04AA6D;
        position: absolute;
        color: white;
        text-decoration: none;
        cursor: pointer;
        right: 274px;
        width: 100px;
        border: 3px solid #73AD21;
        padding: 10px;
    }
</style>
<section class="index-intro">
    <?php
    if (isset($_SESSION["useruid"])) {
        echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
    }
    ?>

    <h1>Check Out Page</h1>
    <p>Display cart items</p>
    <table class='table'>
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Item Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
        <tr>
            <?php

            if (!empty($_SESSION['cart'])) {

                $total = 0;
                foreach ($_SESSION['cart'] as $keys => $value) {
            ?>
        <tr>
            <td><?php echo $value["id"]; ?></td>
            <td><?php echo $value["name"]; ?></td>
            <td>$ <?php echo $value["price"]; ?></td>
            <td><?php echo $value["quantity"]; ?></td>
            <td>$ <?php echo number_format($value["quantity"] * $value["price"], 2); ?></td>
            <td><a href="shop.php?action=remove&id=<?php echo $value["id"]; ?>">Remove</a></td>
        </tr>
    <?php
                    $total = $total + ($value["quantity"] * $value["price"]);
                }
    ?>
    <tr>
        <td colspan="4" align="right">Total</td>
        <td align="right">$ <?php echo number_format($total, 2); ?></td>
        <td>
            <a href='shop.php?action=clearall'>
                <button>Clear</button>
            </a>
        </td>
    </tr>
<?php
            }
?>
    </table>
    <form action="" method="post">
        <input type="submit" value="Purchase" name="purchase" class="purchase_butt">
    </form>
</section>