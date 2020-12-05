<?php

include("includes/db.php");


?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>my shop</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
        <form method="get" action="result.php" enctype="multipart/form-data">
        <input type="text" name="user_query" placeholder="search a product"/>
        <input type="submit" name="search" value="search" />
        </form>

      </div>




    </div>

    <!--navagation bar ends-->

    <div class="content_wrapper">
      <div id="left_sidebar">
        <div id="sidebar_title">categories</div>
        <ul id="cats">

          <?php

          $get_cats="select * from categories";
          $run_cats= mysqli_query($con, $get_cats);

          while($row_cats=mysqli_fetch_array($run_cats)) {

            $cat_id=$row_cats['cat_id'];
            $cat_title=$row_cats['cat_title'];

          echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
          
          }
         ?>

        </ul>
         
        <div id="sidebar_title">brands</div> 

        <ul id="cats">
        <?php

         $get_brands="select * from brands";
         $run_brands= mysqli_query($con, $get_brands);

           while($row_brands=mysqli_fetch_array($run_brands)) {

          $brand_id=$row_brands['brand_id'];
          $brand_title=$row_brands['brand_title'];

          echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";

             }
           ?>

        </ul>




      </div>


      
      <div id="right_content">
      <div id="headline">
      <div id="headline_content"></div>
      <b>welcome guest!</b>
      <b style="colour:yello;">shopping cart:</b>
      
      
      </div>



        </div>

    </div>
    <div class="footer">

    <h1 style="color:black; padding-top:30px; text-align:center;">&copy; 2020 - by www.onlineustate.com</h1>
    </div>


</div>
<!--main container end-->

</body>
<html>
