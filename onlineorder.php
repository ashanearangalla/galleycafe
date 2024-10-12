<?php
session_start();
require_once("db_conn.php");



include("header.php");

?>

<main>
    <section class="cover-onlineorder">

        <div class="cover-image-onlineorder">




            <p >Online Order</p>
            <div class="link-box-preorder">
                    <a href="preorder.php">Pre-order</a>
                </div>


        </div>
    </section>


    <section class="menu-onlineorder">

        <div class="sort-items-onlineorder">
            <div class="sort-heading-onlineorder">
                <p class="subheading-main">
                    Online Order
                </p>
                <form method="post" action="search.php">
                <div class="search-bar-container">
                        <input type="text" name="search" placeholder="Search items..." class="search-bar">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
                
            </div>

        </div>

        <div class="menu-container-onlineorder">
            <?php
            $sql = "SELECT DISTINCT c.category_name,c.category_id,i.category_id FROM item i, category c
            WHERE c.category_id = i.category_id 
            ORDER BY c.category_id asc";

            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);

            if ($queryResults > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo ' 
                    <div class="menu-card-onlineorder">
                    <div class="menu-heading-onlineorder">    
                        <p>
                            ' . $row["category_name"] . '
                        </p>
                        <div class="arrows-onlineorder">
                            <i class="fa-solid fa-angle-left"></i>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>';
                    $sql2 = "SELECT * FROM category
                    INNER JOIN item ON item.category_id = category.category_id 
                    WHERE item.category_id=" . $row["category_id"] . "";

                    $result2 = mysqli_query($conn, $sql2);
                    $queryResults2 = mysqli_num_rows($result2);

                    echo '<div class="menu-list-onlineorder">';
                    if ($queryResults2 > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {

                            echo '
                           
                                <div class="item-onlineorder">

                                    <img id="resturant-image-onlineorder" src="images/' . $row2["item_image"] . '" alt="">
                                    <p class="order-item-name-onlineorder">
                                        ' . $row2["item_name"] . '
                                    </p>
                                    <div class="prices-online">
                                    <p class="price-online-onlineorder">LKR ' . $row2["item_price"] . '</p>
                                    <p class="total-online-onlineorder">LKR ' . $row2["total_price"] . '</p>
                                    </div>
                                </div>
                            ';
                        }
                    }
                    echo '</div>
                    </div>';
                }
            }
            ?>



        </div>



    </section>

    <?php
include("footer.php");
?>



    </body>

    </html>