<?php
//session_start();
include 'db.php';
//include "side.php";
require_once "ShoppingCarts.php";

if (isset($_SESSION['email'])) {
    include("db.php");
    $lmail = $_SESSION['email'];


    $sqli = "select email from register where email = '$lmail' and status = 'user'";
    $resulti = mysqli_query($con, $sqli);
    $row = mysqli_fetch_array($resulti);
}

$sql = "select * from register where email = '$lmail' and status = 'user' ";
$resulti = mysqli_query($con, $sql);
$row = mysqli_fetch_array($resulti);
$reg_id =  $row['regid'];



// you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {

                $productResult = $shoppingCart->getProductByCode($_GET["code"]);

                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $reg_id);

                if (!empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                } else {
                    // Add to cart table
                    $shoppingCart->addToCart($productResult[0]["id"], $_POST["quantity"], $reg_id);
                }
            }
            break;
        case "remove":
            // Delete single entry from the cart
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;
        case "empty":
            // Empty cart
            $shoppingCart->emptyCart($reg_id);
            break;
    }
}
?>
<!DOCTYPE HTML>

<HEAD>
    <TITLE> CASA DECOR Whish List</TITLE>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style1.css" type="text/css" rel="stylesheet" />
    <script src="jquery-3.2.1.min.js"></script>
    <script>
        function increment_quantity(wish_id, price) {
            var inputQuantityElement = $("#input-quantity-" + wish_id);
            var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
            var newPrice = newQuantity * price;
            save_to_db(wish_id, newQuantity, newPrice);
        }

        function decrement_quantity(wish_id, price) {
            var inputQuantityElement = $("#input-quantity-" + wish_id);
            if ($(inputQuantityElement).val() > 1) {
                var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
                var newPrice = newQuantity * price;
                save_to_db(wish_id, newQuantity, newPrice);
            }
        }

        function save_to_db(wish_id, new_quantity, newPrice) {
            var inputQuantityElement = $("#input-quantity-" + wish_id);
            var priceElement = $("#cart-price-" + wish_id);
            $.ajax({
                url: "update_cart_quantity.php",
                data: "wish_id=" + wish_id + "&new_quantity=" + new_quantity,
                type: 'post',
                success: function(response) {
                    $(inputQuantityElement).val(new_quantity);
                    $(priceElement).text("$" + newPrice);
                    var totalQuantity = 0;
                    $("input[id*='input-quantity-']").each(function() {
                        var cart_quantity = $(this).val();
                        totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
                    });
                    $("#total-quantity").text(totalQuantity);
                    var totalItemPrice = 0;
                    $("div[id*='cart-price-']").each(function() {
                        var cart_price = $(this).text().replace("$", "");
                        totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
                    });
                    $("#total-price").text(totalItemPrice);
                }
            });
        }
    </script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</HEAD>

<body id="indx-bdy">

    <div class="navbar">
        <ul>
            <li class="list ">
                <a href="index.php">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="about.php">
                    <span class="icon">
                        <ion-icon name="information-circle-outline"></ion-icon>
                    </span>
                    <span class="title">About</span>
                </a>
            </li>
            <li class="list ">
                <a href="product_gallery.php">
                    <span class="icon">
                        <ion-icon name="grid-outline"></ion-icon>
                    </span>
                    <span class="title">Collection</span>
                </a>
            </li>
            <li class="list">
                <a href="profile.php">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <span class="title">profile</span>
                </a>
            </li>
            <li class="list active">
                <a href="shopping.php">
                    <span class="icon">
                        <ion-icon name="cart-outline"></ion-icon>
                    </span>
                    <span class="title">Cart</span>
                </a>
            </li>


            <li class="list">
                <a href="logout.php">
                    <span class="icon">
                        <ion-icon name="log-in-outline"></ion-icon>
                    </span>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <br><br>
  
    <div class="toggle">
        <ion-icon name="menu-outline" class="open"> </ion-icon>
        <ion-icon name="close-outline" class="close"></ion-icon>
    </div>
    <br><br><br><br><br><br>
    <script>
        let menuToggle = document.querySelector('.toggle');
        let navbar = document.querySelector('.navbar');
        menuToggle.onclick = function() {
            menuToggle.classList.toggle('active');
            navbar.classList.toggle('active');
        }


        //add active class in selected list item.
        let list = document.querySelectorAll('.list');
        for (let i = 0; i < list.length; i++) {
            list[i].onclick = function() {
                let j = 0;
                while (j < list.length) {
                    list[j++].className = 'list';
                }
                list[i].className = 'list active';
            }
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <?php
    $cartItem = $shoppingCart->getMemberCartItem($reg_id);
    if (!empty($cartItem)) {
        $item_quantity = 0;
        $item_price = 0;
        if (!empty($cartItem)) {
            foreach ($cartItem as $item) {
                $item_quantity = $item_quantity + $item["quantity"];
                $item_price = $item_price + ($item["product_price"] * $item["quantity"]);
            }
    ?>


<div class="txt-heading-label" >Shopping Cart</div>
            
                <div id="shopping-cart">
                    <div class="txt-heading">
                        

                        <a id="btnEmpty" href="shopping.php?action=empty" style="margin-left:200px;margin-top:20px;"><img src="empty-cart.png" alt="empty-cart" title="Empty Cart" class="float-right" /></a>
                        <div class="cart-status">
                            <div>Total Quantity: <span id="total-quantity"><?php echo $item_quantity; ?></span></div>
                            <div>Total Price: <span id="total-price"><?php echo $item_price; ?></span></div>
                        </div>
                    </div>
                <?php
            }
        }

        if (!empty($cartItem)) {
                ?>
                <div class="shopping-cart-table">
                    <div class="cart-item-container header">
                        <div class="cart-info title" style="margin-left: 2%;">Product</div>
                        <div class="cart-info" style="margin-left: -20%;">Quantity</div>
                        <div class="cart-info price" style="margin-left: 2%;">Unit Price</div>
                        <div class="cart-info tprice" style="margin-left:-20px; margin-top:-3%;">Total Price</div>
                    </div>
                    <?php
                    foreach ($cartItem as $item) {
                    ?>
                        <div class="cart-item-container">

                            <div class="cart-info title">
                                <td><img src="product/<?php echo $item["product_image"]; ?>" class="cart-item-image" />
                                    <?php echo $item["product_name"]; ?>
                            </div>

                            <div class="cart-info quantity" style="margin-left: -16%;">
                                <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $item["wish_id"]; ?>, '<?php echo $item["product_price"]; ?>')">-</div><input class="input-quantity" id="input-quantity-<?php echo $item["wish_id"]; ?>" value="<?php echo $item["quantity"]; ?>">
                                <div class="btn-increment-decrement" onClick="increment_quantity(<?php echo $item["wish_id"]; ?>, '<?php echo $item["product_price"]; ?>')">+</div>
                            </div>

                            <div class="cart-info price" style="margin-left: 15%;"> <?php echo $item["product_price"]; ?>

                            </div>

                            <div class="cart-info tprice" style="margin-left: -20px;">
                                <?php echo ($item["product_price"] * $item["quantity"]); ?>
                            </div>

                            <div class="cart-info action">
                                <a href="shopping.php?action=remove&id=<?php echo $item["wish_id"]; ?>" class="btnRemoveAction">
                                    <img src="icon-delete.png" alt="icon-delete" title="Remove Item" /></a>
                            </div>
                        </div> <br>

                    <?php
                    }
                    ?>
                    <div><a href="product_gallery.php" class="btn btn-block btn-light" style="margin-left: 1050px"><i class="fa-fas shopping-cart"></i> Continue Shopping </a> &nbsp;


                        <a type="button" class="btn btn-primary" href="checkout_end_page.php"> Checkout </a>
                    </div>
                </div>
            <?php
        }
            ?>
                </div>
                <?php //require_once "product-list.php"; 
                ?>



</BODY>

</HTML>