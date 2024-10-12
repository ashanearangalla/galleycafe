<?php
session_start();

require_once("../db_conn.php");
include("staff_sidemenu.php");



if (isset($_POST["confirmOrder"])) {

    $orderId = $_POST["order_id"];


    $sql = "UPDATE `order` SET status = 'Confirmed' WHERE order_id = $orderId";

    mysqli_query($conn, $sql);
}




?>

<div class="dashboard-content">


    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>ORDERS</p>
                <!-- <h2>Welcome To 4You</h2> -->
            </div>
        </div>
        <div class="box-1">
            <div class="search-bar">
                <ul>
                    <li class="search">
                        <!--Search bar-->
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

    <div class="table-section-item">


        <div class="table-container-item">

            <div class="table-box">

                <table id="rows-def">
                    <tr id="table-head">
                    <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Total</th>
                            <th>Added Time</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Actions</th>

                    </tr>


                    <?php

$sql = "SELECT o.order_id, o.total, o.status, o.added_time, u.first_name, u.last_name 
FROM `order` o
INNER JOIN user u ON o.user_id = u.user_id";

                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);
                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                                echo "<td>" . $row["order_id"] . "</td>";
                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                echo "<td>" . $row["total"] . "</td>";
                                echo "<td>" . $row["added_time"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td>
                                <form action='staff_order_productview.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='order_id' value='" . $row["order_id"] . "'>
                                    <button type='submit' id='update'>View</button>
                                </form>
                              </td>";
                            echo "<td>";
                            if ($row["status"] == "Pending") {
                                echo "<form action='staff_orderview.php' method='post' style='display:inline-block;'>
                                        <input type='hidden' name='order_id' value='" . $row["order_id"] . "'>
                                        <button type='submit' id='update' name='confirmOrder'>Confirm</button>
                                      </form>";
                            } else if ($row["status"] == "Confirmed") {
                                echo "<button type='button' id='update' disabled>Confirmed</button>";
                            }

                            echo "</tr>";
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