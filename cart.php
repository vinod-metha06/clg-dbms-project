<!DOCTYPE>
<?php
session_start();

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
               <?php cart();?>
                    <div id="shopping_cart">
					
                        <span style="float:right; font-size:18px; padding:5px; line-height:40px;"> 
                       

                        <?php
                          if(isset($_SESSION['customer_email'])){
                              echo "<b>Welcome:</b>". $_SESSION['customer_email']."<b>Your</b>";
                          }
                          else{
                              echo "<b>Welcome Guest:</b>";
                          }
                        ?>
                        
                        
                        
                        <b style="color:yellow">shopping cart-</b> total items: <?php total_itmes();?> total price:<?php total_price(); ?> <a href="index.php" style="color:yellow">Back to Shop</a>


                        <?php
                          if(!isset($_SESSION['customer_email'])){

                              echo"<a href='checkout.php'>Login</a>";
                          }
                          else{
                               echo"<a href='logout.php'>Logout</a>";
                              }
                        
                         ?>
						
                        </span>                      
                      

                    </div> 

                    

                     <div id="products_box">
                     
                     <form action="" method="post" enctype="multipart/form-data">
                     <table align="center" width="700" bgcolor="skyblue">
                     
                     <tr align="center">
                        <th>remove</th>
                        <th>product(s)</th>
                        <th>quantity</th>
                        <th>total price</th>       
                     </tr>   
 <?php 

       $total=0;


        global $con;
        $ip=getIp();

        $sel_price="select * from cart where ip_add='$ip'";

        $run_price=mysqli_query($con,$sel_price);

        while($p_price=mysqli_fetch_array($run_price)){

            $pro_id=$p_price['p_id'];

            $qty=$p_price['qty'];

            $pro_price="select * from products where product_id='$pro_id'";

            $run_pro_price=mysqli_query($con,$pro_price);

            while($pp_price=mysqli_fetch_array($run_pro_price)){

            $product_price=array($pp_price['product_price']);

            $product_title=$pp_price['product_title'];

            $product_image=$pp_price['product_img1'];

            $single_price=$pp_price['product_price'];

            $values= array_sum($product_price);

            $values=$single_price*$qty;

            $total +=$values;
            
              
                      
   ?>

                   
             <tr align="center">
                 <td><input type="submit" name="remove"  value="remove <?php echo $pro_id;?>"/></td>
                 
                <td><?php echo $product_title;?><br>
                  
                <img src="admin_area/product_images/<?php echo $product_image;?>"
                width="60" height="60"/><br>
                <?php echo" ₹ $single_price";?>
                </td>
                <td><input type="text" size="2" name='qty[]' value="<?php echo $qty;?>"/></td>
                <td><?php echo" ₹ $values";?></td>
                <td><input type="hidden" size="3" name='cart_idee[]' value="<?php echo $pro_id;?>"/></td>
              
               <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td><br>
             
               
             </tr>



        ///// For updating qunatity     

    <?php
    

      if(isset($_POST['update_cart'])){
           if(isset($_POST['qty']))
             {

              $qty=$_POST['qty'];

              $cat_qn=$_POST['cart_idee'];

             $array=array_combine($qty,$cat_qn);
             foreach($array as $q =>$i)

             {

              $update_qty="UPDATE cart SET qty='$q' WHERE p_id='$i'";

              $run_qty=mysqli_query($con,$update_qty);


              if($run_qty){
                echo"<script>window.open('cart.php','_self')</script>";
            }

            
             }
       }
  }
   
 ?>

    <?php }}
    
    
        ?>


    ////// for deleting product from cart page
     
     <?php               
          $ip=getIp();
         if(isset( $_POST['remove'])){
           //  $_POST['remove'];
               $remove_id=$pro_id;

                $delete_product= "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
                
                $run_delete=mysqli_query($con,$delete_product);

                if($run_delete){
                    echo"<script>window.open('cart.php','_self')</script>";
                }
             
         }

         ?>

          
         

    <tr align="right"> 
                <td colspan="4"><b>Sub Total:</b></td>
                <td colspan="4"><?php echo "₹".$total;?></td>
            </tr>
            
            <tr align="center">
                
                <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                <td><button><a href="checkout.php" style="text-decoration: none; color:black;">Checkout</a></button></td>
            </tr>

        </table>
                                        
            </form>
        <?php
            

        if(isset($_POST['continue'])){
            echo"<script>window.open('index.php','_self')</script>";
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