<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe</title>

    <link rel="stylesheet" href="formstyles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link -rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Julius+Sans+One&family=Mulish:wght@200&family=Quattrocento&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-std" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="hamburger.js" defer></script>
    <style>
        #eye {
            position: relative;
            right: 15px;
            transform: translate(0, -50%);
            top: -32%;
            left: 90%;
            cursor: pointer;
            display: flex;
            align-items: center;
            bottom: 10%;
            transform: translateY(-50%);
            color: gray;
        }
    </style>
</head>

<body>

    <header class="header">
        
        <div class="heading">
            <a href="index.php">
                <p class="titleform">The Gallery Cafe</p>
            </a>
        </div>
        <div class="nav-bar">

            <div class="login-signup-box">
                <p class="paragraph-top">New Member ? <a href="signup.php">Create Account</a> here</p>
            </div>
        </div>
    </header>

    <main class="login-main">
        <section class="form-login">

            <div class="inquire-form">
                <form id="form1" method="post" action="login_db_model.php" onsubmit="return validateForm()">
                    <div class="headings">
                        <p class="reservation-title">Login</p>
                    </div>
                    <div class="form-details">
                        <div class="inputs-login">
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
                                    <span id='eye'>
                                        <i class="fas fa-eye-slash" id="eyeicon" onclick="togglePasswordVisibility()"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="errors-box">
                                <div class="errors">
                                    <?php
                                    if (isset($_SESSION["errors_login"])) {
                                        $errors = $_SESSION["errors_login"];
                                        foreach ($errors as $error) {
                                            echo '<p id="error">' . $error . '<p>';
                                            break;
                                        }
                                        unset($_SESSION["errors_login"]);
                                    } else {
                                    }
                                    echo '<p id="error"><p>';

                                    ?>
                                </div>
                            </div>
                            <div class="login-button">
                                <button class="login" name="login" type="submit">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    function validateForm() {
                        var email = document.getElementById("email").value;
                        var password = document.getElementById("password").value;
                        var errorElement = document.getElementById("error");

                        // Reset error messages
                        errorElement.innerHTML = "";

                        // Check if fields are not blank
                        if (email === "" || password === "") {
                            errorElement.innerHTML = "All fields must be filled out";
                            return false;
                        }

                        // Check if the email is valid
                        var emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailFormat.test(email)) {
                            errorElement.innerHTML = "Invalid email address";
                            return false;
                        }

                        return true;
                    }


                    var state = false;

                    function togglePasswordVisibility() {

                        var eyeicon = document.getElementById("eyeicon");
                        var passwordInput = document.getElementById("password");

                        if (state) {
                            passwordInput.setAttribute("type", "password");
                            state = false;
                            eyeicon.classList.replace("fa-eye", "fa-eye-slash");
                        } else {
                            passwordInput.setAttribute("type", "text");
                            state = true;
                            eyeicon.classList.replace("fa-eye-slash", "fa-eye");
                        }
                    }
                </script>
            </div>
        </section>
    </main>