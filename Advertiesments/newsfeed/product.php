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



<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    case "add":
        if(!empty($_POST["quantity"])) {
            $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
            $itemArray = array($productByCode[0]["code"]=>array('productname'=>$productByCode[0]["productname"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
            
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    break;
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);              
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
            }
        }
    break;
    case "empty":
        unset($_SESSION["cart_item"]);
    break;  
}
}
?>

<!DOCTYPE html>

<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Awesome Product Card Design | CodingNepal</title>
      <link rel="stylesheet" href="productstyle.css">
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   </head>
   <body>


    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM adds ORDER BY id ASC");
    if (!empty($product_array)) { 
        foreach($product_array as $key=>$value){
    ?>

           <form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
      <div class="container">
     
         <div class="image">
            <img src="<?php echo $product_array[$key]["image"]; ?>">
         </div>
         <div class="card-content">
            <div class="wrapper">
               <div class="title">
                 <?php echo $product_array[$key]["productname"]; ?>
               </div>
               <p>
                  <?php echo $product_array[$key]["producttype"]; ?>
               </p>
               <span class="price"><?php echo "$".$product_array[$key]["price"]; ?></span>
              
                <div class="title">
                 Sizes available : <?php echo $product_array[$key]["sizes"]; ?>
               </div>
              

                <div class="title">
                 Description: <?php echo $product_array[$key]["description"]; ?>
               </div>
              

               <div class="btns">
                  <input type="text" class="product-quantity" name="quantity" value="1" size="2" /><a href="kesh.php"><input type="submit" value="Add to Cart" class="btnAddAction" /></a>
               
               </div>
            </div>
         </div>
   
      </div>
        </form>

    <?php
        }
    }
    ?>
      <script>
         $(".colour-value span").click(function(){
           $(".colour-value span").removeClass("active");
           $(this).addClass("active");
           $("body").css("background", $(this).attr("data-color"));
           $(".wrapper .price").css("color", $(this).attr("data-color"));
           $(".size-value span.color").css("color", $(this).attr("data-color"));
           $(".size-value span.active").css("background", $(this).attr("data-color"));
           $(".image img").attr("src", $(this).attr("data-img"));
           $(".btns button").css({
             "background": $(this).attr("data-color"),
             "border-color": $(this).attr("data-color")
           });
         });
      </script>
   </body>
</html>