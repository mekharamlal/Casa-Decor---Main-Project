<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "db.php";
    if(isset($_GET['btn_cart']))
{
    $p_no=$_POST['no'];
    $p_nm=$_POST['p_name'];
    $p_p=$_POST['p_price'];
    $p_q=$_POST['p_qty'];
    $p_t=$_POST['p_tt2'];
    var_dump($p_no);
    var_dump($p_nm);
    var_dump($p_p);
    var_dump($p_q);
    var_dump($p_t);

}
    
    ?>
</body>
</html>