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
                        welcome guest! <b style="color:yellow">shopping cart-</b> total items: <?php total_itmes();?> total price:<?php total_price(); ?> <a href="cart.php" style="color:yellow">go to cart</a>
						
                        </span>                      
                      

                    </div> 

                    <form action="customer_register.php" method="post" enctype="multipart/form-data">
                       <table align="center" width="750">
                           <tr>
                               <td  align="center"><h2>Create an Account</h2></td>
                           </tr>

                           


                           <tr>
                               <td align="right">Customer Profile Picture: </td>
                               <td><input type="file" name="c_image" /></td>
                           </tr>


                           <tr>
                               <td align="right">Customer Name: </td>
                               <td><input type="text" name="c_name" required/></td>
                           </tr>


                           <tr>
                               <td align="right">Customer Email: </td>
                               <td><input type="email" name="c_email" required/></td>
                           </tr>


                           <tr>
                               <td align="right">Customer Password: </td>
                               <td><input type="password" name="c_pass" required/></td>
                           </tr>


                           <tr>
                               <td align="right">Customer Country: </td>
                               <td>
                                   <select name="c_country" required>
                                       <option>Select a Country </option>
                                       <option>USA</option>
                                       <option>India</option>
                                       <option>UAE</option>
                                       <option>Japan</option>
                                       <option>UK</option>


                                   </select>

                               </td>
                           </tr>

                           <tr>
                               <td align="right">Customer City: </td>
                               <td><input type="text" name="c_city" required/></td>
                           </tr>


                           <tr>
                               <td align="right">Customer Contact: </td>
                               <td><input type="number" name="c_contact" required/></td>
                           </tr>


                           <tr>
                               <td align="right">Customer Address: </td>
                               <td><textarea cols="20" rows="10" name="c_address" required></textarea></td>
                           </tr>

                           <tr align="center">
                              
                               <td colspan="6"><input type="submit" name="register" value="Create Account"/></td>
                           </tr>

                           



                       </table>
                    </form>

                    
           
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


<?php
if(isset($_POST['register']))
  {

    $ip=getIp();

    

    $c_name=$_POST['c_name'];
    
    $c_email=$_POST['c_email'];

    $c_pass=$_POST['c_pass'];

    $c_country=$_POST['c_country'];

    $c_city=$_POST['c_city'];

    $c_contact=$_POST['c_contact'];

    $c_address=$_POST['c_address'];
    
    $c_image=$_FILES['c_image']['name'];

    $c_image_tmp=$_FILES['c_image']['tmp_name'];

    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    
   echo $insert_c="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";


    $run_c=mysqli_query($con, $insert_c);

    $sel_cart ="select * from cart where ip_add='$ip'";

    $run_cart=mysqli_query($con,$sel_cart);

    $check_cart=mysqli_num_rows($run_cart);

    if($check_cart==0){

        $_SESSION['customer_email']=$c_email;

        echo"<script>alert('Account has been created successfully !')</script>";
        echo"<script>window.open('my_account.php','_self')</script>";
    }

    else{
        $_SESSION['customer_email']=$c_email;

        echo"<script>alert('Account has been created successfully !')</script>";
        echo"<script>window.open('checkout.php','_self')</script>";
    }

  }




?>



