<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body id="index-body">
<div class="profile-container">
    <div class="navbar">
        <ul>
            <li class="list ">
                <a href="index.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="abot.php">
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
            <li class="list active">
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
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
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
if($_SESSION["email"])
{
    include "db.php";
    $self=$_SESSION["email"];  
    echo"<p class=welcome_profile> Welcome  ". $_SESSION["email"]."</p>";
    $checkt=mysqli_query($con,"SELECT * FROM `user_detail` WHERE `email` = '$self' ");
    $row=mysqli_fetch_array($checkt); 
    if($row)
    {
        echo"<a href=update_user_details.php id=prof>Update profile</a>";
    }
    else
    {
        echo"<a href=user_details.php id=prof>complete profile</a>";
    }
    

}

?>
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>

</div>

<div class="profile-div">
<div class="userdetailtable1" >
    <?php
        $result=mysqli_query($con,"SELECT * FROM `user_detail` WHERE `email`='$self'");
        if($result)
        {
        while($row=mysqli_fetch_array($result))
        {
    ?>
    <div class="pfl">
       <div class="pone">
       <img src="profiles/<?php echo $row["img"] ;?>" class="pf-img"></img><br>
        <p id="pfname"><?php echo""?><?php echo $row["first_name"]." ". $row["last_name"];?></p><br>
		<p id="pem"><?php echo"  "?><?php echo $row["email"];?></p><br>
        <p id="pphn"><?php echo" +91 "?><?php echo $row["phone_number"];?></p><br>
        </div>
        <div class="ptwo">
		<p id="pgender"><?php echo"Gender : "?><?php echo $row["gender"];?></p><br>
        <p id="palphn"><?php echo"Alternate phone Number : "?><?php echo $row["alternate_phone_number"];?></p><br>
        <p id="padd"><?php echo"Address : "?><?php echo $row["address"];?></p><br>
        <p id="ppin"><?php echo"Pin Number : "?><?php echo $row["pin_number"];?></p><br>
        <p id="pcity"><?php echo"City : "?><?php echo $row["city"];?></p><br>
		</div>
        
        </div>
    <?php
    }
    }
    else
        {
            echo"<marquee direction = right style=width:50%;margin-left:27% scrollamount=12><font color=red><h3>Profile not added yet!.</font></h3></marquee>";
        }
    ?>


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
<br><br><br><br><br><br><br><br><br>
            
           

</center>
        

</body>

</html>