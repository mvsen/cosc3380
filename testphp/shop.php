<?php
include_once 'header.php'

?>

<section class ="index-intro">
        <?php
                    if (isset($_SESSION["useruid"]))
                    {
                        echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
                        
                    }



        ?>

        

            <h1> This is a shop page</h1>
            <p> Here is some importnat information </p>
        </section>


        <?php
include_once 'footer.php'

?>