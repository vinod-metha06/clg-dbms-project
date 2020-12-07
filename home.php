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
<br>

<div class="container-fluid">
  <h2>Toggleable Pills</h2>
  <br>
  <!-- Nav pills -->
  <div >
  <ul class="nav nav-pills" role="tablist"  id="menu">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1">all products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu2">my account</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#signup">sign up</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#cart">shopping cart</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#contact">Contact us</a>
    </li>
  </ul>

  
  </div>

  <div id="form">
        <form method="get" action="result.php" enctype="multipart/form-data">
        <input type="text" name="user_query" placeholder="search a product"/>
        <input type="submit" name="search" value="search" />
        </form>

      </div>
  



























 <!-- <?php

$get_cats="select * from categories";
$run_cats= mysqli_query($con, $get_cats);

while($row_cats=mysqli_fetch_array($run_cats)) {

  $cat_id=$row_cats['cat_id'];
  $cat_title=$row_cats['cat_title'];

echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

}
?> -->


















  <!-- Tab panes -->
  <div class="tab-content" >
    <div id="home" class="container tab-pane active"><br>
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="signup" class="container tab-pane fade"><br>
      <h3>Menu 3</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="cart" class="container tab-pane fade"><br>
      <h3>Menu 4</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="contact" class="container tab-pane fade"><br>
      <h3>Menu 5</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>

</body>
</html>
