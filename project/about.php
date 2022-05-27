<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body id="indx-bdy">
<div class="index-container">
    <div class="navbar">
        <ul>
            <li class="list ">
                <a href="index.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list active">
                <a href="about.php">
                    <span class="icon"><ion-icon name="information-circle-outline"></ion-icon></span>
                    <span class="title">About</span>
                </a>
            </li>
            <li class="list">
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
    <?php
session_start();
if($_SESSION["email"]){
echo"<p class=welcome> Welcome  ". $_SESSION["email"]."</p>";
    

}else{
    header("location:login.php");
}

?>
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>
<br><br><br><br><br><br>
<h3><b>Ride in Style</h3></b>
<p class="index-quotes">
    
<i>“If you wait until you have enough money to decorate and make your <br>
home your own, it will never happen.If you wait until you can afford <br>
to buy everything new,you are missing the point. It is the old, thenew<br>
, the hand-me-down, the collected, the worn but loved things in your<br>
 home that make it your own.”</i>
</p>
<img src="img/bn.jpg"  class="ftr">
</div>




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

<div class="abtxt">What makes The Decor Kart different?</div>
<br><br>
<img src="img/ic1.jpg"  class="ic1">
<img src="img/ic2.jpg"  class="ic2">
<img src="img/ic3.jpg"  class="ic3">
<div class="ic1txt">Exclusive Design</div>
<p class="ic1txt2">We source & curate 100% of the products <br>
we sell in-house. This allows us to give<br>
 you exclusive designs at a great value</p>

 <div class="ic2txt">Experience</div>
 <p class="ic2txt2">We have travelled throughout the world<br>
  to bring you the most beautiful selections<br>
   available - and our master curators have <br>
   been doing that for the past 20 years.</p>

   <div class="ic3txt">Buyer Guarantee</div>
   <p class="ic3txt2">The TDK buyer guarantee ensures that <br>
   you have complete peace of mind <br>
   while making a purchase with us.</p><br><br>



<video  controls class="vdo">
  <source src="../casa_decor/img/video.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>


<footer>
  <p style="margin-left:-45%; font-size:30px;font-weight:20px;margin-top:2.5%;">CASA DECOR <div class="vl"></div></p>
  <p style="margin-left:65%;font-size:15px;margin-top:-3.5%;">CASA DECOR<BR>
+91 9074139799<br>
CASADECOR@GMAIL.COM</p>
</footer>
</body>

</html>