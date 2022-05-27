<?php
include "db.php";
session_start();
if (isset($_SESSION['email'])) {
  include("db.php");
  $lmail = $_SESSION['email'];
}

$sql = "select * from register where email = '$lmail' and status = 'user' ";
$resulti = mysqli_query($con, $sql);
$row = mysqli_fetch_array($resulti);
$reg_id =  $row['regid'];
$total = 0;


?>
<?php
$fetchAmountSql="SELECT `amount` FROM `pay` WHERE `regid`='$reg_id'";
$result = mysqli_query($con, $fetchAmountSql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {
    //echo $row['amount'];
    $total += $row['amount'];
  }
}
?>

<?php
require('stripe-php-master/config.php');
?>
<!DOCTYPE html>
<html>
<title>Payment Gateway</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">

<head>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #d5dbe8;
      height: 100vh;
      margin: 0;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    section {
      background: #ffffff;
      display: flex;
      flex-direction: column;
      width: 400px;
      height: 112px;
      border-radius: 6px;
      justify-content: space-between;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto',
        'Helvetica Neue', 'Ubuntu', sans-serif;
    }

    .product {
      display: flex;
      padding: 24px;
    }

    .description {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    p {
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 20px;
      letter-spacing: -0.154px;
      color: #242d60;
      height: 100%;
      width: 100%;
      padding: 0 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-sizing: border-box;
    }

    h3,
    h5 {
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 20px;
      letter-spacing: -0.154px;
      color: #242d60;
      margin: 0;
    }

    h5 {
      opacity: 0.5;
    }

    button {
      height: 36px;
      background: #556cd6;
      color: white;
      width: 100%;
      font-size: 14px;
      border: 0;
      font-weight: 500;
      cursor: pointer;
      letter-spacing: 0.6;
      border-radius: 0 0 6px 6px;
      transition: all 0.2s ease;
      box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
    }

    .cbutton {
      height: 36px;
      background: #556cd6;
      color: white;
      width: 100%;
      font-size: 14px;
      margin-top: 20px;
      border: 0;
      font-weight: 500;
      cursor: pointer;
      letter-spacing: 0.6;
      border-radius: 0 0 6px 6px;
      transition: all 0.2s ease;
      box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
    }

    button:hover {
      opacity: 1;
    }

    .detailsection {
      display: block;
    }

    .anim {
      width: 25%;
      margin: 0% 4%;
    }

    .sc {
      margin-left: -25%;
      margin-top: -5%;
    }

    .paygif {
      height: 90%;
      width: 50%;

    }
  </style>

</head>
<div class="navbar">
  <ul>
    <li class="list">
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
    <li class="list">
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
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<div class="toggle">
  <ion-icon name="menu-outline" class="open"> </ion-icon>
  <ion-icon name="close-outline" class="close"></ion-icon>
</div>
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

<div class="anim" id="anim"></div>
<section class="sc">
  <div class="product">
    <div class="description">
    <?php
       
       $new_amt=$_SESSION['tp2']+$_SESSION['tp'];
?>
      </table>
      <h3 class="ttl" style="align:center;"> Total Amount : <?php echo "Rs. " . "$new_amt". "/-"; ?></h3>
      <?php //$firstname = mysql_query("SELECT firstname FROM $info_table WHERE id = $id");
      ?>
      <br>
      <h3 style="color: red;margin-left:-5%;">The Amount to Be Pay By: <?php echo $_SESSION['email']; ?></h3><br>

    </div>
  </div>
  <form action="bill.php" method="POST">
    <button type="submit" value="Pay with Card" data-key="<?php echo $publishableKey ?>" data-amount="<?php echo $new_amt * 100; ?>" data-currency="inr" data-name="CASA DECOR" data-description="Please ">Procced to Pay</button>
    <input type="button" id="delete" class="cbutton" name="cancelbutton" value="Cancel Payment">
    <script src="https://checkout.stripe.com/v2/checkout.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="js/delete.js"></script>
    <script>
      document.getElementById("delete").onclick = function() {
        location.href = "shopping.php";
      };

      $(document).ready(function() {
        $(':submit').on('click', function(event) {
          event.preventDefault();

          var $button = $(this),
            $form = $button.parents('form');

          var opts = $.extend({}, $button.data(), {
            token: function(result) {
              $form.append($('<input>').attr({
                type: 'hidden',
                name: 'stripeToken',
                value: result.id
              })).submit();
            }
          });

          StripeCheckout.open(opts);
        });
      });
    </script>
    <script src="./js/lottie.js"></script>
    <script src="js/app.js"></script>
  </form>
</section>
<img src="img/payment demo.gif" class="paygif">
</body>

</html>