<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="adminstylemain1.css" />
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
                    <span>The Gallery</span>
                    <h1>CAFE</h1>
                </div>
            </div>
            <ul class="sidemenu-list">
                <!-- <li>
                <a href=""><img src="./images/4ulk.png" alt="" /></a>
              </li> -->
                
                <li>

                </li>
                <li id="active-main">
                    <a id="active-sub" href="staff_itemview.php"><i class="bx bxs-tv"></i>&nbsp; Items</a>
                </li>
                <li>
                   
                </li>
                <li>
                    <a href="staff_orderview.php"><i class="bx bxs-user-pin"></i>&nbsp; Orders</a>
                </li>
                
                <li>
 
                </li>

                <li>
                <a href="logout.php"><i class="bx bxs-log-out"></i>&nbsp; Logout</a>
                </li>
                <li>
                   
                </li>
            </ul>

            <div class="email">
                <a href=""><i id="ac" class="bx bxs-user-circle"></i>&nbsp;
                <?php echo '' . $_SESSION["user"]["user_email"] . '';?></a>
            </div>
        </div>