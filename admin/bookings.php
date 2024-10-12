<?php
session_start();
require_once("../db_conn.php");
include("sidemenu.php");


if (isset($_POST["confirmBooking"])) {

    $bookingId = $_POST["booking_id"];



    $sql = "UPDATE bookings SET status = 'Confirmed' WHERE booking_id = $bookingId";

    mysqli_query($conn, $sql);

}

if (isset($_POST["deleteBooking"])) {
    $bookingId = $_POST["booking_id"];

    $sql = "DELETE FROM bookings WHERE booking_id = $bookingId";

    mysqli_query($conn, $sql);

    header("Location: bookings.php");
}

?>

<div class="dashboard-content">


    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>FUNCTIONS</p>
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
                        <th>BOOK ID</th>
                        <th>NIC</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE NO</th>
                        <th>VENUE</th>
                        <th>DATE</th>
                        <th>START TIME</th>
                        <th>TYPE</th>
                        <th>CONFIRM</th>
                        <th>DELETE</th>
                    </tr>


                    <?php


                    $sql = "SELECT * FROM bookings";


                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<form action='bookings.php' method='post'>
                            <tr>
                      <td id='ID'>" . $row["booking_id"] . "</td>
                      <td> " . $row["nic_number"] . "</td>
                      <td> " . $row["first_name"] . "</td>
                      <td>" . $row["last_name"] . "</td>
                      <td>" . $row["email"] . "</td>
                      <td>" . $row["mobile_number"] . "</td>
                      <td>" . $row["venue"] . "</td>
                      <td>" . $row["event_date"] . "</td>
                      <td>" . $row["start_time"] . "</td>
                      <td>" . $row["type_of_event"] . "</td>
                      <input type='hidden' name='booking_id' value=" . $row["booking_id"] . ">
                      <td>";
                            if ($row["status"] == "Pending") {
                                echo "<button id='confirm' name='confirmBooking'>Confirm</button></td>";
                            } else if ($row["status"] == "Confirmed") {
                                echo "<button id='confirmed' name='confirmBooking'>Confirmed</button></td>";
                            }
                            echo "
                    <td><button id='bin' name='deleteBooking'><i class='ri-delete-bin-line'></i></button> </td>

                  </tr></form>";
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