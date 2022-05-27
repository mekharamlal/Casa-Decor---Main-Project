<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <!-- DC Payment Icons CSS -->
<link rel="stylesheet" type="text/css" href="http://cdn.dcodes.net/2/payment_icons/dc_payment_icons.css" />

    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
            
            
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
            margin-top: -15px;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
            width: 50%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background: #e0e0e0;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
            width: 70%;
            
        }
        .container1 {
            
            padding: 5px 20px 15px 20px;
            background: #e0e0e0;
	        box-shadow:  5px 5px 9px #949494,
             -25px -25px 49px #ffffff;
            border-radius: 3px;
            width: 30%;
            margin-top: -40%;
            margin-left: 71%;
            
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
            
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #04AA6D;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
<?php 
              session_start();
              if($_SESSION["email"])
              echo"<p class=welcome> Welcome  ". $_SESSION["email"]."</p>"; ?>
    <div class="row">
        
        <div class="col-75">
            <div class="container">
                <form action="purchase1.php" method="POST">

                    <div class="row">
                        <div class="col-50">
                            <h3 style="font-family:'Lucida Sans';">Billing Address</h3>
                            <?php                                          
                                                                      {
                                                                        include "db.php";
                                                                                $name= $_SESSION["email"];
                                                                                $sqli = "select email from register where email = '$name'";
                                                                                $resulti = mysqli_query($con,$sqli);
                                                                                $row = mysqli_fetch_array($resulti);
                                                                      }
                                                                      ?>
                            <label for="fname" style="margin-top: -21%;"><i class="fa fa-user"></i> Name</label>
                            <input type="text" id="fname" name="Name" class="form-control"placeholder="Joe" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="Address"placeholder="park villa" class="form-control"required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="Email" class="form-control"required value = <?php echo $_SESSION["email"]; ?>>

                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="City" class="form-control"required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="State" class="form-control"required>
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001"required>
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <span class="dc_payment_icons_flat_54 dc_visa_flat" title="Visa Electron"></span>
                            <span class="dc_payment_icons_flat_54 dc_mastercard_flat" title="MasterCard"></span>
                            <span class="dc_payment_icons_flat_54 dc_american_express_flat" title="American Express"></span>
                            <span class="dc_payment_icons_flat_54 dc_paypal_flat" title="PayPal"></span>
                            <span class="dc_payment_icons_flat_54 dc_direct_debit_flat" title="Direct Debit"></span>
                            <span class="dc_payment_icons_flat_54 dc_visa_electron_flat" title="Visa"></span>
                            <span class="dc_payment_icons_flat_54 dc_western_union_flat" title="Western Union"></span><br><br>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe"required>
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"required>
                            
                            <div class="row">
                                <div class="col-50">
                               
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018"required>
                                    <label for="amount">Re-Enter Amount</label>
                                <input type="text" id="expmonth" name="amount" placeholder="1000"required>
                                </div>
                                <div class="col-50">
                                <label for="expmonth">Exp Month</label>
                                <input type="text" id="expmonth" name="expmonth" placeholder="September"required>
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352"required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <input type="submit" value="Proceed to Payment" name="submit" class="btn">
                </form>
            </div>
        </div>

    </div>
    </div>
    <div class="col-25">
      <div class="container1">
      <table >
                
                <tr>
                    <th style="padding-left:-25px;"  >Product</th>
                    <th style="padding-left:7px;" >Quantity</th>
                    <th style="padding-left:20px;">Price</th>
                </tr>


            <tbody>
            <?php
            $sno = 1;
            $total= 0;
            foreach ($_SESSION['mycart'] as $key => $value){
                //echo $value['qty']."<br>";
               
                $q=mysqli_query($con,"SELECT * FROM product1 WHERE id=$key");
                if (is_array($q) || is_object($q))
{
               foreach($q as $a) {
                echo "<tr>
                <td style=padding-left:25px; name=prd_name>".$val_prd=$a['product_name']."</td>
                <td style=padding-left:25px; name=prd_qty>".$val_qty=$value['qty']."</td>
                <td name=qty_and_price style=padding-left:25px;>".$val_qp=$value['qty']*$a['product_price']."</td>
                </tr><br>";
                $tt=($total += $value['qty']*$a['product_price']);

               }
               
               $sno++;  
              
            }
            //echo"$val";
        }
        
            ?>
            </tbody>
        </table>
        <h3 class="ttl" style="padding-left:19%;">Total Amount : <?php echo"Rs. ".$total."/-";?></h3>
        
      </div>
    </div>
    
</body>

</html>

<?php
include "db.php";
if (isset($_POST["submit"])) {
    $bname = $_POST["Name"];
    $baddr = $_POST["Address"];
    $bmail = $_POST["Email"];
    $bcity = $_POST["city"];
    $bstate = $_POST["state"];
    $bpin = $_POST["zip"];
    $bcardname = $_POST["cardname"];
    $bcardnumber = $_POST["cardnumber"];
    $bexpmonth = $_POST["expmonth"];
    $bexpyear = $_POST["expyear"];
    $am = $_POST["amount"];
    $bcvv = $_POST["cvv"];
    echo $bname;
    echo"$tt";
    $sql = "INSERT INTO `payment`(`name`, `address`, `email`, `city`, `state`, `pin`, `card_name`, `card_number`, `card_expmonth`, `card_expyear`, `amount`, `card_cvv`) 
    VALUES ('$bname','$baddr','$bmail','$bcity','$bstate','$bpin','$bcardname','$bcardnumber','$bexpmonth','$bexpyear','$am','$bcvv')";
    $res = mysqli_query($con, $sql);
    if ($res) {
        echo "<script>window.location='bill.php';</script>";
    }
}
?>
<script>
    $(".deleteMe").on("click", function() {
        $(this).closest("p").remove();
    });
</script>