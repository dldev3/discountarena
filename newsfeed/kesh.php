<?php
  $servername="localhost";
  $username="root";
  $password="";

  $conn=mysqli_connect($servername,$username,$password);

  if(!$conn){
    die("Connection not connected: " .mysqli_connect_error($conn). '<br>');
  }

  else if(mysqli_select_db($conn,"keshawa")) {
    //echo "database selected.<br>";

  }

  else{

    echo "database not selected.<br>";

  }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">



 



   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color:  #ff33cc;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;      
    font-size: 20px;
    color:  #ff33cc;
  }
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color:  #ff33cc;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(0%);
    filter: grayscale(0%); /* make all photos black and white */ 
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h1 {
    color:  #F944C5 !important;
    font-size: 50px;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background:  #ff33cc;
    color:  #ff33cc;
  }
  .bg-1 h3 {color:  #ff33cc;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color:  #ff33cc;
  }
  .btn {
    padding: 10px 20px;
    background-color:  #ff33cc;
    color:  #ff33cc;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid  #ff33cc;
    background-color:  #ff33cc;
    color:  #ff33cc;
  } #ff33cc
  .modal-header, h4, .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 50px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color:  #ff33cc;
  }
  #googleMap {
    width: 100%;
    height: 400px;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }  
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color:  #ff4dd2;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }
  footer {
    background-color: #ff4dd2;
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
  }  
  .form-control {
    border-radius: 0;
  }
  textarea {
    resize: none;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="homepagenew.html">NEWSFEED</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">PROFILE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Customer\LoginandRegistration\login-user.php">CUSTOMER SIGN IN</a></li>
            <li><a href="sellerlogin.html">SELLER SIGN IN</a></li>
            
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">HOME
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Customer\LoginandRegistration\signup-user.php">CUSTOMER ACCOUNT</a></li>
            <li><a href="sellregistration.html">SELLER ACCOUNT</a></li>
            
          </ul>
        </li>
        <li><a href="cart.php">CART</a></li>
        <li><a href="#contact">WISHLIST</a></li>
        
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="row">
  <div class="col-md-6">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="k8.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h1>In order to be irreplaceable one must always be different.</h1>
          
       
        </div>      
      </div>

      <div class="item">
        <img src="k14.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h1>How can you live the high life if you do not wear the high heels?</h1>
          
          
        </div>      
      </div>
    
      <div class="item">
        <img src="k3.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h1>People will stare. Make it worth their while.</h1>
          
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>


<div class="col-md-6">
<div id="myCarouse2" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="k8.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h1>In order to be irreplaceable one must always be different.</h1>
          
       
        </div>      
      </div>

      <div class="item">
        <img src="k14.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h1>How can you live the high life if you do not wear the high heels?</h1>
          
          
        </div>      
      </div>
    
      <div class="item">
        <img src="k3.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h1>People will stare. Make it worth their while.</h1>
          
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarouse2" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarouse2" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>

</div>
<!-- Container (The Band Section) -->


 
</div>
   <div>
   <h3 style="text-align:center; margin-top: 10px; margin-bottom:10px; background-color:darkgray; color:white; height:50px; padding-top: 7px;" >NEW ITEMS </h3>
 </div>
<div class="row">
  
  <?php 
      
      $query='SELECT * FROM adds';
      $result=mysqli_query($conn,$query);

      while ($row=mysqli_fetch_array($result)){

  
  ?>
    <div class="col-md-3">
     <div class="card" >
       <img class="card-img-top img-responsive" src="<?php echo $row['image']?>"   class="img-responsive" style="width:100%" alt="Image">
       <div class="card-body">
          <a href="product.php"><h4 class="card-title" style=" text-align:center; background-color:#FD79F3"><?php echo $row['productname']?></h4></a>
         <p class="card-text"><?php echo $row['sizes']?></p>
         <p class="card-text"><?php echo $row['price']?></p>
       </div>
     </div>
    </div>
   <?php 
   
      }
   ?>
</div>
   </div>



   </div>
   <div>
   <h3 style="text-align:center; margin-top: 10px; margin-bottom:10px; background-color:darkgray; color:white; height:50px; padding-top: 7px;" >NEW ITEMS </h3>
 </div>
<div class="row">
  
  <?php 
      
      $query='SELECT * FROM adds';
      $result=mysqli_query($conn,$query);

      while ($row=mysqli_fetch_array($result)){

  
  ?>
    <div class="col-md-3">
     <div class="card" >
       <img class="card-img-top" src="<?php echo $row['image']?>"   class="img-responsive" style="width:100%" alt="Image">
       <div class="card-body">
         <a href="product.php"><h4 class="card-title" style=" text-align:center; background-color:#FD79F3"><?php echo $row['productname']?></h4></a>
         <p class="card-text"><?php echo $row['sizes']?></p>
         <p class="card-text"><?php echo $row['price']?></p>
       </div>
     </div>
    </div>
   <?php 
   
      }
   ?>
</div>
   </div>






<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>


 
</body>
</html>
