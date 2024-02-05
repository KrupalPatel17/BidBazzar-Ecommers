<?php
include("connect.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
?>
<?php
   
   if(isset($_POST['btnstart'])){
      
       header("location:product.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
     	/* Resetting default margins and paddings */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-image: url("img/bg.jpg");
    background-repeat: no-repeat;
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-attachment: fixed;
    font-family: Arial, sans-serif;
    
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
   
}


    </style>

    <style>

.content {
         position:absolute;
         top:40%;
         left:4%;
         width:40%;
         height:30vh;
         border-radius: 5px;  
}
h1{
            font-size:200%;
            color:#ADD8E6  ;
 }
b{
    
            font-size:130%;
            color:#FFFF00  ;
       
}
h3{
    font-size:160%;
            color:#9B30FF  ;
}
.btnstart{
    width:35%;
    height:5vh;
    background-color:#7A52FF;
    color:#FFF;
    font-size:105%;
    border:solid 1px white;
    border-radius: 5px;
    transition: all ease 0.5s;
}
.btnstart:hover{
    width:36%;
    height:6vh;
    background-color:#6b3eff;
    filter:drop-shadow(1px 1px 10px rgb(255 255 255 / 90%));
    transition: all ease 0.5s;
}

@media screen and (max-width: 768px) {

    .content {
         position:absolute;
         top:40%;
         left:4%;
         width:100%;
         height:30vh;
         border-radius: 5px;  
}
h1{
            font-size:40px;
            color:#ADD8E6  ;
 }

h3{
    font-size:35px;
            color:#9B30FF  ;
}
    .btnstart{
    width:55%;
    height:5vh;
    background-color:#7A52FF;
    color:#FFF;
    font-size:20px;
    border:solid 1px white;
    border-radius: 5px;
    transition: all ease 0.5s;
}

}
    </style>
</head>

   

<body>
    <form action="" method="POST">
      

    <nav class="navbar">
       <div class="logo-container">
            <div class="logo">
                <table>
                        <tr>
                            <td><h2>Bid</h2></td><td> <img src="img/logo.png"  alt="Rotating Image" class="rotating-logo"></td> <td><h2>Bazzar</h2></td>
                        </tr>
                </table>
            </div>
        </div>
        <div class="menu-icon" onclick="toggleMenu()">
            <div class="menu-line"></div>
            <div class="menu-line"></div>
            <div class="menu-line"></div>
        </div>
        <ul class="nav-links">
            <li><a href="#">Cart</a></li>
            <li><a href="#">Auction</a></li>
            <li><a href="profil.php">Profile</a></li>
            <li><a href="#">About us</a></li>
            <li id="search-icon"><a href="#" onclick="toggleSearch()">Search</a></li>
            <li><a href="#">Signup</a></li>
        </ul>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <span class="close-btn" onclick="toggleSearch()">&times;</span>
        </div>
    </nav>
    
    <div class="content">
       <h1>Hello,<b><?php echo $_SESSION['username']; ?></b> </h1>
       <h3>Win An Auctions & Take Your Things  </h3>

       <input type="submit" name="btnstart" value="Start Shopping" class="btnstart">
    </div>
    
  

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

</form>
</body>
</html>