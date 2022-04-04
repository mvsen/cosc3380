<?php



require_once 'dbh.inc.php';
require_once 'functions.inc.php';


$sql = "SELECT * FROM Products";
$result = $conn->query($sql);
// output data of each row
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["Pr_ID"]. " - Name: " . $row["Pr_Name"]. "<br>";
    }
  } else {
    echo "0 results";
  }