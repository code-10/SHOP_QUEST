<!--HTML boiler plate-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopQuest</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <!--font awesome-->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!--bootstrap js-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>
     <style media="screen">
            .figure {display: table;margin-right: auto;margin-left: auto;}
            .figure-caption {display: table-caption;caption-side: bottom;text-align: center;}
            .card{ border:none;}
    </style>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="#" class="navbar-brand">ShopShop</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Products</a>
        </div>
        <div class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['user_name'])) {
                    echo '<a href="profile.php" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
                    echo '<a href="product/cart_display.php" class="nav-item nav-link active"><i class="fa fa-shopping-cart style="font-size:36px""></i></a>';
                    echo '<a href="login/logout.php" class="nav-item nav-link">Logout</a>';
                }
                else{
                    echo '<a href="register/register.php" class="nav-item nav-link">Register</a>
                            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp';
                }
            ?>
        </div>
    </div>
</nav>
  
  <!--Search bar-->
<div class="row p-4" style="background-color:#000">
  <div class="container">
    <form  method="GET" action="search.php">
      <div class="text-center">
            <input type="text" class="form-control mr-sm-2" placeholder="Search" name="search_product" required><br>
            <button type="submit" class="btn btn-outline-light my-sm-0">Search</button>
      </div>
    </form>
  </div>
</div>
  
 
<!--main card
  <div class="card m-4">
  <img class="card-img-top" src="black.png" alt="Card image top" style="height:12rem;">
  <div class="card-body text-center"> 
    <h3 class="card-title">Get Everything</h3>
    <button type="submit" class="btn btn-outline-dark">Explore</button>
  </div>
</div> -->
 
    
    
    
    <!--main card carousel-->
    <div id="main-card" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
       <img src="assets/caro1.jpg" class="img-fluid" alt="..." style="width:100%;">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="assets/caro2.jpg" class="img-fluid" alt="..." style="width:100%;">
    </div>
    <div class="carousel-item">
      <img src="assets/caro3.jpg" class="img-fluid" alt="..." style="width:100%;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#main-card" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#main-card" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
    
    
    
    
    
    
    
    
    <?php
  
          $con = getCon();
          $categories=Array();
          $res = $con->query("select * from categories");
          while($ele = $res->fetch_assoc()){
              $categories[]=$ele['cat_name'];
          }
  
    ?>
    
    <br>
    <br>
 <!--Loop category-->
    <p class="display-4 text-center">Categories</p>
    <?$c=1; for($j=1;$j<=2;$j++){ ?>
    <div class="container" id="category">
    <div class="card-deck m-2">
    <? for($i=1;$i<=4;$i++){ ?> 
   <div class="card m-4">
     <figure class="figure">
       <img src="cats/rcat<?=$c?>.jpg" class="img-fluid" alt="image">
       <figcaption class="figure-caption text-center"><a href='categories/category.php?cat_id=<?=$c;?>&&cat_name=<?=$categories[$c-1];?>' class="stretched-link"><h5><?=$categories[$c-1];?></h5></a></figcaption>
     </figure>
   </div> 
  <? $c++;} ?>
      </div> 
     </div>
    <? } ?>
    
    
    
    
   
  
  
</body>

<?php include 'footer.php'; ?>
