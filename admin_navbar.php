<!-- // include("connect.php");
// $uid=$_SESSION['users_id'];


// $sql="SELECT * FROM tbl_addtocart where user_id='$uid'";
// $result=mysqli_query($connect,$sql) or die("SQL FAIELD");
// if(mysqli_num_rows($result)){
// $c=$row["user_id"];
// } -->

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

   #h {
      font-weight: bold;
   }

   .navbar {
      background-color: rgb(0 0 0 / 41%);
      /* Add a semi-transparent black background */
      backdrop-filter: blur(10px);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      transition: all ease 0.5s;
   }

   .navbar:hover {
      background-color: rgb(0 0 0 / 31%);
      box-shadow: 1px 1px 50px black;
   }

   .logo-container {
      display: flex;
      align-items: center;
   }

   .logo h2 {
      font-size: 220%;
      color: white;
      text-shadow: 0px 0px 5px #1ebfdd, 0px 0px 5px #1ebfdd;

      margin: 0 10px;
   }

   .logo h2:hover {
      text-shadow: 0px 0px 5px#1ebfdd, 0px 0px 5px #1ebfdd, 0px 0px 5px#1ebfdd, 0px 0px 5px #1ebfdd;

   }

   .logo {
      transition: all ease 0.5s;
   }

   .logo:hover {
      transform: scale(1.05);
   }

   .logo img {
      width: 60px;
      height: 60px;

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
      display: none;
      /* Hidden by default for larger screens */
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
      transition: all ease 0.3s;
      font-size: 110%;

   }

   .nav-links li a:hover {
      color: #00d7ff;
      text-shadow: 1px 0px 1px #FFF;

   }

   .nav-links li {
      transition: all ease 0.5s;
   }

   .nav-links li:hover {
      transform: scale(1.09);
   }


   .search-bar {
      display: none;
      /* Hidden by default */
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      background-color: rgb(0 0 0 / 41%);
      /* Add a semi-transparent black background */
      backdrop-filter: blur(10px);
      padding: 10px;
      border-radius: 5px;
      border: solid 1px white;
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

   a {
      list-style: none;
      text-decoration: none;
   }

   a:hover {
      text-decoration: none;

   }

   #hello{
      font-size: 130%;
      font-weight: bold;
      text-align: right;
      color:#FFF;
      filter: drop-shadow(1px 1px 5px #FFF);
   }

   #uname{
      font-size: 130%;
      font-weight: bold;
      text-align: right;
      color: #00d7ff;
      filter: drop-shadow(1px 1px 5px  #00d7ff);
   }

   ::-webkit-scrollbar {
      width: 7px;
   }

   ::-webkit-scrollbar-thumb {
      background-image: linear-gradient(45deg, black 0%, grey 25%, #dfdfdf 50%, grey 75%, black 100%);
      /* color of the scroll thumb */
   }

   .auction-dropdown-content {
        display: none;
        position: absolute;
        backdrop-filter: blur(10px);
        padding: 10px;
        border-radius: 5px;
        border: solid 1px white;
        z-index: 1;
        width: 150%;
        font-size: 80%;
    }

    .auction-dropdown:hover .auction-dropdown-content {
        display: block;
    }

    #btnl{
      background-color: transparent;
      border: none;
      font-weight: bold;
      color: white;
    }

    #btnl:hover{
      color:#00d7ff;
      text-shadow: 1px 0px 1px #FFF;
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
         background-color: rgb(0 0 0 / 50%);
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
         display: none;
         position: absolute;
         top: 80px;
         left: 90px;
         transform: translateX(-50%);
         background-color: rgb(0 0 0 / 41%);
         backdrop-filter: blur(10px);
         padding: 10px;
         border-radius: 5px;
         border: solid 1px white;
      }

      .search-bar input {
         width: 120px;
         padding: 5px;
         border: none;
         border-radius: 3px;
         outline: none;
         background-color: #C0C0C0;
         margin-right: 10px;
         font-size: 20px;
      }

      a {
         list-style: none;
         text-decoration: none;
      }

   }
</style>

<form action="" method="POST">
<nav class="navbar fixed-top bg-body-tertiary">
    <div class="logo-container">
        <div class="logo">
            <table>
                <tr>
                    <td>
                        <a href="admin.php">
                            <h2 id="h">Bid</h2>
                        </a>
                    </td>
                    <td>
                        <a href="admin.php"><img src="bgimgs/logo.png" alt="Rotating Image" class="rotating-logo"></a>
                    </td>
                    <td>
                        <a href="admin.php">
                            <h2 id="h">Bazzar</h2>
                        </a>
                    </td>
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
        <li><a href="admin_user.php">   <i class="fa fa-user-circle-o" aria-hidden="true"></i> Users </a></li>
        <li><a href="admin_vender.php">  <i class="ri-store-3-fill"></i> Vendors </a></li>
        <li><a href="admin_product.php"> <i class="ri-shopping-cart-fill"></i> Products </a></li>
        <li><a href="admin_auction.php"> <i class="ri-auction-line"></i>Auctions</a></li>
        <li id="search-icon"><a href="#" onclick="toggleSearch()"><i class="ri-search-line"></i> Search </a></li>
        <li><a href="admin_auction.php"> <i class="ri-logout-box-r-fill"></i><input type="submit" name="btnlogout" id="btnl" value="Logout"></a></li>
    </ul>
    <div class="search-bar">
        <input type="search" placeholder="Search..." id="search">
        <span class="close-btn" onclick="toggleSearch()">&times;</span>
    </div>
    <div>
        <h6 id="hello">Hello,</h6>
        <h6 id="uname">Admin</h6>
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
</form>
