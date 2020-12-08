<?php

include("includes/db.php");
include("functions/functions.php");

?>


<!DOCTYPE HTML>
<html>
<head>

<title>my shop</title>

<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body> 
<!--main container starts-->
<div class="container">
      <!--header starts-->
    
    <div class="header_wrapper">
      <img src="images/logo.gif" style="float:left;">
      <img src="images/add.gif" style="float:right;">
      <img src="images/logo2.gif" style="float:middle;">
    

    </div>
    <!--header ends-->
    
    <!--navagation bar starts-->
    <div id="navbar">
      <ul id="menu">
        <li><a href="#">home</a></li>
        <li><a href="#">all products</a></li>
        <li><a href="#">my account</a></li>
        <li><a href="#">sign up</a></li>
        <li><a href="#">shopping cart</a></li>
        <li><a href="#">contact us</a></li>
        
        
      </ul>
      <div id="form">
        <form method="get" action="results.php" enctype="multipart/form-data">
        <input type="text" name="user_query" placeholder="search a product"/>
        <input type="submit" name="search" value="Search" />
        </form>

      </div>


    </div>

    <!--navagation bar ends-->

    <div class="content_wrapper">
      <div id="left_sidebar">
        <div id="sidebar_title">categories</div>
        <ul id="cats">
        
         <?php getCats(); ?>

        </ul>
         
        <div id="sidebar_title">brands</div> 

        <ul id="cats">
          <?php getBrands();?>
        
        </ul>

      </div>


      <div>
          <div>
          <?php
          
        if(isset($_GET['search'])){

         $search_query=$_GET['user_query'];

          $get_pro="select * from products where product_keywords like '%$search_query%'";
          $run_pro=mysqli_query($con,$get_pro);
          $count_pro=mysqli_num_rows($run_pro);
       if($count_pro==0){
           echo "<h2 style='padding:20px;'>no products found 🙁️!</h2>";
   
     
       }

          while($row_pro=mysqli_fetch_array($run_pro)){
              $pro_id=$row_pro['product_id'];
              $pro_cat=$row_pro['cat_id'];
              $pro_brand=$row_pro['brand_id'];
              $pro_title=$row_pro['product_title'];
              $pro_price=$row_pro['product_price'];
              $pro_image=$row_pro['product_img1'];
         
         
              echo "
                  <div id='single_product'>
                  <h3>$pro_title</h3>
                  <h3>$pro_brand</h3>
                     <h3>$pro_cat</h3>
                  <img src='admin_area/product_images/$pro_image' width='180' height='180' />
                  <p><b> ₹ $pro_price</b></p>
                  <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                  <a href='index.php?pro_id=$pro_id'><button style='float:right'>add to cart</button></a>
                  
                  </div> ";
               }
            }
          
          ?>
          </div>

      </div>
      <div>
          <div>
          <?php getCatPro();?>
          </div>

      </div>

      <div>
          <div>
          <?php getBrandPro();?>
          </div>

      </div>

      
      
      <!-- <div id="right_content">

      <div id="headline"> -->
      <div id="headline_content"></div>
      <b>welcome guest!</b>
      <b style="color:yellow;">shopping cart:</b>
      
      
      </div>



        </div>

    </div>
    <div class="footer">

    <h1 style="color:black; padding-top:30px; text-align:center;">&copy; 2020 - by dev </h1>
    </div>


</div>
<!--main container end-->

</body>
<html>
