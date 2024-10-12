<?php
include("header.php");

session_start();






?>



<section class="cover">

    <div class="cover-image">
        <div class="login-div">
            <div class="login-box">
                
            </div>
        </div>




        <p>The Gallery Cafe</p>



    </div>
</section>
<section class="welcome">
    <div class="welcome-container">
        <div class="welcome-message">
            <div class="message-heading">
                <p>
                    Welcome
                </p>
            </div>
            <div class="message-p1">
                <div>
                    <p>

                        Step into The Gallery Cafe, where a warm embrace awaits, inviting you into a world of culinary delight.

                    </p><br>
                    <p>
                        Our welcome is more than just a greeting; it's an invitation to experience the essence of Colombo's culinary spirit.

                    </p><br>
                    <p>
                        The moment you cross our threshold, you become part of a community where flavors come alive, and every dish tells a story.
                    </p><br>
                    <p>

                        Welcome to The Gallery Cafe, where each visit is a celebration of taste, tradition, and togetherness—an experience curated just for you.
                    </p><br><br><br><br>
                    
                    <a  href="#">Our Menu</a>
                </div>

            </div>


        </div>

        <img id="resturant-image" src="images/welcomecafe.jpg" alt="">


    </div>

</section>
<div class="index-part-1">

    <div class="services-container-index" style="padding-bottom: 0px;">

        <div class="services-heading" style="padding-top: 10px;">
            <p>Our Services</p>
        </div>
        <div class="services-index" style="margin-bottom: 15px;">

            <div class="info-box">
                <i id="remix" class="material-icons">&#xe56c;</i>

                <p class="heading-services">
                    Dine-In</p>
                <p class="description-services">
                    Experience the pleasure of dining at our restaurant</p>
            </div>
            <div class="info-box">
                <i id="remix" class="bi bi-backpack4-fill"></i>
                <p class="heading-services">Take Out</p>
                <p class="description-services">
                    Elevate your experience with our convenient take-away service.</p>
            </div>
            <div class="info-box">
                <i id="remix" class="ri-money-dollar-circle-line"></i>
                <p class="heading-services">Cash on Delivery</p>
                <p class="description-services">Enjoy the convenience of our Cash on Delivery service.</p>
            </div>
            <div class="info-box">
                <i id="remix" class="ri-bank-card-line"></i>
                <p class="heading-services">Secure Payments</p>
                <p class="description-services">via PayHere Powered by Sampath Bank.</p>
            </div>




        </div>
        <div class="link-box" style="margin-top: 10px; margin-bottom: 0px; padding-bottom: 0px;">
            <a href="#">View More >></a>
        </div>


    </div>



    <div class="promotions-container-index">
        
        <div class="services-heading" style="padding-bottom: 10px;">
            <p>Promotions & Offers</p>
        </div>
        <div class="promotions-index">
            <div class="banner-box-1">

            </div>
            <div class="banner-box-2">

            </div>
            <div class="banner-box-3">

            </div>
            <div class="banner-box-4">

            </div>
        </div>
        <div class="link-box-2" style="padding-top: 10px;">
            <a href="#">View More >></a>
        </div>

    </div>


    <section class="welcome-menu">

        <div class="menu-container-home">
            <div class="menu-card-home">
                <div class="menu-heading-home">
                    <div class="heading-browse">
                        <p>
                            Browse Our Items
                        </p>
                        <div class="arrows">
                            <i class="fa-solid fa-angle-left"></i>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>

                </div>
                <div class="menu-list-home">
                    <?php
                    $sql = "SELECT * FROM item
                        WHERE home_display = 'Yes' ";


                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <div class="item-home">
    
                                <img id="resturant-image-home" src="images/' . $row["item_image"] . '" alt="">
                                <p class="order-item-name-home">
                                    ' . $row["item_name"] . '
    
                                </p>
                                
                                <div class="prices">
                                    <p class="price">LKR ' . $row["item_price"] . '</p>
                                    <p class="total">LKR ' . $row["total_price"] . '</p>
                                </div>
    
                                
                            </div>
                        ';
                        }
                    }
                    ?>

                </div>
                <div class="link-box">
                    <a href="onlineorder.php" target="_blank">View More >></a>
                </div>





            </div>
        </div>
    </section>
</div>
<main class="index-main">
    <section class="welcome">

        <div class="welcome-container">

            <div class="welcome-message">
                <div class="message-heading">
                    <p>
                        Reserve
                    </p>
                </div>
                <div class="message-p1">
                    <div>
                        <p>
                        Elevate your dining experience by reserving a table for an unforgettable culinary journey. 

                        </p><br>
                        <p>
                        Whether it's a romantic dinner for two, a family celebration, or a business meeting, our carefully curated ambiance awaits you. 

                        </p><br>
                        <p>
                        Immerse yourself in the exquisite blend of flavors while our attentive staff ensures every moment is a celebration. 
                        </p><br>
                        <p>
                        Reserve your table now and savor the anticipation of a dining experience tailored to your desires.
                        </p><br><br><br><br>
                        <a href="#">Reserve Now</a>
                    </div>

                </div>


            </div>
            <img id="resturant-image" src="images/cafeinterior.jpg" alt="">




        </div>

    </section>




    

    <div class="newsletter-container-index">
        <div class="heading-contact">
            <p>
                Opening Hours
            </p>
        </div>
        <div class="newsletter">
            <div class="newsletter-heading">

                <div class="opening-hours">
                    <p class="description-newsletter">Sunday to Tuesday</p>
                    <p class="description-newsletter">09:00 - 06:00</p>
                </div>
                <div class="opening-hours">
                    <p class="description-newsletter">Friday to Sunday</p>
                    <p class="description-newsletter">06:00 - 09:00</p>
                </div>
                <div class="opening-hours">
                    <p class="description-newsletter">Sunday to Tuesday</p>
                    <p class="description-newsletter">09:00 - 06:00</p>
                </div>
                <div class="opening-hours">
                    <p class="description-newsletter">Monday to Friday</p>
                    <p class="description-newsletter">06:00 - 09:00</p>
                </div>
                <div class="opening-hours">
                    <p class="description-newsletter">Monday to Saturday</p>
                    <p class="description-newsletter">06:00 - 09:00</p>
                </div>
                <div class="footer-newsletter">
                    <p class="">Call Us Now</p>
                    <p class="">0771231234</p>
                </div>


            </div>

        </div>



    </div>








</main>
<?php
    include("footer.php");
?>

</body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

        var messageInput = document.getElementById("messageInput");

        messageInput.value = "Hi chatbot I want a Help..";
    });

        const chatInput = document.querySelector(".chat-input textarea");
        const sendChatBtn = document.querySelector(".chat-input i");
        const chatbox = document.querySelector(".chatbox");
    
        let userMessage;
        const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", className);
    chatLi.innerHTML = `<p>${message}</p>`;
    return chatLi;
}
        const handleChat = () => {
            userMessage = chatInput.value.trim();
            if (!userMessage) return;
            const isOutgoing = chatbox.lastElementChild && chatbox.lastElementChild.classList.contains("outgoing");
            chatbox.appendChild(createChatLi(userMessage, "outgoing"));
            setTimeout(() => {
                if (userMessage.toLowerCase() === "hi chatbot i want a help.." || isOutgoing) {
                    const buttonLi = createChatLi("<p1>Dear passenger<br>Choose an option.</p1> <button>Booking</button> <button>Tracking</button> <button>Payment</button> <button>Contact The Admin</button>", "incoming");
                    chatbox.appendChild(buttonLi);
                    buttonLi.querySelectorAll('button').forEach(button => {
                        button.addEventListener('click', handleButtonClick);
                    });
                } else {
                    setTimeout(() => {
                        chatbox.appendChild(createChatLi("Thinking....", "incoming"));
                    }, 1000);
                }
            }, 1000);
            chatInput.value = "";
        }
        let bookingInitiated = false;

const handleButtonClick = (event) => {
    const buttonText = event.target.textContent;
    chatbox.appendChild(createChatLi(buttonText, "outgoing")); 
    setTimeout(() => {
        if (!bookingInitiated) {
            switch(buttonText.toLowerCase()) {
                case "booking":
                    chatbox.appendChild(createChatLi("<p3>....Booking....</p3> <button>Make Booking</button> <button>View Booking</button> <button>View Schedule</button>", "incoming")); // Change "outgoing" to "incoming"
                    bookingInitiated = true;
                    break;
                case "tracking":
                    chatbox.appendChild(createChatLi("Dear passenger,<br><br>Firstly, book your bus seat. Following this, we'll provide you with a tracking ID and a link via email. You can utilize this information to track your traveling bus.<br><br>Thank You,<br><a href=\"https://mail.google.com/mail/u/0/#search/l.sharneesh%40gmail.com\" class=\"button\" target=\"_blank\">Go To Gmail and Search</a>", "incoming"));
                    break;
                case "payment":
                    chatbox.appendChild(createChatLi("Dear passenger,<br><br>we only accept card payments for Ezbus bookings. In the future, we aim to enhance our payment options to include QR payments. When using a Commerce Bank card, there will be no additional tax of 30/=. However, if any other card is used, a tax of 30/= will apply.<br><br>Thank You.<br>", "incoming")); // Change "outgoing" to "incoming"
                    break;
                    case "contact the admin":
                    chatbox.appendChild(createChatLi("Dear Passenger,<br><br>If you're unable to click the button below, please send an email request directly to the admin to initiate contact.<br><br><a href=\"https://mail.google.com/mail/?view=cm&fs=1&to=l.sharneesh@gmail.com&su=Message%20from%20ChatBot&body=Dear%20Admin,%0D%0A%0D%0AI%20am%20interested%20in%20obtaining%20more%20information%20about%20EZbuslk.%20Could%20you%20please%20contact%20me%20at%20your%20earliest%20convenience%20to%20provide%20further%20details%3F%0D%0A%0D%0AThank%20you.\" class=\"button\" target=\"_blank\">Go To Gmail</a><br><br>Thank you.", "incoming")); // Change "outgoing" to "incoming"
                    break;
                default:
                    break;
            }
        } else {

            switch(buttonText.toLowerCase()) {
                case "make booking":
                    chatbox.appendChild(createChatLi("Booking in progress...", "incoming"));
                    break;
                case "view booking":
                    chatbox.appendChild(createChatLi("Viewing booking...", "incoming"));
                    break;
                case "view schedule":
                    chatbox.appendChild(createChatLi("Viewing schedule...", "incoming"));
                    break;
                default:
                    break;
            }
        }
    }, 1000);
}




        sendChatBtn.addEventListener("click", handleChat);
        document.addEventListener("DOMContentLoaded", function() {
            const menuToggle = document.querySelector('.menuToggle');
            const container = document.querySelector('.container');
    
            menuToggle.onclick = function() {
                container.classList.toggle('active');
            }
            document.getElementById("leftPart").style.display = "none";
        });
    </script>
</html>