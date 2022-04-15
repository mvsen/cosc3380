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
if (isset($_POST['add_to_cart'])) {

  if (isset($_SESSION['cart'])) {

    $session_array_id = array_column($_SESSION['cart'], "id");

    if (!in_array($_GET['id'], $session_array_id)) {
      $count = count($_SESSION["cart"]);
      $session_array = array(
        'id' => $_GET['id'],
        'name' => $_POST['name'],
        "price" => $_POST['price'],
        'quantity' => $_POST['quantity']
      );
      $_SESSION['cart'][$count] = $session_array;
    } else {
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id'] == $_GET['id']) {
          // unset($_SESSION['cart'][$key]);
          $session_array = array(
            'id' => $_GET['id'],
            'name' => $_POST['name'],
            "price" => $_POST['price'],
            'quantity' => $_POST['quantity'] + $value['quantity']
          );
          $_SESSION['cart'][$key] = $session_array;
        }
      }
    }
  } else {
    $session_array = array(
      'id' => $_GET['id'],
      'name' => $_POST['name'],
      "price" => $_POST['price'],
      'quantity' => $_POST['quantity']
    );
    $_SESSION['cart'][0] = $session_array;
  }
}
if (isset($_GET['action'])) {
  if ($_GET['action'] == "clearall") {
    unset($_SESSION['cart']);
  }
  if ($_GET['action'] == "remove") {
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['id'] == $_GET['id']) {
        unset($_SESSION['cart'][$key]);
      }
    }
  }
}
?>

<head>
  <title>Shopping Cart UI</title>
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

  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
    margin-bottom: 9px;
  }

  .price {
    color: grey;
    font-size: 22px;
  }

  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  row:before,
  .row:after {
    content: " ";
    display: table;
  }

  .row:after {
    clear: both;
  }

  .row {
    margin-left: -30px;
    margin-right: -30px;
  }

  .add_to_cart {
    width: 90%;
    height: 50%;
  }

  .form-control {
    width: 90%;
    height: 50%;
  }
</style>

<body>
  <?php
  if (isset($_SESSION["useruid"])) {
    echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
  }
  ?>
  <h2 style="text-align:center; margin-top: 40px">Admission Tickets</h2>
  <div class="row">
    <?php
    $sql = "SELECT * FROM Products WHERE Pr_Name LIKE '%Ticket%'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) { ?>
      <div class="card">
        <form method="post" action="shop.php?id=<?= $row['Pr_ID'] ?>">
          <img src="img/<?= $row['Pr_ID'] ?>.jpg" width="100%">
          <h1> <?= $row['Pr_Name']; ?> </h1>
          <p class="price">$<?= $row['Pr_Cost']; ?> </p>
          <p>In Stock: <?= $row['Pr_Quantity']; ?> </p>
          <input type="hidden" name="id" value="<?= $row['Pr_ID']; ?>">
          <input type="hidden" name="name" value="<?= $row['Pr_Name']; ?>">
          <input type="hidden" name="price" value="<?= $row['Pr_Cost']; ?>">
          <input type="number" name="quantity" value="1" max="<?= $row['Pr_Quantity']; ?>" class="form-control">
          <input type="submit" name="add_to_cart" value="Add To Cart" class="add_to_cart">
        </form>
      </div>
    <?php
    }
    ?>
  </div>
  <div class="row">
    <?php
    $sql = "SELECT * FROM Products WHERE Pr_Name LIKE '%Voucher%'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) { ?>
      <div class="card">
        <form method="post" action="shop.php?id=<?= $row['Pr_ID'] ?>">
          <img src="img/<?= $row['Pr_ID'] ?>.jpg" width="100%">
          <h1> <?= $row['Pr_Name']; ?> </h1>
          <p class="price">$<?= $row['Pr_Cost']; ?> </p>
          <p>In Stock: <?= $row['Pr_Quantity']; ?> </p>
          <input type="hidden" name="id" value="<?= $row['Pr_ID']; ?>">
          <input type="hidden" name="name" value="<?= $row['Pr_Name']; ?>">
          <input type="hidden" name="price" value="<?= $row['Pr_Cost']; ?>">
          <input type="number" name="quantity" value="1" max="<?= $row['Pr_Quantity']; ?>" class="form-control">
          <input type="submit" name="add_to_cart" value="Add To Cart" class="add_to_cart">
        </form>
      </div>
    <?php
    }
    ?>
  </div>
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
    <td colspan="2" align="center">
      <a href="checkout.php">
        <button>Check Out</button>
      </a>
    </td>
    <td colspan="2" align="right">Total</td>
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
</div>


</body>


        <section>
        <p>Cart<span class='cart-counter'>1</span></p>
<div class='addtocart'>addtocart</div>
        </section>


<?php
include_once 'footer.php'

?>