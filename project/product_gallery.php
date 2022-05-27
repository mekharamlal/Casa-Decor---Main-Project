<?php
session_start();
include "db.php";
if(isset($_GET['action']) == "add"){
    $id = $_GET['id'];

    if(isset($_SESSION['mycart'][$id])){
        $previous = $_SESSION['mycart'][$id]['qty'];
        $_SESSION['mycart'][$id] = array("id"=>$id,"qty"=>$previous+$_POST['quantity']);
    }
    else{
        $_SESSION['mycart'][$id] = array("id"=>$id,"qty"=>$_POST['quantity']);
    }
    header("location:cart1.php");

}

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
    
    <style>      

.priceSlider
{
    width: 200px;
    border-radius: 5px;
    padding: 10px 20px; 
    color:black;
	background-color: whitesmoke;
	font-size: 15px;
	font-family:   Arial, sans-serif;
	display:inline-block;
	box-sizing: border-box;
	border:1px solid white;
	border-radius: 5px; 
    margin-left: 60%; 
    margin-top: -15%;
    margin-bottom: 13%;
}
.priceSlider h1
{
font-size: 17px;
font-weight: bold;
}
.priceSlider p
{
font-size: 10px;
margin-top: 20px;    
}
.min-max label
{
font-size: 14px;
float: left;
margin-right: 5px;
line-height: 1.6;    
}
.min
{
float: left;    
}
.max
{
float: right;    
}
.min-max
{
width: 90%;
max-width: 200px;
margin: 0 auto;
padding: 25px 0px 15px 0px;    
}
.min-max span
{
font-size: 10px;
text-align: center;
display: inline-block;
width: 30px;
border: 1px solid #dedede;    
}
.min-max-range
{
padding: 30px 0px 20px 0px;    
color:indianred;
font-size: 15px;
}
.range
{
-webkit-appearance:none;
appearance:none;
width: 50%;
height: 10px;
max-width: 400px;
background-color: #dedede;
color:indianred;
font-size: 15px;
margin: 0;
padding: 0;
outline: none;
float: left;    
}
.range::-webkit-slider-thumb
{
-webkit-appearance:none;
appearance:none;
background-color:indianred;
height: 10px;
width: 10px;
border-radius: 50%;
cursor: pointer;
}
.range::moz-range-thumb
{
-webkit-appearance:none;
appearance:none;
background-color:indianred;
height: 10px;
width: 20px;
border-radius: 50%;
cursor: pointer;
}
</style>     
    
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
<form method="GET" action="filter_price.php">
<div class="priceSlider">
<h4 class="filter" style="padding-left: 17px;padding-top:5px;">PRICE RANGE</h4>
<p style="color:black;font-size:15px;margin-top:-1%;">Move Slider to choose the price range.</p> 
    
<div class="min-max">
 <div class="min">
     <label>Min</label><span id="min-value"></span>
 </div>
 <div class="max">
     <label>Max</label><span id="max-value"></span>
 </div>     
</div> 
    
<div class="min-max-range">
<input type="range" min="0" max="100" name="min_value" value="" class="range" id="min">
<input type="range" min="100" max="5000"name="max_value"  value="" class="range" id="max">      
</div>    
<input type="submit" name="serach_price" class="price_serach_btn" >  
<div style="clear: both;"></div>    
</div> 

</form>
<script>
var minSlider = document.getElementById('min');
var maxSlider = document.getElementById('max');

var outputMin = document.getElementById('min-value');
var outputMax = document.getElementById('max-value');

outputMin.innerHTML = minSlider.value;
outputMax.innerHTML = maxSlider.value;

minSlider.oninput = function(){
 outputMin.innerHTML=this.value;    
}

maxSlider.oninput = function(){
 outputMax.innerHTML=this.value;    
}
</script>

        <?php // ...............................................................  CATEGORY SEARCH................................................................ ?>



    <?php 
        include "db.php";  
        $records = mysqli_query($con, "SELECT * From category"); 
    ?>
    <form method="GET" action="#" class="search_class">  
    <div class="p_serach"> 
        <h4 class="filter">FILTER</h4>             
                   <?php
                        while($row = mysqli_fetch_array($records))
                        {
                            echo "<input type=checkbox name=cat[] class=check_search value='".$row['category_id']."'>" .$row['category_name'] ."<br>";  
                            $val=$row['category_id'];  
                        }  
                        //echo""
                    ?>   <br>                              
                    <input type="submit" name="serach_cat" class="p_serach_btn" >

    </div>
    </form>


    <?php
    include "db.php";
    if(isset($_GET["serach_cat"]))
    {
        if(!empty($_GET['cat'])) 
        {    
            foreach($_GET['cat'] as $value)
            {
                //echo "value : ".$value.'<br/>';
                echo "
                <div class=pdmm>  
                <div class=tab1cards_search>";
           
                $search_query=mysqli_query($con,"SELECT *  FROM `product1` WHERE `cat_id`=$value ");
                $check_serach=mysqli_num_rows($search_query);
                if($check_serach)
                {     
                while($row=mysqli_fetch_array($search_query))
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
        }
    }
else
{
?>
    <?php
    include "db.php";
        $result=mysqli_query($con,"SELECT *  FROM `product1`  ");
        $check = mysqli_num_rows($result)>0;
        if($check){
            ?>
            <div class="pdm_index2">
            <div class="tab1cards">
<?php            while($row=mysqli_fetch_array($result))
            {

            ?> <div class="card">
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
        }
?></div>
</div><br>
<?php
        }
        
        
        
    ?>
      
<br><br><br><br><br>
<footer class="footr_class">
  <p style="margin-left:-45%; font-size:30px;font-weight:20px;margin-top:2.5%;">CASA DECOR <div class="vl"></div></p>
  <p style="margin-left:65%;font-size:15px;margin-top:-3.5%;">CASA DECOR<BR>
+91 9074139799<br>
CASADECOR@GMAIL.COM</p>
</footer>
</body >

</html>