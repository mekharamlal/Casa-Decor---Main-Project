<style>
.pagination{
        text-align: center;
        margin: 30px 30px 60px;
        user-select: none;
        color: #444444;
    }

     .pagination li{
         display: inline-block;
         margin: 5px;
         box-shadow: 0 5px 30px rgb(1 1 1 / 10%);
     }

     .pagination li a{
         color:black;
         text-decoration: none;
         font-size: 1.2em;
         line-height: 45px;
     
     }

     .previous-page, .next-page{
          /*background: #0AB1CE;*/
          width:90px;
          
          cursor: pointer;
          color: black;
          
        }

        .previous-page:hover{
            transform: translateX(-5px);
        }

        .next-page:hover{
            transform:translateX(5px);
        }

     .current-page, .dots{
         background:  #ccc;
         width:30px;
         border-radius: 50%;
         cursor:pointer;
     }

     .active{
         background: #ccc;
         color:#444444;

     }

     .disable{
         background: #ccc;
     }  

     </style>
<link rel="stylesheet" type="text/css" href="css/style.css">
    <div class="tab1cardsnew">
    <?php
    $query = "SELECT * FROM product1 where id%2!=0";
    $product_array = $shoppingCart->getAllProduct($query);
    if (! empty($product_array)) {
        foreach ($product_array as $key => $value) {
            ?>
            <div class="card_new">
                <form method="post"action="shopping.php?action=add&code=<?php echo $product_array[$key]["product_code"]; ?>">
                 <img src="product/<?php echo $product_array[$key]["product_image"]; ?>"class="productviewindex" name="img"><br><br>
                 <h5 class="producttext" name="prdname"><?php echo $product_array[$key]["product_name"]; ?></h5>
                 <input type="number" name="quantity" value="1" min="1"class="qunt" max=<?php echo"$key[quantity]";?>>
                 <p class="producttextprice" name="prdprice">RS. <?php echo $product_array[$key]["product_price"]; ?></p><br>
                 <input type="submit" name="btncart" class="addtocart" value="Add To Cart">
                 
            
                
            </div>
        </form>
   
    <?php
        }
    }
    ?>
     </div>
</div>

<!--<div class="pagination">
   <li style = "margin-left:900px" class="page-item previous-page disable "><a class="page-link" href="#">Previous</a></li>
    <li class="page-item current-page active"><a class="page-link" href="#">1</a></li>
    <li class="page-item dots"><a class="page-link" href="#">...</a></li>
    <li class="page-item current-page"><a class="page-link" href="#">6</a></li>
    <li class="page-item dots"><a class="page-link" href="#">...</a></li>
    <li class="page-item current-page"><a class="page-link" href="#">15</a></li>

    <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
                                            
</div>-->


