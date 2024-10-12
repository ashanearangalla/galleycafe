<?php
session_start();
require_once("../db_conn.php");
include("sidemenu.php");

if (isset($_POST["confirmOrder"])) {
    $orderId = $_POST["order_id"];
    $sql = "UPDATE `order` SET status = 'Confirmed' WHERE order_id = $orderId";
    mysqli_query($conn, $sql);
}

if (isset($_POST["deleteOrder"])) {
    $orderId = $_POST["order_id"];
    $sql = "DELETE FROM `order` WHERE order_id = $orderId";
    mysqli_query($conn, $sql);
    header("Location: orderView.php");
}
?>

<div class="dashboard-content">
    <div class="heading-box">
        <div class="box-1">
            <div class="title">
                <p>ORDERS</p>
            </div>
        </div>
        <div class="box-1">
            <div class="search-bar">
                <ul>
                    <li class="search">
                        <form action="search.php" method="post">
                            <input type="text" placeholder="Search items" name="search" 
                            <?php
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
                    <thead>
                        <tr id="table-head">
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Total</th>
                            <th>Added Time</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT o.order_id, o.total, o.status, o.added_time, u.first_name, u.last_name 
                                FROM `order` o
                                INNER JOIN user u ON o.user_id = u.user_id";
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["order_id"] . "</td>";
                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                echo "<td>" . $row["total"] . "</td>";
                                echo "<td>" . $row["added_time"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td>
                                    <form action='order_product_view.php' method='post' style='display:inline-block;'>
                                        <input type='hidden' name='order_id' value='" . $row["order_id"] . "'>
                                        <button type='submit' id='update'>View</button>
                                    </form>
                                  </td>";
                                echo "<td>";
                                if ($row["status"] == "Pending") {
                                    echo "<form action='orderview.php' method='post' style='display:inline-block;'>
                                            <input type='hidden' name='order_id' value='" . $row["order_id"] . "'>
                                            <button type='submit' id='update' name='confirmOrder'>Confirm</button>
                                          </form>";
                                } else if ($row["status"] == "Confirmed") {
                                    echo "<button type='button' id='update' disabled>Confirmed</button>";
                                }
                                echo "<form action='orderview.php' method='post' style='display:inline-block;'>
                                        <input type='hidden' name='order_id' value='" . $row["order_id"] . "'>
                                        <button type='submit' style='margin-left:5px'; id='bin' name='deleteOrder'><i class='ri-delete-bin-line'></i></button>
                                      </form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No orders found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="bottom-box">
        <div class="button"></div>
    </div>
</div>
</body>
</html>