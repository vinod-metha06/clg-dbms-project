<?php
session_start();
include("includes/db.php");
include("functions/functions.php");


?>
<html>
     <head>
          <title>my online shop</title>

            <link rel="stylesheet" href="styles/style.css" media="all" />
     </head>

<body>

     <!---main_container starts--->
     <div class="main_wrapper">

     <!---header starts--->
          
          <div class="header_wrapper">

               <img id="shopp" src="images/shopp.png" />
               <img id="banner" src="images/banner.jpg" /> 
          </div>
     <!---header end--->
     
               <!---navagation bar starts--->
           
          <div class="menubar">
     
               <ul id="menu">
                    <li><a href="#">home</a></li>
                    <li><a href="#">all product</a></li>
                    <li><a href="#">my account</a></li>
                    <li><a href="#">sign up</a></li>
                    <li><a href="#">shopping cart</a></li>
                    <li><a href="#">contact us</a></li>

               </ul>

               <div id="form">
                     <form method="get" action="results.php" enctype="multipart/form-data">
                           <input type="text" name="user_query" placeholder="search a product" />
                           <input type="submit" name="search" value="search" />
                     </form>

               </div>

          </div>

              <!---navagation bar end--->
              

          <!---content_wrapper starts--->
          <div class="content_wrapper">

               <div id="sidebar">

                     <div id="sidebar_title">Catagories</div>

                     <ul id="cats">

                         <?php getCats(); ?>

                     </ul>
                          

                     <div id="sidebar_title">Brands</div>

                           <ul id="cats">

                               <?php getBrands(); ?>

                           </ul>


               </div>


               <div id="content_area">
                    <div id="shopping_cart">
					
                        <span style="float:right; font-size:18px; padding:5px; line-height:40px;"> 
                        welcome guest! <b style="color:yellow">shopping cart-</b> total items: total price: <a href="cart.php" style="color:yellow">go to cart</a>
						
                        </span>
                        
                        

                    </div> 

                     <div id="products_box">
                  <?php
                  if(isset($_GET['pro_id'])){
                      $product_id=$_GET['pro_id'];
                      $get_pro="select * from products where product_id='$product_id'";
                      $run_pro=mysqli_query($con,$get_pro);
                  while($row_pro=mysqli_fetch_array($run_pro)){

                      $pro_id=$row_pro['product_id'];
                      $pro_title=$row_pro['product_title'];
                      $pro_price=$row_pro['product_price'];
                      $pro_image=$row_pro['product_img1'];
                      $pro_desc=$row_pro['product_desc'];


                  echo "
                   <div id='single_product'>
                    <h3>$pro_title</h3>
                    <img src='admin_area/product_images/$pro_image' width='400' height='300' />
                   <p><b> ₹ $pro_price</b></p>
                   <p>$pro_desc</p>
                    <a href='index.php' style='float:left;'>go back</a>
                   <a href='index.php?pro_id=$pro_id'><button style='float:right'>add to cart</button></a>



                  </div>   
     
                  ";


                }
              }

?>
                                          
                     </div>
               
           
               </div>

          </div>     
          <!---content_wrapper end--->
          

                  <div id="footer">
                  
                  <h2 style="text-align:center; padding-top:30px;">&copy; 2021 by www.shopp.my.com</h2>
                  
                  
                  </div>

     </div>
     <!--main container end-->

</body>
</html>