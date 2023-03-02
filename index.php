<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hopi Crafts</title>
    <script src="script.js"></script> 
    <link rel="icon" type="image/png" href="sources/img/logo.png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>

    <div class="main">
        <header>
        
            <div class="logo"><span>Hopi Crafts</span></div>
            <div class="nav-links"> 
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#collections">Collections</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#about-us">About Us</a></li>
                    <li><a href="sources\php\login.php">Sign In</a></li>
                </ul>
            </div>
            <div class="hamburger-menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </header>
             <div class="png-carousel" id="home">
                <h1>< Art Collection for the Month ></h1>
                <p>They made the Art for the month for a reason</p>
                
                
                 
                <div class="carousel-images">
                         <img class="carousel-img" src="sources\img\Line Art\FA - HJS_20220423014918.png" alt="#">
                         <img class="carousel-img" src="sources/img/Chibi Art/Base 11_20220717232125(1).png" alt="#">
                         <img class="carousel-img" src="sources\img\Line Art\Untitled6_20220406014651.png" alt="#">                
                         <img class="carousel-img" src="sources\img\Crafts\IMG20230121021052.jpg" alt="#">
                         <img class="carousel-img" src="sources\img\Crafts\IMG_20221224_090250.jpg" alt="#">
                         <img class="carousel-img" src="sources\img\Crafts\IMG_20220212_211753_684(1).webp" alt="#">
             
                </div> 
         
                 <button class="carousel-prev arrow">&#8656;</button>  
                 <button class="carousel-next arrow">&#8658;</button>  
 
             </div>

            
             <div class="collections" id="collections">
                <h1>< Collections ></h1>
                <p>Explore our Wide Variety of Art Collections</p>
                <img class="carousel-img" src="sources/img/Line Art/Untitled19_20211219222934.png" alt="#">
                <img class="carousel-img" src="sources\img\Crafts\IMG20230105031819.jpg" alt="#">
                <img class="carousel-img" src="sources/img/Chibi Art/Chibi OC 2_20220718014643(2).png" alt="#">
    
             </div>
            
             <div class="shop" id="shop">
                <div class="column left">
                    <h1>< Shop ></h1>
                    <p>Order your art and it will be delivered in your front door</p>
                    <a href="sources\html\shop.html"><button class="click">Visit Shop</button></a>
                </div>
                <div class="column right">
                    <img class="shop-img" src="sources\img\Line Art\Untitled31_20220421025406.png" alt="#"><br>
                </div>
             </div>

             <div class="about-us" id="about-us">
                <div class="column to-left">
                <img src="sources\img\logo.png" alt="#">
                </div>
                <div class="column to-right">
                    <h1>About Hopi Crafts</h1>
                    <p>Welcome to Hopi Craft Website, where I showcase my passion for art and creativity. I am a dedicated artist who believes in the power of art to transform lives and bring joy to the world. My goal is to inspire others through my artwork and to share my love of art with the world</p>
                </div>
             </div>
    <script>
        const hamburger = document.querySelector('.hamburger-menu');
        const navLinks = document.querySelector('.nav-links');
        const links = document.querySelectorAll('.nav-links li');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            links.forEach(link => {
            link.classList.toggle('fade');
            });
            hamburger.classList.toggle('open');
        });

        links.forEach(link => {
            link.addEventListener('click', () => {
            navLinks.classList.remove('open');
            hamburger.classList.remove('open');
            });
        });
    </script>
</body>
</html>
=======
<?php
include_once 'sources/php/footer.php';
?>
>>>>>>> main
