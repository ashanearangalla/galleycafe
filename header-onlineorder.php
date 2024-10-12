<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outer Clove</title>

    <link rel="stylesheet" href="stylesonlineorder.css">
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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <script src="hamburger.js" defer></script>
</head>

<body>

    <header class="header">


        <div class="nav-bar">
            <a href="onlineorder.php">
                <div class="heading">
                    THE OUTER CLOVE
                </div>
            </a>

            <div class="links">
                <ul>
                    <li class="search">
                        <!--Search bar-->
                        <form id="search-form" action="search.php" method="post">

                            <input type="text" placeholder="Search items" name="search" <?php
                                                                                        
                                                                                        if (isset($_SESSION["search"]) && !empty($_SESSION["search"])) {
                                                                                            echo 'value="' . $_SESSION["search"] . '"';
                                                                                        }
                                                                                        ?> required id="search-input" />
                            <i class="bx bx-search-alt-2" onclick="submitForm()"></i>


                        </form>
                        <script>
                            function submitForm() {
                                document.getElementById('search-form').submit();
                            }
                        </script>
                    </li>
                    <li class="account">

                        <?php
                        if (isset($_SESSION["user"])) {

                            echo '
                            <div class="account-icon">
                                <a href="account.php"> &nbsp;<i class="bx bxs-user"></i></a>

                            </div>
                            <div class="account-name">
                                <a id="name" href="account.php">Hello ' . $_SESSION["user"]["user_fname"] . '</a>
                            </div>';
                        } else {
                            echo '
                            <div class="account-icon">
                                <a href="signup.php"> &nbsp;<i class="bx bxs-user"></i></a>

                            </div>
                            <div class="account-name">
                                <a id="name" href="signup.php">Signup/ Register</a>
                            </div>';
                        }

                        ?>





                    </li>


                    <li class="cart">
                        <div class="cart-icon">
                            <a href="cart.php">
                                <i class='bx bxs-cart-alt'></i>&nbsp;
                                <?php
                                if (isset($_COOKIE["shopping_cart"])) {

                                    $cookie_data = stripslashes($_COOKIE["shopping_cart"]);
                                    $cart_data = json_decode($cookie_data, true);

                                    $count = count($cart_data);
                                    echo "<a id='notify' href=''>$count</a>";
                                } else {
                                    echo "<a id='notify' href=''>0</a>";
                                }
                                ?>

                            </a>

                        </div>
                        <div class="account-name">
                            <a id="name" href="cart.php">Cart</a>
                        </div>





                    </li>

                </ul>
            </div>

        </div>




    </header>



    