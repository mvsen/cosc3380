<?php
include_once 'header.php';


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
        </section>


        <?php
include_once 'footer.php'

?>