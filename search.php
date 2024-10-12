<?php
session_start();
require_once("db_conn.php");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe</title>
    <link rel="stylesheet" href="mainstyles1.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Julius+Sans+One&family=Mulish:wght@200&family=Quattrocento&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-std" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <script  src="hamburger.js" defer></script>
    <script  src="arrows.js" defer></script>
</head>

<body>

<header class="header">

        
        <div class="nav-bar">
            <div class="heading">
                The Gallery Cafe
            </div>
            <div class="links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php 

                    $sql = "SELECT * FROM category LIMIT 1";

                    $result = mysqli_query($conn, $sql);

                    $row = mysqli_fetch_assoc($result);
                    
                    echo '<li><a href="menu.php?category_id='.$row["category_id"].'">Menu</a></li>'; ?>
                    <li><a href="promotions.php">Promotions & Offers</a></li>
                    <li><a href="location.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="onlineorder.php">Online Order</a></li>
                   
                    <li><a  href="reservations.php?reservation=">Reserve</a></li>
                    <?php

if (isset($_SESSION["user"])) {
    // Display logout link if user is logged in
    echo '<li class="nav-item"><a href="logout.php">Logout</a></li>';
    echo '<li class="nav-item"><a href=""><i class="fa-solid fa-user"></i></a></li>';
    echo "<div style='display:flex; padding-top:10px; justify-content:center; align-items:center; margin:0px 5px;'><p style='font-size: 16px'>Hi " . htmlspecialchars($_SESSION['user']['user_fname']) . "</p></div>";
} else {
    // Display login icon if user is not logged in
    echo '<li class="nav-item"><a href="loginform.php"><i class="fa-solid fa-user"></i></a></li>';
}
?>
                </ul>
            </div>
            <div class="cover-offer">
                <div class="hamburger">
                  <i class='bx bx-menu'></i>
                </div>
                <div class="overlay"></div>

              </div>
        </div>

        

    </header>
<main>



    <section class="menu-search-onlineorder">

        <div class="sort-items-onlineorder">
            <div class="sort-heading-onlineorder">
                <p class="subheading-main">
                    Search Items
                </p>
                
            </div>

        </div>

        <div class="menu-container-onlineorder">
            <div class="menu-card-onlineorder">
                <div class="menu-heading-search-onlineorder">
                    <?php

                    if (isset($_POST["search"]) || isset($_POST["cuisine"]) || isset($_POST["category"]) || isset($_POST["diet"])) {


                        if (isset($_POST["search"])) {
                            $search = mysqli_real_escape_string($conn, $_POST["search"]);
                            $sql = "SELECT * FROM item 
                            INNER JOIN category ON item.category_id = category.category_id 
                            WHERE item_name LIKE '%$search%' OR  category_name LIKE '%$search%'";
                        } elseif (isset($_POST["cuisine"]) &&  $_POST["cuisine"] > 0) {

                            $sql = "SELECT * FROM item 
                            WHERE cuisine_id = " . $_POST["cuisine"] . "";
                        } elseif (isset($_POST["category"]) &&  $_POST["category"] > 0) {

                            $sql = "SELECT * FROM item 
                            WHERE category_id = " . $_POST["category"] . "";
                        } elseif (isset($_POST["diet"]) &&  $_POST["diet"] > 0) {

                            $sql = "SELECT * FROM item 
                        WHERE diet_pref_id = " . $_POST["diet"] . "";
                        } else {
                            $sql = "SELECT * FROM item";
                        }

                        $result = mysqli_query($conn, $sql);

                        $queryResults = mysqli_num_rows($result);

                        echo "<p class='subheading-main-2'>
                        Search Results ({$queryResults} Results)</p>
                    ";


                    ?>


                </div>
                <div class="menu-list-search-onlineorder">
                <?php

                        if ($queryResults > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                            
                                <div class="item-onlineorder">

                                    <img id="resturant-image-onlineorder" src="images/' . $row["item_image"] . '" alt="">
                                    <p class="order-item-name-onlineorder">
                                        ' . $row["item_name"] . '
                                    </p>
                                    <div class="prices-online-onlineorder">
                                    <p class="price-online-onlineorder">LKR ' . $row["item_price"] . '</p>
                                    <p class="total-online-onlineorder">LKR ' . $row["total_price"] . '</p>
                                    </div>
                                </div>
                            ';
                            }
                        } else {
                        }
                        echo '</div>';
                    }
                ?>








                </div>







            </div>



    </section>

    <?php
include("footer.php");
?>









    </body>

    </html>