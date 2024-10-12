<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="adminstyle-1.css" />
    <link rel="stylesheet" href="../styleforms.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

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
</head>

<body>

    <div class="dashboard-container">

        <div class="sidemenu">
            <div class="logo">
                <div class="sub-logo">
                    <span>The Outer</span>
                    <h1>CLOVE</h1>
                </div>
            </div>
            <ul class="sidemenu-list">
                <!-- <li>
                <a href=""><img src="./images/4ulk.png" alt="" /></a>
              </li> -->
                <li>
                    <a href="dashboard.html"><i class="bx bxs-dashboard"></i>&nbsp; Dashboard</a>
                </li>
                <li>
                    <a href="category.php"><i class="bx bxs-category"></i>&nbsp; Categories</a>
                </li>
                <li id="active-main">
                    <a id="active-sub" href="item.php"><i class="bx bxs-tv"></i>&nbsp; Items</a>
                </li>
                <li>
                    <a href="orderview.php"><i class="bx bxs-cart-alt"></i>&nbsp; Orders</a>
                </li>
                <li>
                    <a href="bookings.php"><i class="bx bxs-user-pin"></i>&nbsp; Bookings</a>
                </li>
                
                <li>
                    <a href="reservationview.php"><i class='bx bxs-category-alt'></i>&nbsp; Reservations</a>
                </li>

                <li>
                    <a href="settings.html"><i class="bx bxs-cog"></i>&nbsp; Account Settings</a>
                </li>
                <li>
                    <a href="../includes/logout.php"><i class="bx bxs-log-out"></i>&nbsp; Logout</a>
                </li>
            </ul>

            <div class="email">
                <a href=""><i id="ac" class="bx bxs-user-circle"></i>&nbsp;
                    Ashane@4YOU.lk</a>
            </div>
        </div>

<div class="dashboard-content">

    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>CATEGORIES</p>
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

    <div class="table-section">




        <form id="form1" name="form1" method="post" action="signup_model.php" onsubmit="return validateForm()">
                    <div class="headings">
                        <p class="login-form-title">Signup</p>
                    </div>
                    <div class="form-details">

                        <div class="inputs-login">


                            <div class="divided">
                                <div class="col1">
                                    <label class="labels" for="firstName">First Name:</label><br>
                                    <input class="divided-input-signup" placeholder="First Name" type="text" name="firstName" id="firstName" />
                                </div>
                                <div class="col2">
                                    <label class="labels" for="lastName">Last Name:</label><br>
                                    <input class="divided-input-signup" placeholder="Last Name" type="text" id="lastName" name='lastName' />
                                </div>
                            </div>
                            <div class="average">
                                <div class="col1">
                                    <label class="labels" for="email">Email:</label><br>
                                    <input class="average-input" placeholder="Email" type="text" name="email" id="email" />
                                </div>

                            </div>


                            <div class="average">
                                <div class="col1">
                                    <label class="labels" for="password">Password:</label><br>
                                    <input class="average-input" placeholder="Password" type="password" name="password" id="password" />
                                </div>

                            </div>
                            <div class="average">
                                <div class="col1">
                                    <label class="labels" for="confirmpassword">Confirm Password:</label><br>
                                    <input class="average-input" placeholder="Confirm Password" type="password" name="confirmpassword" id="confirmpassword" />
                                </div>

                            </div>
                            <div class="errors-box">
                                <div class="errors">
                                    <p id="error">
                                    <p>
                                </div>

                            </div>


                            <div class="signup-button">
                                <button name="signup" class="signup">
                                    Signup
                                </button>
                            </div>

                        </div>






                    </div>
                </form>
    </div>
    <div class="bottom-box">
        <div class="button">
            <button id="popupButtonCategory" class="submit">
                Add a new Category
            </button>
        </div>


    </div>
</div>


<div id="overlay"></div>
<div id="popupContainerCategory" class="popupContainer">
    <div id="popupContent">
        <div class="popup-header">
            <div class="form-heading-popup">
                <p>Add a Category</p>
            </div>
            <i onclick="closePopup()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post">
            <div class="popup-content">

                <div class="add-category-form">

                    <div class="inputs-popup">

                        <div class="col1-popup">
                            <label class="labels-popup" for="categoryName">Category Name:</label><br>
                            <input class="divided-input-popup" placeholder="Category Name" type="text" name="categoryName" id="categoryName" value="" />
                        </div>

                    </div>

                </div>

            </div>

            <div class="popup-footer">
                <div class="button-popup-footer">


                    <button name="addCategory" class="button-popup">
                        Add Category
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>


<div id="popupContainerCategory-edit" class="popupContainer">
    <div id="popupContent">
        <div class="popup-header">
            <div class="form-heading-popup">
                <p>Edit Category</p>
            </div>
            <i onclick="closePopupEdit()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post">
            <div class="popup-content">

                <div class="add-category-form">

                    <div class="inputs-popup">

                        <div class="col1-popup">
                            <label class="labels-popup" for="categoryName">Category Name:</label><br>
                            <input type='hidden' name='categoryId' value=<?php echo $categoryId ?>>
                            <input class="divided-input-popup" placeholder="Category Name" type="text" name="categoryName" id="categoryName" value="<?php echo $categoryName; ?>" />
                        </div>

                    </div>

                </div>

            </div>

            <div class="popup-footer">
                <div class="button-popup-footer">


                    <button name="updateCategory" class="button-popup">
                        Update Category
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>


<script>
    var overlayDisplay = '<?php echo isset($overlayDisplay) ? $overlayDisplay : 'none'; ?>';
    var popupContainerDisplay = '<?php echo isset($popupContainerDisplay) ? $popupContainerDisplay : 'none'; ?>';
    var popupButtonCategory = document.getElementById('popupButtonCategory');
    var overlay = document.getElementById('overlay');
    var popupContainerCategory = document.getElementById('popupContainerCategory');
    var popupContainerCategoryEdit = document.getElementById('popupContainerCategory-edit');

    overlay.style.display = overlayDisplay;
    popupContainerCategoryEdit.style.display = popupContainerDisplay;

    popupButtonCategory.addEventListener('click', function() {
        overlay.style.display = 'block';
        popupContainerCategory.style.display = 'block';
    });

    popupButtonCategoryEdit.addEventListener('click', function() {
        overlay.style.display = 'block';
        popupContainerCategoryEdit.style.display = 'block';
    });

    function closePopup() {
        overlay.style.display = 'none';
        popupContainerCategory.style.display = 'none';
    }

    function closePopupEdit() {
        overlay.style.display = 'none';
        popupContainerCategoryEdit.style.display = 'none';
    }

    overlay.addEventListener('click', function() {
        closePopup();
        closePopupEdit()
    });
</script>
</body>

</html>