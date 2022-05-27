<?php 
// Run a select query to get my letest 6 items
// Connect to the MySQL database  
include "db.php"; 
$category_name=$_GET['cat_id'];
$sql = mysql_query("SELECT * FROM product WHERE cat_id='$category_name' LIMIT 6");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
    while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
             $product_name = $row["product_name"];
             $price = $row["price"];
             $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="100" height="64" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
    $dynamicList = "We have no products listed in our store yet";
}
mysql_close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

</style>
<meta name="Description" content="Lightweight aluminum boat docks, lifts, and accessories" />
<meta name="Keywords" content="Aluminum boat dock ladder lift water wheels" />
<script src="scripts/swfobject_modified.js" type="text/javascript"></script>
</head>
<title><?php echo $category; ?></title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen"/>
</style>
<body>
<div align="center" id="mainWrapper">
>
  <table width="100%">
      <tr>
        <td valign="top"><p><?php echo $dynamicList;?><br />
          </p>
          <p>&nbsp;</p>
        <p>&nbsp;</p>          <h2>&nbsp;</h2></td>
      </tr>
  </table>
  <p>&nbsp;</p>

</div>
</body>
</html>