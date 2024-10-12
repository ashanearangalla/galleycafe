<?php
session_start();

require_once("../db_conn.php");
include("staff_sidemenu.php");




?>

<div class="dashboard-content">


    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>PRODUCTS</p>
                
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
                        <th>ITEM ID</th>
                        <th>CATEGORY</th>
                        <th>CUISINE</th>
                        <th>DIET</th>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>PRICE</th>
                        <th>DISC</th>
                        <th>TOTAL</th>
                        <th>AVAILABLE</th>

                    </tr>


                    <?php


                    $sql = "SELECT * FROM item
                    INNER JOIN category ON category.category_id = item.category_id 
                    INNER JOIN cuisine_type ON cuisine_type.cuisine_id = item.cuisine_id 
                    INNER JOIN diet_preference ON diet_preference.diet_pref_id = item.diet_pref_id";


                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<form action='item.php' method='post'>
                            <tr>
                      <td id='ID'>" . $row["item_id"] . "</td>
                      <td> " . $row["category_name"] . "</td>
                      <td>" . $row["cuisine_name"] . "</td>
                      <td> " . $row["diet_pref_name"] . "</td>
                      <td>" . $row["item_name"] . "</td>
                      <td>" . $row["item_description"] . "</td>
                      <td>" . $row["item_price"] . "</td>
                      <td>" . $row["item_discount"] . "</td>
                      <td>" . $row["total_price"] . "</td>
                      <td>" . $row["stock"] . "</td>
                      <input type='hidden' name='item_id' value=" . $row["item_id"] . ">


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