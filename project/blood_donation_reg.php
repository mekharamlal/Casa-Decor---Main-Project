<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Vida</title>
    <!-- Jquery CDN -->
    <script src="./bootstrap-4.5.3-dist/js/jquery-3.5.1.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-4.5.3-dist/css/bootstrap.css">
    <script src="./bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <link href="./Fonts/Montserrat-SemiBold.ttf" rel="stylesheet">
    <!-- Font -->
    <link rel="stylesheet" href="style.css">
    <!-- written javascript -->
    <script src="./script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" />
    </script>
    <link rel="stylesheet" ref="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">


</head>

<body class="addcolor">
    <nav class="navbar navbar-expand-lg navbar-light shadow-lg p-0">
        <a class="navbar-brand p-4" href="#">
            <h4 style="width:150;height:120;color:#ffff;font-style:oblique; font-weight:bold;font-size:155%;font-family:'Times New Roman', Times, serif">Nueva Vida ...</h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse p-0" id="navbarSupportedContent" style="width:500px;">
            <ul class="navbar-nav mx-auto ulList">
                <li class="nav-item text-center col-5">
                    <a class="nav-link " id="navLinks" style="color:#ffff;" href="home.php">Home</a>
                    <span id="HTML">
                        <div class='navbr col'></div>
                    </span>
                </li>
                <li class="nav-item text-center col-5">
                    <a class="nav-link" id="navLinks" style="color:#ffff;" href="member-profile.php">View Profile</a>
                    <span id="JS"></span>
                </li>

                <li class="nav-item text-center col-5">
                    <a class="nav-link" id="navLinks" style="color:#ffff;" href="about.php">About Us</a>
                    <span id="CSS"></span>
                </li>
                <li class="nav-item text-center col-5">
                    <a class="nav-link" id="navLinks" style="color:#ffff;" href="contact.php">Contact Us</a>
                    <span id="PHP"></span>
                </li>

            </ul>

        </div>
        <?php
        session_start();
        if ($_SESSION[`uname`]) {
            echo "<i><p id=welcome>Welcome " . $_SESSION[`uname`] . "</p></i>";
        } else {
            header("location:login.php");
        }
        ?>
        <a class="log" href="logout.php">Logout</a>

    </nav>
    <!-- Content here -->
    <form action="#" name="myform" id="myform" method="POST">
        <div class="containerp">
            <div class="form-group">
                <input type="text" class="form-control " name="uname" placeholder="" value="<?php echo $_SESSION[`uname`]; ?>">
            </div>
            <?php
            include "db.php";
            $regname = $_SESSION[`uname`];
            $sql1 = "SELECT * FROM register WHERE `uname`='$regname';";
            $data = mysqli_query($con, $sql1);
            if ($row = mysqli_fetch_array($data)) {
                $regid = $row['reg_id'];
                $sql = "SELECT * FROM member_details WHERE  `reg_id`='$regid';";
                $data1 = mysqli_query($con, $sql);
                if ($res = mysqli_fetch_array($data1)) {

            ?>
                    <div class="form-group">
                        <input type="text" class="form-control " name="fname" placeholder="Full Name" value="<?php echo $res['lastname']; ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="ph" placeholder="Enter Contact Number" value="<?php echo $res['contact']; ?>" onblur="validate_phone()" required>
                        <font color="red"><i>
                                <p id="ph_err"></p>
                            </i></font>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="gender" placeholder="Enter Contact Number" value="<?php echo $res['sex']; ?>" onblur="validate_phone()" required>
                        <font color="red"><i>
                                <p id="s_err"></p>
                            </i></font>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="dateofbirth" placeholder="Enter Contact Number" value="<?php echo $res['dob']; ?>" onblur="validate_phone()" required>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="bg" placeholder="Enter Contact Number" value="<?php echo $res['bloodgroup']; ?>" onblur="validate_phone()" required>
                        <font color="red"><i>
                                <p id="b_err"></p>
                            </i></font>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="addrs" id="addr" placeholder="Enter your address" onblur="validate_addr()" required>
                        <font color="red"><i>
                                <p id="name_err"></p>
                            </i></font>
                    </div>
            <?php
                }
            }
            ?>
            <div class="containerh" style="width:105%;margin-top:-415px;">
                <div class="form-group">
                    <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter your Weight" onblur="validate_weight()" required>
                    <font color="red"><i>
                            <p id="d_err"></p>
                        </i></font>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" class="start" name="ldates" id="datepickers" placeholder=" Last Blood Collection date" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" class="end" name="dates" id="datepicker" placeholder="Blood Collection date" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Blood Quantity" onblur="validate_quantity()">
                    <font color="red"><i>
                            <p id="d1_err"></p>
                        </i></font>
                </div>
                <div class="form-group">
                    <input type="email" class=" form-control" name="mail" id="mail" placeholder="Email Id" required>
                </div>


                <button type="submit" name="submit" onclick="cal()" class="btn btn-primary4" id="submit" style="margin-top:20%;margin-left:20%;"><i>Proceed</i></button></a>

            </div>
        </div>
    </form>
    <script>
        function validate_addr() {
            var name = document.forms["myform"]["addr"];
            var letters = /^[A-Za-z]+$/;
            if (name.value == "") {
                var error = "Please enter your address";
                document.getElementById("name_err").innerHTML = error;
                name.focus;
                return false;
            } else if (name.value.match(letters)) {
                document.getElementById("name_err").innerHTML = "";
                document.myform.user.focus;
                return true;
            } else {
                document.getElementById("name_err").innerHTML = "Invalid Address"
                document.myform.user.focus;
                return false;
            }
        }

        function validate_weight() {
            var name = document.forms["myform"]["weight"];
            var weight = document.getElementById('weight').value;
            var letters = /^\d{10}$/;
            if (name.value == "") {
                var error = "Please enter your weight";
                document.getElementById("d_err").innerHTML = error;
                name.focus;
                return false;
            } else if ((weight >= 16) && (weight <= 65)) {
                document.getElementById("d_err").innerHTML = "";
                document.myform.user.focus;
                return true;
            } else {
                document.getElementById("d_err").innerHTML = "Weight >= 16 and Weight <= 65";
                document.myform.user.focus;
                return false;
            }
        }

        function validate_quantity() {
            var name = document.forms["myform"]["quantity"];
            var qtn = document.getElementById('quantity').value;
            var letters = /^\d{10}$/;
            if (name.value == "") {
                var error = "Please enter blood quantity";
                document.getElementById("d1_err").innerHTML = error;
                name.focus;
                return false;
            } else if ((qtn <= 1) && (qtn > 0)) {
                document.getElementById("d1_err").innerHTML = "";
                document.myform.user.focus;
                return true;
            } else {
                document.getElementById("d1_err").innerHTML = "Can Donate only 1 Unit of blood within 4 months";
                document.myform.user.focus;
                return false;
            }
        }
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                clearBtn: true,
                minDate: 0,
                maxDate: "+12M +30D",
                daysOfWeekDisabled: "0,6"
            });
            $("#datepickers").datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: new Date()
            }).bind("change", function() {
                var minValue = $(this).val();
                minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                minValue.setDate(minValue.getDate() + 1);
                $("#datepicker").datepicker("option", "minDate", minValue);
            })
        });
        jQuery(document).ready(function() {

            $('#datepicker').datepicker({
                format: "dd/mm/yyyy",

            });
        });
        $(function() {
            $("#datepickers").datepicker({

            });
        });

        function monthDiff(d1, d2) {
            var months;
            months = (d2.getFullYear() - d1.getFullYear()) * 12;
            months -= d1.getMonth();
            months += d2.getMonth();
            return months <= 0 ? 0 : months;
        }

        function cal() {
            d1 = new Date($("#datepicker").val());
            d2 = new Date($("#datepickers").val());
            if (monthDiff(d2, d1) <= 4) {
                event.preventDefault();
                alert("Can't Donate blood within  4 Months of one donation");
                return false;
            } else {
                $(document).ready(function() {
                    $("#myform").submit(function() {
                        alert("Form submitted Successfully");
                    });
                });
            }

        }
    </script>

</body>

</html>
<?php
include "db.php";
if (isset($_POST["submit"])) {
    //   $blood=isset($_POST["blood"]);
    //   $hair=isset($_POST["hair"]);
    //   $food=isset($_POST["food"]);
    //   $name=isset($_POST["uname"]);
    //   $fullname=isset($_POST["fname"]);
    //   $date=isset($_POST["dates"]);
    //   $time=isset($_POST["times"]);
    //   $phone=isset($_POST["ph"]);
    extract($_POST);

    $sql = "INSERT INTO `member_services_blood`(`donor_uname`, `donor_name`, `donor_phn`, `donor_sex`, `donor_dob`, `donor_bloodgrp`, `donor_addrs`, `donor_weight`, `donor_lastsampledate`, `donor_collectiondate`, `bloodquantity`,`donor_email`) 
        VALUES ('$uname','$fname','$ph','$gender','$dateofbirth','$bg','$addrs','$weight','$ldates','$dates','$quantity','$mail') ";
    $res = mysqli_query($con, $sql);
    if ($res) {
        echo '<script type ="text/JavaScript">';
        echo 'alert(" Succesfully Booked Your Slot!!!! ")';

        echo '</script>';
    } else {
        // echo "<script>window.location='member-services-view.php';</script>";
        echo '<script type ="text/JavaScript">';
        echo 'alert(" Slot Already Selected !!!! ")';
        echo '</script>';
    }
}
?>