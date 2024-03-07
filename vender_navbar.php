<link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
   
   <style>
            /* Resetting default margins and paddings */
         * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         }

         body {
         font-family: Arial, sans-serif;

         }
         #h{
            font-weight: bold;
         }
         .navbar {
         background-color: rgb(0 0 0 / 41%); /* Add a semi-transparent black background */
         backdrop-filter: blur(10px);
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding: 10px;
         border-radius: 7px;
         transition: all ease 0.5s;
         }

         .navbar:hover{
         background-color: rgb(0 0 0 / 31%);
         box-shadow:1px 1px 50px rgb(255 255 255 / 50%);
         }

         .logo-container {
         display: flex;
         align-items: center;
         }

         .logo h2 {
         font-size: 220%;
         color: white;
         text-shadow: 0px 0px 5px #1ebfdd, 0px 0px 5px #1ebfdd;
         transition: all ease 0.5s;
         margin: 0 10px;
         }

         .logo h2:hover{
                  text-shadow:0px 0px 5px#1ebfdd,0px 0px 5px #1ebfdd,0px 0px 5px#1ebfdd,0px 0px 5px #1ebfdd;
         }          

         .logo img {
         width: 60px; /* Adjust the size as needed */
         height: 60px; /* Adjust the size as needed */
         }

         .rotating-logo {
         animation: rotateLogo 6s linear infinite;
         }

         @keyframes rotateLogo {
         0% {
            transform: rotateY(0deg);
         }
         50% {
            transform: rotateY(180deg);
         }
         100% {
            transform: rotateY(360deg);
         }
         }

         .menu-icon {
         display: none; /* Hidden by default for larger screens */
         cursor: pointer;
         }

         .menu-line {
         width: 25px;
         height: 3px;
         background-color: white;
         margin: 4px;
         }

         .nav-links {
         display: flex;
         list-style: none;
         }

         .nav-links li {
         margin-right: 27px;
         }

         .nav-links li a {
         color: white;
         text-decoration: none;
         font-weight: bold; 
         transition: color 0.3s;
         font-size:110%;

         }

         .nav-links li a:hover {
         color: #1ebfdd;
         text-shadow:1px 0px 1px #FFF;
               
         }

         .search-bar {
         display: none; /* Hidden by default */
         position: absolute;
         top: 100%;
         left: 50%;
         transform: translateX(-50%);
         background-color: rgb(0 0 0 / 41%); /* Add a semi-transparent black background */
         backdrop-filter: blur(10px);
         padding: 10px;
         border-radius: 5px;
         border :solid 1px white;
         }

         .search-bar input {
         width: 250px;
         padding: 5px;
         border: none;
         border-radius: 3px;
         outline: none;
         background-color: #C0C0C0;
         margin-right: 10px;
         }

         .close-btn {
         color: white;
         cursor: pointer;
         font-size: 20px;
         }

         a{
            list-style: none;
         text-decoration: none;
         }
         a:hover{
            text-decoration: none;    }

         /* Media query for responsiveness */
         @media screen and (max-width: 768px) {
         .logo-container {
            margin-left: 10px;
         }

         .menu-icon {
            display: block;
         }

         .nav-links {
            display: none;
            position: absolute;
            top: 70px;
            right: 0;
            background-color: rgb(0 0 0 / 50%); /* Add a semi-transparent black background */
            backdrop-filter: blur(10px);
            width: 100%;
            flex-direction: column;
            align-items: center;
         }

         .nav-links.active {
            display: flex;
         }

         .nav-links li {
            margin: 10px 0;
         }

         .search-bar {
            position: relative;
            top: initial;
            left: initial;
            transform: initial;
         }

         .search-bar {
         display: none; /* Hidden by default */
         position: absolute;
         top: 80px;
         left: 90px;
         transform: translateX(-50%);
         background-color: rgb(0 0 0 / 41%); /* Add a semi-transparent black background */
         backdrop-filter: blur(10px);
         padding: 10px;
         border-radius: 5px;
         border :solid 1px white;
         }
         .search-bar input {
         width: 120px;
         padding: 5px;
         border: none;
         border-radius: 3px;
         outline: none;
         background-color: #C0C0C0;
         margin-right: 10px;
         font-size:20px;
         }

         a{
            list-style: none;
            text-decoration: none;
         }

         }


</style>

  
      <nav class="navbar">
         <div class="logo-container">
              <div class="logo">
                  <table>
                          <tr>
                             <td><a href="vender_homepage.php"><h2 id="h">Bid</h2></a></td><td> <a href="vender_homepage.php"><img src="bgimgs/logo.png"  alt="Rotating Image" class="rotating-logo"></a></td> <td><a href="vender_homepage.php"><h2 id="h">Bazzar</h2></a></td>
                          </tr>
                  </table>
              </div>
          </div>
          <div class="menu-icon" onclick="toggleMenu()">
              <div class="menu-line"></div>
              <div class="menu-line"></div>
              <div class="menu-line"></div>
          </div>
          <ul class="nav-links" >
              <li><a href="vender_product.php">Products <i class="ri-product-hunt-line"></i></a></li>
              <li><a href="#">Auction <i class="ri-auction-line"></i></a></li>
              <li><a href="vender_profil.php?bid=<?php include("connect.php"); $select="select * from tbl_vender where vid=$_SESSION[vender_id]"; $result = mysqli_query($connect, $select);$row = mysqli_fetch_array($result); echo $row[0];?>;">Profile<i class="ri-file-user-line"></i></a></li>
              <li><a href="vender_aboutus.php">About us<i class="ri-speak-line"></i></a></li>
              <li id="search-icon"><a href="#" onclick="toggleSearch()">Search <i class="ri-search-line"></i></a></li>
            
          </ul>
          <div class="search-bar">
              <input type="text" placeholder="Search..." id="search">
              <span class="close-btn" onclick="toggleSearch()">&times;</span>
          </div>
      </nav>
     
      <script>
        function toggleMenu() {
         var navLinks = document.querySelector('.nav-links');
         navLinks.classList.toggle('active');
     }
     
     function toggleSearch() {
         var searchBar = document.querySelector('.search-bar');
         searchBar.style.display = searchBar.style.display === 'none' ? 'block' : 'none';
     }
     
        </script>

      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     
      <script>
      $(document).ready(function(){

      });
      </script> -->




