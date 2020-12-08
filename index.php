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
    <?php cart();?>
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
          <?php getPro();?>
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
