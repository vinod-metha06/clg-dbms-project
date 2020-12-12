<?php

session_start();
include("includes/db.php");
include("functions/functions.php");


?>


<!DOCTYPE HTML>


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
                    <li><a href="../index.php">home</a></li>
                    <li><a href="../all_products.php">all product</a></li>
                    <li><a href="../customer/my_account.php">my account</a></li>
                    <li><a href="#">sign up</a></li>
                    <li><a href="../cart.php">shopping cart</a></li>
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

                     <div id="sidebar_title">My Account</div>

                     <ul id="cats">

                       <?php
                         
                         $user=$_SESSION['customer_email'];

                         $get_img="select * from customers where customer_email='$user'";

                         $run_img=mysqli_query($con,$get_img);

                         $row_img=mysqli_fetch_array($run_img);

                         $c_image=$row_img['customer_image'];

                         $c_name=$row_img['customer_name'];

                         echo "<img src='customer_images/$c_image' width='150' height='150'/>";
                       
                       ?>

                       <li><a href="my_account.php?my_orders">My Orders</a></li>
                       <li><a href="my_account.php?edit_account">Edit Account</a></li>
                       <li><a href="my_account.php?change_pass">Change Password</a></li>
                       <li><a href="my_account.php?delete_account">Delete Account</a></li>
                       <li><a href="logout.php?">Logout</a></li>
                      

                     </ul>
                          

                    

               </div>

               <div id="content_area">
               <?php cart();?>
                    <div id="shopping_cart">
					
                        <span style="float:right; font-size:18px; padding:5px; line-height:40px;"> 
                        <?php
                          if(isset($_SESSION['customer_email'])){
                              echo "<b>Welcome:</b>". $_SESSION['customer_email'];
                          }
                          
                        ?>
                        

                     						

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

                     <h2 style="padding: 20px; color:yellow">Welcome:<?php echo $c_name;?></h2>

                     <?php 
                      if(isset($_GET['edit_account'])){
 
                         include("edit_account.php");
                      }

                      if(isset($_GET['change_pass'])){
 
                         include("change_pass.php");
                      }

                      if(isset($_GET['delete_account'])){
 
                         include("delete_account.php");
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

