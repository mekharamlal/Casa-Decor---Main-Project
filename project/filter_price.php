<?php
session_start();
?>
<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script src = "https://jquery.dataTables.min.js:21"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body id="indx-bdy">

    <div class="navbar">
        <ul>
            <li class="list ">
                <a href="index.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="about.php">
                    <span class="icon"><ion-icon name="information-circle-outline"></ion-icon></span>
                    <span class="title">About</span>
                </a>
            </li>
            <li class="list active">
                <a href="product_gallery.php">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Collection</span>
                </a>
            </li>
            <li class="list">
                <a href="profile.php">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="title">profile</span>
                </a>
            </li>
            <li class="list">
            <a href="shopping.php">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Cart</span>
                </a>
            </li>
            <li class="list">
                <a href="order.php">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="title">Order</span>
                </a>
            </li>
            
            <li class="list">
                <a href="logout.php">
                    <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <br><br>
    <div class="sess">  
    <?php
if($_SESSION["email"]){
echo"<p class=welcome> Welcome  ". $_SESSION["email"]."</p>";
}else{
    header("location:login.php");
}

?>
</div> 
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>
<br><br><br><br><br><br>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<script>

let menuToggle=document.querySelector('.toggle');
let navbar=document.querySelector('.navbar');
menuToggle.onclick=function(){
    menuToggle.classList.toggle('active');
    navbar.classList.toggle('active');
}


//add active class in selected list item.
let list=document.querySelectorAll('.list');
for(let i=0;i<list.length;i++){
    list[i].onclick=function(){
        let j=0;
        while(j<list.length){
            list[j++].className='list';
        }
        list[i].className='list active';
    }
}

</script>

<?php
    include "db.php";
    if(isset($_GET['min_value']) && isset($_GET['max_value']))
    {
        $startprice = $_GET['min_value'];
        $endprice = $_GET['max_value'];
        echo "
        <div class=pdmmp>  
        <h4 class=filter1>FILTERED ACCORDING TO PRICE</h4>
        <a href=../casa_decor/product_gallery.php name=serach_clear class=p_serach_btn_clear > RESET_FILTER</a>
        <div class=tab1cards_search>";
        $query_price = mysqli_query($con,"SELECT * FROM product1 WHERE product_price BETWEEN $startprice AND $endprice  ");
        $check_serach_price=mysqli_num_rows($query_price);
        if($check_serach_price)
        {
            while($row=mysqli_fetch_array($query_price))
            {
            ?>
            <div class="card">
            <form method="post"action="shopping.php?action=add&code=<?php echo "$row[product_code]"; ?>">
                <img src="product/<?php echo $row['product_image']; ?>" class="productviewindex" name="img"></img><br><br>
                <h4 class="producttext" name="prdname"><?php echo $row['product_name']; ?></h4>
                <p class="producttextprice" name="prdprice">RS. <?php echo $row['product_price']; ?></p>
                <input type="hidden" name="pd_cd"  value=<?php echo"$row[product_code]";?>>
                <input type="number" name="quantity" value="1" min="1"class="qunt" >
                <input type="submit" name="btncart" class="addtocart" value="Add To Cart">
            </form>
                        </div>
        <?php        
        }
        echo"</div>
            </div>"; 
        }

    }
    

        

?>
</body>
</html>