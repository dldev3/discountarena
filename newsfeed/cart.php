
<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM adds WHERE code='" . $_GET["code"] . "'");
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

<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #FBABE4;">
<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->



    <?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>  

    <div class="card">
        <div class="card-header">
            <h2 style="background-color: #FBABE4;">Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="cart.php?action=remove&code=<?php echo $item["productname"]; ?>" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
                <?php   
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];

    ?>
                <tbody>
        
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <img src="<?php echo $item["image"]; ?>" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                        <div class="media-body">
                          <a href="#" class="d-block text-dark"><?php echo $item["productname"]; ?></a>
                          <small>
                            <span class="text-muted">Color:</span>
                            <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                            <span class="text-muted">Size: </span> EU 37 &nbsp;
                            <span class="text-muted">Ships from: </span> China
                          </small>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4" ><?php echo "$".$item["price"]; ?></td>
                    <td class="align-middle p-4"><input type="text" class="form-control text-center" value="<?php echo $item["quantity"]; ?>"></td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?php echo "$". number_format($item_price,2); ?></td>
                    <td class="text-center align-middle px-0"><a href="cart.php?action=remove&code=<?php echo $item["productname"]; ?>" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove" alt="Remove Item">×</a></td>
                  </tr>
        
        
                </tbody>
                <?php
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"]*$item["quantity"]);
 
 }
    ?>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
        <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">
                <label class="text-muted font-weight-normal">Promocode</label>
                <input type="text" placeholder="ABC" class="form-control">
              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0">Discount</label>
                  <div class="text-large"><strong>$20</strong></div>
                </div>
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></div>
                </div>
              </div>
            </div>
        
             <?php 
}
?>
    
            <div class="float-right">
              <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3" ><a href="kesh.php">Back to shopping</a></button>
              <a href="paypal.html"><button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button></a>
            </div>
        
          </div>
      </div>

  </div>

<style type="text/css">
body{
    margin-top:20px;
    background:#eee;
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}

.card{
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);    
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    vertical-align: middle;
}
</style>

<script type="text/javascript">

</script>
</body>
</html>