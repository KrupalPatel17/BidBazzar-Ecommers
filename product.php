<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url('bgimgs/p.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;/
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 3%;
        }

        .slider-container {
            box-shadow: 3px 3px 8px black;
            width: 70%;
            height: 70vh;
            overflow: hidden;
            border-radius: 10px;
            transition: all 1s ease;
            margin-top: 20px;
            margin-bottom: 50px;
            border: 2px solid black;
        }

        .slider-container:hover {
            transform: scale(1.03);
            box-shadow: 10px 10px 13px black;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slide {
            flex: 0 0 100%;
        }

        /* Categories */
        .categories {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .category {
            position: relative;
            width: 14%;
            height: 30vh;
            border-radius: 50%;
            border: 3px solid #cfcfcf;
            outline: 3px solid #5d5d5d;
            overflow: hidden;
            cursor: pointer;
            margin: 10px;
            transition: all ease 0.8s;
            filter: drop-shadow(8px 8px 7px black);
        }

        .category:hover {
            border: 4px solid #5d5d5d;
            outline: 4px solid #cfcfcf;
            transform: scale(1.05);
        }


        .category img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: filter 0.3s ease;
        }

        .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            /* Semi-transparent white background */
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            opacity: 0;
            /* Initially hidden */
            transition: opacity 0.3s ease;
        }

        .category:hover .overlay {

            opacity: 1;
            /* Show overlay on hover */
        }

        .category:hover {

            transform: scale(1.05);
            /* Increase size on hover */
        }

        .category img:hover {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(3px);
            /* Apply blur effect */
        }

        @media (max-width: 768px) {
            .category {
                width: 30%;
                height: 90px;
            }

            .slider-container {
                width: 90%;
                height: 40vh;
            }

            .slide {
                flex: 0 0 100%;
            }

            .slider-container {
                width: 90%;
                height: 20vh;
                overflow: hidden;
                border-radius: 10px;
                transition: all each 1s;
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include("connect.php");
    include("navbar2.php");
    if (!isset($_SESSION['username'])) {
        header("location:login.php");
    }
    ?>

    <div class="categories">
        <div class="category" data-name="Electronics">
            <a href="phone_p.php"><img src="bgimgs/pho2.jpg" alt="Electronics">
                <div class="overlay">Phones</div>
            </a>
        </div>
        <div class="category" data-name="Electronics">
            <a href="gameing_p.php"><img src="bgimgs/gc.jpeg" alt="Electronics">
                <div class="overlay">Gaming</div>
            </a>
        </div>
        <div class="category" data-name="Electronics">
            <a href="cloths_p.php"><img src="bgimgs/clot2.jpg" alt="Home">
                <div class="overlay">Clothes</div>
            </a>
        </div>
        <div class="category" data-name="Electronics">
            <a href="electronic_p.php"><img src="bgimgs/ele3.jpg" alt="Phone">
                <div class="overlay">Electronics</div>
            </a>
        </div>
        <div class="category" data-name="Electronics">
            <a href="home_p.php"><img src="bgimgs/home2.jpg" alt="Clothes">
                <div class="overlay">Home</div>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="slider-container">
            <div class="slider">
                <div class="slide"><img src="bgimgs/gameing_p.jpg" alt="Slide 1" width="100%"></div>
                <div class="slide"><img src="bgimgs/ele2.jpg" alt="Slide 2" width="100%"></div>
                <div class="slide"><img src="bgimgs/cloths.jpg" alt="Slide 3" width="100%"></div>
            </div>
        </div>
    </div>

    <script>
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');

        let currentIndex = 0;
        const slideWidth = slides[currentIndex].clientWidth;

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        }

        function updateSlider() {
            slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        }

        setInterval(nextSlide, 3000);
    </script>
</body>

</html>