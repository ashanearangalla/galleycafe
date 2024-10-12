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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Julius+Sans+One&family=Mulish:wght@200&family=Quattrocento&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-std" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="hamburger.js" defer></script>
    <style>
        #eyeicon_password {
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

        #eyeicon_confirm_password {
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
                <p class="paragraph-top">Already a member ? <a href="loginform.php">Sign in</a></p>
            </div>
        </div>
    </header>

    <main class="signup-main">
        <section class="form">

            <div class="inquire-form">
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
                                    <span class="eye" onclick="togglePasswordVisibility('password')">
                                        <i class="fas fa-eye-slash" id="eyeicon_password"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="average">
                                <div class="col1">
                                    <label class="labels" for="confirmpassword">Confirm Password:</label><br>
                                    <input class="average-input" placeholder="Confirm Password" type="password" name="confirmpassword" id="confirmpassword" />
                                    <span class="eye" onclick="togglePasswordVisibility('confirmpassword')">
                                        <i class="fas fa-eye-slash" id="eyeicon_confirm_password"></i>
                                    </span>
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
                <script>
                    function validateForm() {
                        var firstName = document.getElementById("firstName").value;
                        var lastName = document.getElementById("lastName").value;
                        var email = document.getElementById("email").value;
                        var password = document.getElementById("password").value;
                        var confirmPassword = document.getElementById("confirmpassword").value;
                        var errorElement = document.getElementById("error");


                        errorElement.innerHTML = "";


                        if (firstName === "" || lastName === "" || email === "" || password === "" || confirmPassword === "") {
                            errorElement.innerHTML = "All fields must be filled out";
                            return false;
                        }


                        var emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailFormat.test(email)) {
                            errorElement.innerHTML = "Invalid email address";
                            return false;
                        }


                        if (password !== confirmPassword) {
                            errorElement.innerHTML = "Password and Confirm Password do not match";
                            return false;
                        }

                        return true;
                    }


                    var state = {};

                    function togglePasswordVisibility(inputId) {
                        var eyeicon = document.getElementById("eyeicon_" + inputId);
                        var passwordInput = document.getElementById(inputId);

                        if (!(inputId in state)) {
                            state[inputId] = false;
                        }

                        if (state[inputId]) {
                            passwordInput.setAttribute("type", "password");
                            state[inputId] = false;
                            eyeicon.classList.remove("fa-eye");
                            eyeicon.classList.add("fa-eye-slash");
                        } else {
                            passwordInput.setAttribute("type", "text");
                            state[inputId] = true;
                            eyeicon.classList.remove("fa-eye-slash");
                            eyeicon.classList.add("fa-eye");
                        }
                    }
                </script>
            </div>
        </section>
    </main>

</body>

</html>