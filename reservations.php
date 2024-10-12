<?php
require_once("db_conn.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe</title>
    <link rel="stylesheet" href="mainstyles1.css">
    <link rel="stylesheet" href="formstyles.css">
   
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


    <main class="reservations-main">
        <section class="form">
            <div class="inquire-form">
                <form id="form1" name="form1" method="post" action="reservationform.php?reservation=" onsubmit="return validateForm()">
                    <div class="headings">
                        <p class="title">Reservations</p>
                    </div>
                    <div class="form-details">
                        <div class="inputs">
                            <div class="merged">
                                <label class="labels" for="email">Number of People:</label><br>
                                <select class="merged-dropdown" name="noofpeople" id="noofpeople">
                                    <option selected="selected">1 Person</option>
                                    <option>2 People</option>
                                    <option>3 People</option>
                                    <option>4 People</option>
                                    <option>5 People</option>
                                    <option>6 People</option>
                                    <option>7 People</option>
                                    <option>8+ People</option>
                                </select>

                            </div>




                            <div class="merged">
                                <label class="labels" for="date">Date:</label><br>
                                <input class="merged-input" type="date" name="date" id="date" />
                            </div>

                            <div class="merged">
                                <label class="labels" for="time">Time:</label><br>
                                <select class="merged-dropdown" id="time" name="time">
                                    <?php
                                    // Generating time options in 30-minute intervals from 6:00 AM to 11:30 PM
                                    for ($hours = 6; $hours <= 23; $hours++) {
                                        for ($minutes = 0; $minutes < 60; $minutes += 30) {
                                            // Adjusting the time format
                                            $time = sprintf('%02d:%02d', $hours, $minutes);
                                            echo "<option value='$time'>$time</option>";
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="errors-box">
                                <div class="errors">
                                    <?php
                                    if($_GET["reservation"] == "success") {
                                        echo '<p id="correct">Reservation Successful
                                        <p>';
                                    }
                                    ?>
                                    
                                    <p id="error">
                                    <p>
                                </div>

                            </div>

                            <div class="button">
                                <button name="reserve" class="submit" type="submit">
                                    Find a Table
                                </button>
                            </div>

                        </div>



                    </div>



                </form>


                <script>
                    function validateForm() {
                        var noOfPeople = document.getElementById("noofpeople").value;
                        var date = document.getElementById("date").value;
                        var time = document.getElementById("time").value;
                        var errorElement = document.getElementById("error");

                       
                        errorElement.innerHTML = "";

                     
                        if (noOfPeople === "" || date === "" || time === "") {
                            errorElement.innerHTML = "All fields must be filled out";
                            return false;
                        }

                        return true; 
                    }
                </script>
            </div>

        </section>
    </main>