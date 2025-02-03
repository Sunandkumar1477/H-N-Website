<?php
require_once 'connection.php';


// Check if user is logged in
$is_logged_in = isset($_SESSION['user_id']); // Adjust according to your session variable

// Redirect based on login status
$exam_link = $is_logged_in ? 'exam.php' : 'login.php?redirect=exam.php';


// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $resume_path = "H&Nadmin777/uploads/" . basename($_FILES["resume"]["name"]); // Upload directory

    // Upload file
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_path)) {
        // Insert data into database
        $sql = "INSERT INTO applications (name, contact, email, position, resume_path)
                VALUES ('$name', '$contact', '$email', '$position', '$resume_path')";

        if ($conn->query($sql) === TRUE) {
            echo "Application submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/logo.svg" type="image/x-icon">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles3.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/style1.1.css">
 

    <title>H&N Health Care</title>
    <style>
        /* Hover effect for file input */
        .nav__logo img {
            margin-left: 20px;
            height: 80px;
            width: 200px;
            border-radius: 20px;
        }
        .form-group input[type="file"]:hover {
            background-color: #f0f0f0; /* Example background color on hover */
            color: #333; /* Example text color on hover */
            cursor: pointer; /* Change cursor to pointer on hover */
        }

        .footer__newsletter {
            display: flex;
            align-items: center;
        }

        .footer__input {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            font-size: 14px;
            width: 200px;
            background-color: white; /* Set background color to white */
            color: black; /* Set text color to black for better readability */
        }

        .footer__subscribe {
            background-color: #e6007e;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .footer__subscribe:hover {
            background-color: black;
        }

        /* Hover effect for Home button */
        .nav__link {
            position: relative;
            display: inline-block;
            color: #333;
            text-decoration: none;
            padding: 10px 20px;
            transition: color 0.3s ease;
        }

        .nav__link:hover {
            color: #e6007e; /* Change text color on hover */
        }

        .nav__link::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #e6007e;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        .nav__link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }


            /*=============== MEDIA QUERIES ===============*/

/* Tablet */
@media (max-width: 1024px) {
    .nav__logo {
        width: 40%;
        height: 60px;
        margin-top: 15px;
    }

    .home__data, .specs__container, .footer__container {
        grid-template-columns: 1fr;
    }

    .specs__content, .specs__containera, .specs__container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .specs__img {
        width: 80%;
        margin-bottom: 20px;
    }

    .home__description {
        padding: 0 20px;
    }

    .footer__content {
        margin-bottom: 20px;
    }

    .footer__newsletter {
        flex-direction: column;
    }

    .footer__input {
        width: 100%;
        margin-bottom: 10px;
    }
}

/* Mobile Landscape */
@media (max-width: 768px) {
    .nav__logo img {
        width: 30%;
        height: 40px;
        margin-top: 5px;
    }

    .home__data, .specs__container, .footer__container {
        grid-template-columns: 1fr;
    }

    .specs__content, .specs__containera, .specs__container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .specs__img {
        width: 90%;
        margin-bottom: 20px;
    }

    .home__description {
        padding: 0 15px;
    }

    .footer__content {
        margin-bottom: 20px;
    }

    .footer__newsletter {
        flex-direction: column;
    }

    .footer__input {
        width: 100%;
        margin-bottom: 10px;
    }
}

/* Mobile Portrait */
@media (max-width: 480px) {
    .nav__logo {
        width: 30%;
        height: 40px;
        margin-top: 5px;
    }

    .nav__menu {
        flex-direction: column;
    }

    .nav__item {
        margin-bottom: 10px;
    }

    .home__description {
        padding: 0 10px;
    }

    .specs__img {
        width: 100%;
        margin-bottom: 15px;
    }

    .footer__content {
        margin-bottom: 15px;
    }

    .footer__newsletter {
        flex-direction: column;
    }

    .footer__input {
        width: 100%;
        margin-bottom: 10px;
    }
}

    </style>
</head>
<body>
    <!--=============== HEADER ===============-->

    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo" >
                <img src="assets/img/hnlogo1.2.png" alt="">
            </a>


          
        </nav>
    </header>
    <!--=============== FORM ===============-->
    <div class="form-container"
    style=" margin-top: 100px;">
        <h1>Application Form</h1>
        <form action="form.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="position">Position You Are Applying For:</label>
                <input type="text" id="position" name="position" required>
            </div>
            <div class="form-group">
        <label for="resume">Upload Resume:</label>
        <input type="file" id="resume" name="resume" required>
    </div>
    <div class="form-group">
        <button type="submit">Submit</button>
    </div>
    <div class="form-group">
        <a href="display_question.php">Start test</a>
    </div>
</form>
    </div>
    <!--=============== Footer ===============-->
    <footer class="footer section" style="background: #333;">
    <div class="footer__container container grid"  style="margin-top: -70px;">
        <div class="footer__content">
            <div class="footer__logo-container">
                <a href="#" class="footer__logo">
                    <img src="assets/img/hnlogo1.2.png" alt="logo">
                </a>
            </div>
        </div>

        <div class="footer__content" style="color: white; padding-left: 20px;">
            <h3 class="footer__title">H&N Healthcare Services Pvt. Ltd.</h3>
            <div class="footer__address">
                Flat #208, Sri Sheshaiah Ratnam Heights Opp Yantra Evy, Vanasthalipuram Hyderabad 500070
            </div>
        </div>

        <div class="footer__content" style="color: white; padding-left: 20px;">
            <h3 class="footer__title">Contact Us</h3>
            <div class="footer__address">
                <li>info@hnhealthcare.com</li>
                <li>+91 12345 67890</li>
            </div>
        </div>

        <div class="footer__content" style="color: white; padding-left: 20px;">
            <h3 class="footer__title">Our Newsletter</h3>
            <div class="footer__newsletter">
                <input type="email" placeholder="Your email" class="footer__input">
                <button class="footer__subscribe">Subscribe</button>
            </div>
        </div>
    </div>
    <p class="footer__copy" style="color: white; text-align: center;">&#169; H&N Health Care Service PVT.ltd</p>
</footer>





    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-s-line scrollup__icon"></i>
    </a>
    <script src="assets/js/back2.js"></script>
    <!--=============== First animation  ===============-->
    <!-- Include TweenLite library -->

<script>


    document.addEventListener('scroll', function() {
            const navbar = document.querySelector('.nav');
            if (window.scrollY > 0) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        /*=============== SHOW MENU ===============*/
        const navMenu = document.getElementById('nav-menu'),
            navToggle = document.getElementById('nav-toggle'),
            navClose = document.getElementById('nav-close');

        /*===== MENU SHOW =====*/
        if (navToggle) {
            navToggle.addEventListener('click', () => {
                navMenu.classList.add('show-menu');
            });
        }

        /*===== MENU HIDDEN =====*/
        if (navClose) {
            navClose.addEventListener('click', () => {
                navMenu.classList.remove('show-menu');
            });
        }
</script>
    <!--=============== SCROLL REVEAL ===============-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js'></script>
    <script src="assets/js/script.js"></script>

    <!-- JavaScript for bubbles -->
   

</body>
</html>