<?php
session_start();
include("header-onlineorder.php");

?>

<main class="account-main">

    <section class="account-view">

        <div class=account-container>
            <div class="account-card">
                <div class="account-heading">
                    <p>
                        Feedback Form
                    </p>

                </div>
                <div class="account-info">

                    <div class="account-summary">
                        <div class="account-box">
                            <div class="account-heading-box">
                                <p class="user-name">My Account</p>

                            </div>
                            <div class="account-icon-box">
                                <i class="bi bi-person-circle"></i>


                            </div>
                            <div class="account-username-box">
                                <p class="welcome">Welcome!</p>
                                <p class="name">Ashane Lakshitha</p>
                            </div>

                            <div class="button-box">
                            <a href="account.php"><button class="viewbutton">
                                    Account
                                </button></a>
                                <a href="vieworder.php"><button class="viewbutton">
                                        View Orders
                                    </button></a>

                                

                                <a href="admin/logout.php"><button class="viewbutton">
                                        Log Out
                                    </button></a>
                            </div>

                        </div>

                    </div>

                    <div class="account-form">
                        <form id="form1" name="form1" method="post" action="">

                            <div class="account-form-details">

                                <div class="inputs">

                                    <div class="divided">
                                        <div class="col1">
                                            <label class="labels" for="firstName">First Name:</label><br>
                                            <input class="divided-input-checkout" placeholder="First Name" type="text" name="firstName" id="firstName" />
                                        </div>

                                    </div>

                                    <div class="divided">
                                        <div class="col1">
                                            <label class="labels" for="lastName">Last Name:</label><br>
                                            <input class="divided-input-checkout" placeholder="Last Name" type="text" id="lastName" />
                                        </div>

                                    </div>


                                    <div class="divided">
                                        <div class="col1">
                                            <label class="labels" for="email">Email:</label><br>
                                            <input class="divided-input-checkout" type="text" placeholder="Email" name="email" id="email" />
                                        </div>

                                    </div>



                                    <div class="divided">
                                        <div class="col1">
                                            <label class="labels" for="eventtype">Type of Service:</label><br>
                                            <select class="dropdown-checkout" name="type" id="eventtype">
                                                <option selected="selected" hidden>Type of Service</option>
                                                <option value="Wedding">Wedding</option>
                                                <option value="Birthday">Birthday Party</option>
                                                <option value="Private Dinner">Private Dinner</option>
                                                <option value="Bachelor/ Bachelorette">Bachelor/ Bachelorette</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="divided">
                                        <div class="col1">
                                            <label class="labels" for="address">Feedback:</label><br>
                                            <textarea class="textarea-checkout" name="address" id="address" placeholder="Feedback"></textarea>
                                        </div>

                                    </div>


                                    <div class="save-button">
                                        <button class="savechanges">
                                            Save Changes
                                        </button>
                                    </div>


                                </div>

                            </div>








                        </form>


                    </div>



                </div>
            </div>



        </div>

    </section>
</main>