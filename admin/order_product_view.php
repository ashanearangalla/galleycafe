<?php
session_start();
require_once("../db_conn.php");
include("sidemenu.php");



$orderId = $_POST["order_id"];
?>

<div class="dashboard-content">

    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>ORDER</p>
            
            </div>
        </div>
        <div class="box-1">
            <div class="search-bar">
                <ul>
                    <li class="search">
                     
                        <form action="search.php" method="post">

                            <input type="text" placeholder="Search items" name="search" <?php
                                                                                        // Check if the session variable is set and not empty
                                                                                        if (isset($_SESSION["search"]) && !empty($_SESSION["search"])) {
                                                                                            echo 'value="' . $_SESSION["search"] . '"';
                                                                                        }
                                                                                        ?> required id="search-input" />
                            <i class="bx bx-search-alt-2"></i>


                        </form>
                    </li>




                </ul>


            </div>
        </div>
    </div>

    <div class="table-section">
        <div class="sort-button-box">


            <form action="orderview.php"><button class="filter">Back</button></form>
        </div>


        <div class="table-container">

            <div class="table-box">

                <table id="rows-def">
                    <tr id="table-head">
                        <th>ORDER ID</th>
                        <th>ITEM NAME</th>
                        <th>QUANTITY</th>

                    </tr>

                    <?php


                    $sql = "SELECT * FROM order_item
                    INNER JOIN item ON order_item.item_id = item.item_id
                    WHERE $orderId =order_id";

                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "
                            <tr>
                          <td id='ID'>" . $row["order_id"] . "</td>
                          <td> " . $row["item_name"] . "</td>
                          <td>" . $row["quantity"] . "</td>


                      </tr>";
                        }
                    }

                    ?>

                </table>


            </div>


        </div>
    </div>
    <div class="bottom-box">
        <div class="button">
            
        </div>


    </div>
</div>


</body>

</html>