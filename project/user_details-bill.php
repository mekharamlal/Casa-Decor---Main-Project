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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASA DECOR</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            margin-top: -9%;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
                    }
        .col-6-1{
            flex: 0 0 auto;
            margin-top: -10%;
            margin-left: 35%;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 4.5%;
            margin-top: 1%;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
            
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
            margin-top: -20%;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
        .prnt{
            display: inline-block;
	        border-radius: 20px;
	        border: 1px solid #4B5251;
	        color: #4B5251;
	        text-align: center;
	        font-size: 18px;
	        padding: 5px;
	        width: 14%;
	        height: 6%;
	        transition: all 0.5s;
	        cursor: pointer;
	        margin-left: 85%;
	        margin-top:5% ; 
        }
        .prnt:hover{
            background-color: black;
        }
        .pf-img_admin{
	margin-top: 12%;
	border-radius: 50%;
	height: 100px;
	width: 100px;
}
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">CASA DECOR</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">casadecor@gmail.com</p>
                        <p class="text-white">Casa Decor</p>
                        <p class="text-white">+91 9074139799</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">

                    <p class="sub-heading" id="dash_date"> Date: </p>
                        <script>
                        var today = new Date();
                        var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                        document.getElementById("dash_date").innerHTML = " Date of report generation : "+date;
                        </script>
                    
                     
                    <?php 
              
              if($_SESSION["email"])
              $ch=$_SESSION["email"];
             echo" <p class=sub-heading>";
              echo"<p class=welcome> "."Email Address : ". $_SESSION["email"]."</p>"; ?>
                    </p>
                </div> 
                
            </div>
        </div>
        <div class="body-section">
            <h3 class="heading"> <CENTER>CURRENT USERS IN CASA DECOR </h3><BR>
            <br>
            <table class="table-bordered">
            <tr>
                   
                    <th style="padding-left:-25px;" >Shop Id</th> 
                    <th style="padding-left:-25px;" >Image</th> 
                    <th style="padding-left:-25px;" >First Name</th>
                    <th style="padding-left:-25px;" >Last Name</th>
                    <th style="padding-left:-25px;" >Alternate Phone Number</th>
                    <th style="padding-left:-25px;" >phone Number</th>
                    <th style="padding-left:-25px;" >Gender</th>
                    <th style="padding-left:-25px;" >Address</th>  
                    <th style="padding-left:-25px;" >Pin Number</th>
                    <th style="padding-left:-25px;" >City</th>  
                    <th style="padding-left:-25px;" >Email</th> 
                </tr>
                    <?php
                    include "db.php";
                    $result=mysqli_query($con,"SELECT * FROM `user_detail` ORDER BY `id`");
                     while($row=mysqli_fetch_array($result))
                    {
                        ?>
                        <tr>
                        <td><center><?php echo $row["id"];?></td>   
                        <td><img src="profiles/<?php echo $row["img"];?>"class="pf-img_admin"></img></td>
                        <td><?php echo $row["first_name"];?></td>
                        <td><?php echo $row["last_name"];?></td>
                        <td><?php echo $row["phone_number"];?></td>
                        <td><?php echo $row["alternate_phone_number"];?></td>
                        <td><?php echo $row["gender"];?></td>
                        <td><?php echo $row["address"];?></td>
                        <td><?php echo $row["pin_number"];?></td>
                        <td><?php echo $row["city"];?></td>
                        <td><?php echo $row["email"];?></td>
                            </tr><br>
                    <?php   
                    }
                    ?>
                

            <tbody>
     
            </table>
            <br>
           <div id="print_section">
            
            </div>
            <input type="button" name="submit" class="prnt"onclick="printbill('print_section')" value="Download">
            
        </div>
  

        <div class="body-section">
            <p>&copy; Copyright 2022 - CASA DECOR. All rights reserved. 
                <i style="margin-left:50%;">Thank You for Visiting...</i>
            </p>
        </div>      
    </div>      
<script>
    function printbill(section_id){
    window.print();
    }
    
</script>

</body>
</html>