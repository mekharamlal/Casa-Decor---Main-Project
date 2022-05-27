<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>

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
      padding-top: 5%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
      padding-top: 5%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
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

  <h2>PURCHASING</h2>
  <?php 
              session_start();
              if($_SESSION["email"])
              echo"<p class=welcome> Welcome  ". $_SESSION["email"]."</p>"; ?>
  <div class="pay">
        <form action="checkout.php" method="POST">
              <h3>Billing Address</h3>
                                                                      <?php                                          
                                                                      {
                                                                        include "db.php";
                                                                                $name= $_SESSION["email"];
                                                                                $sqli = "select email from register where email = '$name'";
                                                                                $resulti = mysqli_query($con,$sqli);
                                                                                $row = mysqli_fetch_array($resulti);
                                                                      }
                                                                      ?>
              <input type="text" id="name" name="name" placeholder="Name" class="inpt">
              <input type="text" id="address" name="address" placeholder="Address">
              <input class="inpt"type="text" id="email" name="email" value = <?php echo $_SESSION["email"]; ?>>
              <input type="text" id="city" name="city" placeholder="City" class="inpt">
              <input type="text" id="state" name="state" placeholder="State" class="inpt">
              <input type="text" id="zip" name="zip" placeholder="Zip" class="inpt">

              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <input type="text" id="nameoncard" name="nameoncard" placeholder="Name on Card" class="inpt">
              <input type="text" id="cardno" name="cardno" placeholder="Card Number" class="inpt">
              <input type="text" id="expmonth" name="expmonth" placeholder="Exp Month" class="inpt">
              <input type="text" id="expyr" name="expyr" placeholder="Exp Year" class="inpt">
              <input type="text" id="cvv" name="cvv" placeholder="Cvv" class="inpt">
              
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <input type="submit" value="Proceed to Payment" name="submit" class="btn">
        </form>
        </div>
    <div class="col-25">
      <div class="container">
      <table >
                
                <tr>
                    <th style="padding-left:-15px;"  >Product</th>
                    <th style="padding-left:7px;" >Quantity</th>
                    <th style="padding-left:20px;">Price</th>
                </tr>


            <tbody>
            <?php
            $sno = 1;
            $total= 0;
            foreach ($_SESSION['mycart'] as $key => $value){
                //echo $value['qty']."<br>";
                $q=mysqli_query($con,"SELECT * FROM product WHERE id=$key");
                if (is_array($q) || is_object($q))
{
               foreach($q as $a) {
                echo "<tr>
                <td style=padding-left:25px;>".$a['product_name']."</td>
                <td style=padding-left:25px; >".$value['qty']."</td>
                <td style=padding-left:25px;>".$value['qty']*$a['product_price']."</td>
                </tr><br>";
            $total += $value['qty']*$a['product_price'];

               }
               $sno++;
            }
        }
            ?>
            </tbody>

        </table>
        <h3 class="ttl" style="padding-left:25px;">Total Amount : <?php echo"Rs. ".$total."/-";?></h3>

        

      </div>
    </div>
  

</body>

</html>


<script>
  $(".deleteMe").on("click", function() {
    $(this).closest("p").remove();
  });
</script>