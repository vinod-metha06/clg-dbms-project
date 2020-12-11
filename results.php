<?php

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

               <a href="index.php"><img id="shopp" src="images/shopp.png" /></a>
               <img id="banner" src="images/banner.jpg" /> 
          </div>
     <!---header end--->
     
               <!---navagation bar starts--->
           
          <div class="menubar">
     
               <ul id="menu">
                    <li><a href="index.php">home</a></li>
                    <li><a href="all_products.php">all product</a></li>
                    <li><a href="customer/my_account.php">my account</a></li>
                    <li><a href="#">sign up</a></li>
                    <li><a href="cart.php">shopping cart</a></li>
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
         <img src='admin_area/product_images/$pro_image' width='180' height='180' />
         <p><b> ₹ $pro_price</b></p>
         <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
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