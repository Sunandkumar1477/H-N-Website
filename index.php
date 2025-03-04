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
    <link rel="stylesheet" href="assets/css/style1.1.css">
    <link rel="stylesheet" href="assets/css/index.css">

    <title>H&N Health Care</title>
    <style>
        #large-header {
            background-image: url('assets/img/Main3.jpg');
        }
        /* .background-container {
            background-image: url('assets/img/home1.png');
        } */
        .background-container1 {
            background-image: url('assets/img/image8.jpg');
            border-radius: 40px;
            background-position: center;
            padding: 50px 0;
        }
         /* Background Container */
    .background-container {
        position: relative;
        width: 100%;
        height: 100vh; /* Full height */
        overflow: hidden;
    }
    .background-container {
    background: url('assets/img/our.jpg') no-repeat center center/cover;
    width: 100%;
    height: 100vh; /* Full screen height */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white; /* Text color for readability */
    padding: 20px;
}

.home__description {
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background for readability */
    padding: 20px;
    border-radius: 10px;
}

    /* Video Styling */
    #home-background-video {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -1; /* Ensure the video is behind the content */
    }

    /* Content Styling */
    .home__container {
        position: relative;
        z-index: 1; /* Place content above the video */
    }

    .home__description {
        color: white; /* Ensure text is readable over the video */
        font-size: 1.2em;
        line-height: 1.5;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Add contrast for readability */
    }

    .bold {
        font-weight: bold;
    }
        .navbar-container {
            display: flex;
            max-width: 780px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nav {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            margin-left: 300px;
            margin-top: -80px;
            border-radius: 30px;
        }
        .nav__logo img {
            margin-left: 20px;
            height: 80px;
            width: 200px;
            border-radius: 20px;
        }
        .nav__menu {
            display: flex;
            align-items: center;
            list-style: none;
        }
        .nav__list {
            display: flex;
            margin: 0;
            padding: 0;
        }
        .nav__item {
            margin: 0 15px;
        }
        .nav__link {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            transition: color 0.3s, border-bottom 0.3s;
            position: relative;
        }
        .nav__link.active-link,
        .nav__link:hover {
            color: #e6007e;
        }
        .nav__link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #e6007e;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }
        .nav__link.active-link::after,
        .nav__link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
        .nav__toggle,
        .nav__close {
            display: none;
        }
        .scrolled {
            background-color: #f8f8f8;
        }
        .specs__content h1 {
            text-shadow: 2px 2px 4px black;
        }
        .specs__data {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }
        .specs__data::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 100%;
            height: 2px;
            background:  #f795cb;
            opacity: 0;
            transition: all 0.3s ease;
        }
        .specs__data:hover::after {
            opacity: 1;
            height: 100%;
            border-radius: 5px;
        }
        .specs__data span {
            position: relative;
            z-index: 1;
        }
        #details-container {
            color: white;
            margin-top: 20px;
        }
        #details-container:hover::after {
            opacity: 0;
            height: 2px;
        }
        .specs__containera {
            margin-left: 30px;
            justify-content: center;
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
            background-color: white;
            color: black;
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
        .main-title {
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .nav {
                display: none; /* Hide the navbar */
            }
            .nav__logo img {
                width: 10%;
                height: 30px;
                margin-top: 5px;
            }
  
    .home__description span u {
        font-size: 1.3rem;
    }
            .home__footer {
                text-align: center; /* Center-align text for better appearance on small screens */
            }
            .home__data {
                padding: 10px; /* Add padding for spacing */
            }
            .main-title {
                font-size: 16px; /* Adjust title font size for small screens */
                padding: 10px; /* Add padding for better spacing */
            }
            .specs__content.grid{
                margin-left: -500px;
            }
            .home__container {
        padding: 20px;
    }
    
    .home__description {
                 margin-top: 20px;
                font-size: 14px; /* Adjusted for readability */
                text-align: justify; /* Improve text alignment */
                line-height: 1.6; /* Increase line spacing for readability */
                padding: 0 15px; /* Add padding for better spacing */
    }

    .home__description span u {
        font-size: 1.2rem;
    }
    .specs__containera {
            margin-bottom: 70px;
         
        }
    .footer__logo-container img{
            height: 30px;
            width: 70px;
        }
        }
        @media (max-width: 480px) {
            .nav {
                display: none; /* Hide the navbar */
            }
            .nav__logo img {
                width: 30%;
                height: 40px;
                margin-top: 5px;
            }
            .nav__menu {
                display: flex;
                flex-direction: column;
                background-color: transparent; /* Ensure no white background */
                padding: 0; /* Remove padding if it's causing the white box */
            }
            .nav__item {
                margin: 10px 0;
            }
            .nav__link {
                padding: 10px 0; /* Adjust padding to ensure no extra space causing white box */
                color: #333; /* Ensure text color is visible */
            }
            .home__description {
                margin-top: 20px;
                font-size: 14px; /* Adjusted for readability */
                width: 150%; /* Ensure it fits within the screen */
                text-align: justify; /* Improve text alignment */
                line-height: 1.6; /* Increase line spacing for readability */
                padding: 0 15px; /* Add padding for better spacing */
            }
            .home__footer {
                text-align: center; /* Center-align text for better appearance on small screens */
            }
            .home__data {
                padding: 10px; /* Add padding for spacing */
            }
            .main-title {
                font-size: 16px; /* Adjust title font size for small screens */
                padding: 10px; /* Add padding for better spacing */
            }
            .specs__content.grid {
                margin-left: -110px;
            }
            .specs__container.container.grid {
                margin-left: 150px;
            }
            .specs__data {
                display: flex;
                margin-bottom: 20px;
                margin-left: -10px;
            }
            .career h1 {
                margin-left: 250px;
                margin-top: 380px;
            }
            .specs__container.container.gridc{
                margin-left: -200px;
            }
            .careers__btn{
                margin-left: 300px;
            }
            .home__container {
        max-width: 90%;
        padding: 15px;
    }

    .home__description {
        font-size: 0.9rem;
    }

    .home__description span u {
        font-size: 1.2rem;
    }
    .specs__containera {
            margin-bottom: 70px;
         
        }
        .footer__logo-container img{
            height: 30px;
            width: 70px;
        }
        }
    </style>
</head>
<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
    <a href="#" class="nav__logo">
        <img src="assets/img/hnlogo1.2.png" alt="H&N Logo">
    </a>
    <nav class="nav navbar-container">
        
        <div class="nav__menu" id="nav-menu">
            
                <li class="nav__item">
                    <a href="#home" class="nav__link ">Home</a>
                </li>
                <li class="nav__item">
                    <a href="#Resources" class="nav__link">Services</a>
                </li>
                <li class="nav__item">
                    <a href="#Careers" class="nav__link">Careers</a>
                </li>
                <li class="nav__item">
                  <a href="#products" class="nav__link">About H&N</a>
                </li> 
                <!---<li class="nav__item">
                    <a href="display_question.php" class="careers__btn">Start Online Test</a>
                </li>--->     
        </div>   
    </nav>
</header>
    <main class="main">
    <div id="large-header" class="large-header">
    <canvas id="demo-canvas"></canvas>
    <h4 class="main-title" >"Where Accuracy Meets Innovation.!"
        <span ></span></h4>
    </div>
        <!--=============== HOME ===============-->
        <section class="" id="home">
            <div class="background-container">
                <!-- Content Container -->
                <div class="home__container container grid">
                    <div class="home__data">
                        <div class="home__footer">  
                            <p class="home__description">
                                <span><u>OUR STORY</u></span><br><br>
                                H&N Healthcare Services Pvt Ltd was founded on May 2024 with a clear vision 
                                to transform the Medical Coding Industry by addressing the critical gap in quality 
                                training. Our mission is to provide high-standard medical coding education, create
                                sustainable employment opportunities, and foster a positive work culture. With a strong 
                                emphasis on work-from-home flexibility, we aim to empower professionals, especially women, by 
                                equipping them with the necessary skills to build successful careers in the industry.
                                <br><br>
                                Recognizing the challenges within the Medical Coding sector, our company is committed 
                                to raising industry standards through expert-led training programs. By ensuring accessibility,
                                efficiency, and excellence, we strive to bridge the gap between aspiring professionals and quality 
                                education. H&N Healthcare Pvt Ltd stands for innovation, opportunity, and integrity,
                                paving the way for a new era in medical coding. Our journey is driven by the ambition to not only 
                                build a successful business but also create meaningful employment and positively impact lives.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
       <!--=============== Resource ===============-->
       <section class="specs section grid" id="Resources">
            <div class="background-container1">
                <h2 class="section__title section__title-gradient" style="font-family: Arial, sans-serif; color: white;">Services</h2>

                <div class="specs__container container grid" style="font-weight: bold;">
                    <div class="specs__content grid">
                        <div class="specs__data" id="whitepapers">
                            <h1 style="font-family: Arial, sans-serif;">
                                <span style="color: white; font-weight: bold;">Medical Coding Services</span><br>
                            </h1>
                        </div>

                        <div class="specs__data" id="ebook">
                            <h1 style="font-family: Arial, sans-serif;">
                                <span style="color: white; font-weight: bold;">What We Offer</span><br>
                            </h1>
                        </div>

                        <div class="specs__data" id="infographics">
                            <h1 style="font-family: Arial, sans-serif;">
                                <span style="color: white; font-weight: bold;">Benefits of with Us</span><br>
                            </h1>
                        </div>
                        <div class="specs__data" id="Why">
                            <h1 style="font-family: Arial, sans-serif;">
                                <span style="color: white; font-weight: bold;">Why Choose H&N Services?</span><br>
                            </h1>
                        </div>
                    </div>
                    
                    <div id="image-container">
                        <img id="space-image" style="width:2000px; border-radius: 50px;" src="assets/img/image9.1.jpg" alt="" class="specs__img">
                    </div>
                    <div id="details-container" class="specs__data">
                        <!-- Details will be updated here -->
                    </div>
                </div>
            </div>
        </section>
        <!--=============== Careers ===============-->
        <section class="specs section grid" id="Careers">
        <div class="background-container2" >
            <h2 class="section__title section__title-gradient">Careers</h2>

            <div class="specs__container container gridc">
                <div class="careerimage">
                    <img src="assets/img/carer.jpeg" alt="" class="specs__img careers__img">
                    </div>
                <div class="career">
                    <h1 style="font-family: Arial, sans-serif; color: black;">
                        <span style="color: #E6007E; font-weight: bold;">Careers</span><br>
                        Come, be a part of our H&N Tribe!
                    </h1>
                    <a href="mailto:hr@hnhcservices.com?subject=Job%20Application&body=Dear%20HR,%0D%0A%0D%0AI%20am%20interested%20in%20joining%20your%20team.%20Please%20find%20my%20resume%20attached.%0D%0A%0D%0ARegards,%0D%0A[Your%20Name]" 
                    class="careers__btn">
                    Join
                 </a>                   
                </div>
            </div>
            </div>
        </section>

        <!--=============== About H&N ===============-->
        <section class="products section" id="products">
            <h2 class="section__title section__title-gradient products__line">
                About H&N
            </h2>

            <div class="specs__containera">
                <h1 style="font-family: 'Roboto', sans-serif; color: #333; font-weight: 400; line-height: 1.6;">
                    <span style="color: #E6007E; font-weight: 700;">OUR MISSION</span><br>
                    Empowering professionals through high-quality medical coding training, 
                    fostering a positive work culture, and creating sustainable employment opportunities.
                    <br>
                    H&N Health Care Private Limited was established with a vision to 
                    revolutionize the medical coding industry. Recognizing the industry's challenges, 
                    particularly the lack of quality training, we are committed to bridging this gap 
                    by offering top-tier training programs. Our company operates on a work-from-home model, 
                    providing flexibility while ensuring excellence.
                </h1>
                <h1 style="font-family: 'Roboto', sans-serif; color: #333; font-weight: 400; line-height: 1.6;">
                    <span style="color: #E6007E; font-weight: 700;">OUR VISION</span><br>
                    Driven by the ambition of becoming a leading women entrepreneur, our founder 
                    is dedicated to empowering individuals—especially women—by equipping them with 
                    the skills and opportunities necessary for career success. Through our initiatives, 
                    we aim to not only elevate industry standards but also create a thriving community 
                    of skilled professionals.
                    <br>
                    H&N Healthcare Pvt Ltd stands for quality, opportunity, and innovation.
                     We are here to shape the future of medical coding with expertise and integrity.
                </h1>
            </div>            
        </section>
    </main>
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
            <h2>Address:</h2>
            <h3 class="footer__title">H&N Healthcare Services Pvt. Ltd.</h3>
            <div class="footer__address">
               L.B Nagar,<br> Hyderabad-500070
            </div>
        </div>

<div class="footer__content" style="color: white; padding-left: 20px;">
    <h2>Contact Us:</h2>
    <h3 class="footer__title">
        <a href="mailto:hr@hnhcservices.com" style="color: white; text-decoration: none;">
            hr@hnhcservices.com
        </a>
    </h3>
</div>


        <!----<div class="footer__content" style="color: white; padding-left: 20px;">
            <h3 class="footer__title">Contact Us</h3>
            <div class="footer__address">
                <li>info@hnhealthcare.com</li>
                <li>+91 12345 67890</li>
            </div>
        </div>--->

       <!---<div class="footer__content" style="color: white; padding-left: 20px;">
            <h3 class="footer__title">Our Newsletter</h3>
            <div class="footer__newsletter">
                <input type="email" placeholder="Your email" class="footer__input">
                <button class="footer__subscribe">Subscribe</button>
            </div><br>
            <a href="display_question.php" class="careers__btn">Start Online Test</a>
        </div>--->
    </div>
    <p class="footer__copy" style="color: white; text-align: center;">H&N Healthcare Service Pvt Ltd</p>
</footer>




    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/back2.js"></script>
    <!--=============== First animation  ===============-->
    <!-- Include TweenLite library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script>
    
        document.getElementById("whitepapers").addEventListener("click", function() {
            document.getElementById("space-image").src = "assets/img/Mediacalcoding.jpeg";
            document.getElementById("details-container").innerHTML = "<p>Accuracy, You Can Trust, Medical coding is the backbone of efficient healthcare management. At H&N Healthcare Services, we provide accurate, reliable, and compliant coding solutions tailored to meet the needs of healthcare providers. Our certified coders ensure precise documentation, streamlining your billing process and maximizing reimbursements.</p>";
        });

   

        document.getElementById("ebook").addEventListener("click", function() {
            document.getElementById("space-image").src = "assets/img/image9.1.jpg";
            document.getElementById("details-container").innerHTML = "<p>Certified Expertise: Our team of certified coding specialists (CPC, CCS, etc.) stays up-to-date with the latest coding standards, including ICD-10, CPT, and HCPCS. Specialized Coding: Expertise across multiple specialties, including radiology, cardiology, orthopedics, and more. Compliance First: Adherence to all regulatory requirements to minimize risks and audits. Custom Solutions: Tailored coding services to suit the unique needs of your practice or healthcare facility. </p>";
        });

        document.getElementById("infographics").addEventListener("click", function() {
            document.getElementById("space-image").src = "assets/img/image9.png";
            document.getElementById("details-container").innerHTML = "<p>Improved Revenue Cycle: Accurate coding reduces claim denials and expedites reimbursements. Cost-Effective Solutions: Save time and resources with our streamlined processes. Enhanced Compliance: Stay audit-ready with our meticulous attention to regulatory updates. Focus on Patient Care: Let us handle the complexities of coding so you can focus on what matters most—your patients. </p>";
        });
        document.getElementById("Why").addEventListener("click", function() {
            document.getElementById("space-image").src = "assets/img/image12.jpg";
            document.getElementById("details-container").innerHTML = "<p>With a deep commitment to excellence, we ensure that every code reflects the highest standards of accuracy and integrity. Our mission is to empower healthcare providers by delivering coding solutions that support both operational efficiency and exceptional patient care. </p>";
        });


    (function() {

        var width, height, largeHeader, canvas, ctx, points, target, animateHeader = true;

        // Main
        initHeader();
        initAnimation();
        addListeners();

        function initHeader() {
            width = window.innerWidth;
            height = window.innerHeight;
            target = {x: width / 2, y: height / 2};

            largeHeader = document.getElementById('large-header');
            largeHeader.style.height = height + 'px';

            canvas = document.getElementById('demo-canvas');
            canvas.width = width;
            canvas.height = height;
            ctx = canvas.getContext('2d');

            // create points
            points = [];
            for (var x = 0; x < width; x = x + width / 20) {
                for (var y = 0; y < height; y = y + height / 20) {
                    var px = x + Math.random() * width / 20;
                    var py = y + Math.random() * height / 20;
                    var p = {x: px, originX: px, y: py, originY: py};
                    points.push(p);
                }
            }

            // for each point find the 5 closest points
            for (var i = 0; i < points.length; i++) {
                var closest = [];
                var p1 = points[i];
                for (var j = 0; j < points.length; j++) {
                    var p2 = points[j]
                    if (!(p1 === p2)) {
                        var placed = false;
                        for (var k = 0; k < 5; k++) {
                            if (!placed) {
                                if (closest[k] === undefined) {
                                    closest[k] = p2;
                                    placed = true;
                                }
                            }
                        }

                        for (var k = 0; k < 5; k++) {
                            if (!placed) {
                                if (getDistance(p1, p2) < getDistance(p1, closest[k])) {
                                    closest[k] = p2;
                                    placed = true;
                                }
                            }
                        }
                    }
                }
                p1.closest = closest;
            }

            // assign a circle to each point
            for (var i in points) {
                var c = new Circle(points[i], 2 + Math.random() * 2, 'rgba(255,255,255,0.3)');
                points[i].circle = c;
            }
        }

        // Event handling
        function addListeners() {
            if (!('ontouchstart' in window)) {
                window.addEventListener('mousemove', mouseMove);
            }
            window.addEventListener('scroll', scrollCheck);
            window.addEventListener('resize', resize);
        }

        function mouseMove(e) {
            var posx = posy = 0;
            if (e.pageX || e.pageY) {
                posx = e.pageX;
                posy = e.pageY;
            } else if (e.clientX || e.clientY) {
                posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
                posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
            }
            target.x = posx;
            target.y = posy;
        }

        function scrollCheck() {
            if (document.body.scrollTop > height) animateHeader = false;
            else animateHeader = true;
        }

        function resize() {
            width = window.innerWidth;
            height = window.innerHeight;
            largeHeader.style.height = height + 'px';
            canvas.width = width;
            canvas.height = height;
        }

        // animation
        function initAnimation() {
            animate();
            for (var i in points) {
                shiftPoint(points[i]);
            }
        }

        function animate() {
            if (animateHeader) {
                ctx.clearRect(0, 0, width, height);
                for (var i in points) {
                    // detect points in range
                    if (Math.abs(getDistance(target, points[i])) < 4000) {
                        points[i].active = 0.3;
                        points[i].circle.active = 0.6;
                    } else if (Math.abs(getDistance(target, points[i])) < 20000) {
                        points[i].active = 0.1;
                        points[i].circle.active = 0.3;
                    } else if (Math.abs(getDistance(target, points[i])) < 40000) {
                        points[i].active = 0.02;
                        points[i].circle.active = 0.1;
                    } else {
                        points[i].active = 0;
                        points[i].circle.active = 0;
                    }

                    drawLines(points[i]);
                    points[i].circle.draw();
                }
            }
            requestAnimationFrame(animate);
        }

        function shiftPoint(p) {
            gsap.to(p, {duration: 1 + 1 * Math.random(), x: p.originX - 50 + Math.random() * 100, y: p.originY - 50 + Math.random() * 100, ease: "circ.inOut", onComplete: function() {
                shiftPoint(p);
            }});
        }

        // Canvas manipulation
        function drawLines(p) {
            if (!p.active) return;
            for (var i in p.closest) {
                ctx.beginPath();
                ctx.moveTo(p.x, p.y);
                ctx.lineTo(p.closest[i].x, p.closest[i].y);
                ctx.strokeStyle = 'rgba(156,217,249,' + p.active + ')';
                ctx.stroke();
            }
        }

        function Circle(pos, rad, color) {
            var _this = this;

            // constructor
            (function() {
                _this.pos = pos || null;
                _this.radius = rad || null;
                _this.color = color || null;
                     })();

            this.draw = function() {
                if (!_this.active) return;
                ctx.beginPath();
                ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
                ctx.fillStyle = 'rgba(156,217,249,' + _this.active + ')';
                ctx.fill();
            };
        }

        // Util
        function getDistance(p1, p2) {
            return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
        }
    })();

    document.addEventListener('scroll', function() {
            const navbar = document.querySelector('.nav');
            if (window.scrollY > 0) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

       // Mobile menu toggle
       document.addEventListener('DOMContentLoaded', function () {
            const hamburger = document.getElementById('hamburger');
            const navMenu = document.getElementById('nav-menu');

            hamburger.addEventListener('click', () => {
                navMenu.classList.toggle('show');
            });
        });

        // Active link and navbar background on scroll
        document.addEventListener('scroll', function () {
            const nav = document.querySelector('.nav');
            const links = document.querySelectorAll('.nav__link');

            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }

            links.forEach(link => {
                const section = document.querySelector(link.getAttribute('href'));

                if (
                    section.offsetTop <= window.scrollY + 60 &&
                    section.offsetTop + section.offsetHeight > window.scrollY + 60
                ) {
                    link.classList.add('active-link');
                } else {
                    link.classList.remove('active-link');
                }
            });
        });
        
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
