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

        

            <h1> This is An Introduction</h1>
            <p> Here is some importnat information </p>
        </section>

        <section class="index-catergories">
            <h2> Some Basic Catergories</h2>
            <div class = "index-categories-list">
                <div>
                    <h3> Things to Do </h3>
                </div>
                <div>
                    <h3> Stats </h3>
                </div>
                <div>
                    <h3> Animal Fun Facts </h3>
                </div>
            </div>
        </section>
        <?php
include_once 'footer.php'

?>