<?php
session_start();
require_once("../db_conn.php");
include("sidemenu.php");



if (isset($_POST["confirmRes"])) {

    $reservationId = $_POST["reservation_id"];

    $sql = "UPDATE reservations SET status = 'Confirmed' WHERE reservation_id = $reservationId";

    mysqli_query($conn, $sql);
}

if (isset($_POST["deleteRes"])) {
    $resId = $_POST["reservation_id"];

    $sql = "DELETE FROM reservations WHERE reservation_id = $resId";

    mysqli_query($conn, $sql);

    header("Location: reservationview.php");
}

?>

<div class="dashboard-content">


    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>RESERVATIONS</p>
                
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

    <div class="table-section-item">


        <div class="table-container-item">

            <div class="table-box">

                <table id="rows-def">
                    <tr id="table-head">
                        <th>RES ID</th>
                        <th>NIC</th>
                        <th>NO OF PPL</th>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>PHONE NO</th>
                        <th>EMAIL</th>
                        <th>CONFIRM</th>
                        <th>DELETE</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM reservations";

                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<form action='reservationview.php' method='post'>
                            <tr>
                      <td id='ID'>" . $row["reservation_id"] . "</td>
                      <td> " . $row["nic_number"] . "</td>
                      <td> " . $row["no_of_people"] . "</td>
                      <td>" . $row["date"] . "</td>
                      <td>" . $row["time"] . "</td>
                      <td>" . $row["first_name"] . "</td>
                      <td>" . $row["last_name"] . "</td>
                      <td>" . $row["phone_number"] . "</td>
                      <td>" . $row["email"] . "</td>
                      <input type='hidden' name='reservation_id' value=" . $row["reservation_id"] . ">
                      <td>";
                      if ($row["status"] == "Pending") {
                          echo "<button id='confirm' name='confirmRes'>Confirm</button></td>";
                      } else if ($row["status"] == "Confirmed") {
                          echo "<button id='confirmed' name='confirmRes'>Confirmed</button></td>";
                      }
                      echo "
                    <td><button id='bin' name='deleteRes'><i class='ri-delete-bin-line'></i></button> </td>

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