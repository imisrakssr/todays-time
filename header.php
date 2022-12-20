<?php include 'admin/inc/connection.php'; ?>
<?php include 'admin/inc/functions.php'; ?>
<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Markedia - Marketing Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> 
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Animate styles for this template -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

    <!-- Version Marketing CSS for this template -->
    <link href="css/version/marketing.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <header class="market-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/version/market-logo.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
 
                <?php

                    $has_sub = '';

                $cat_sel_sql = "SELECT * FROM category WHERE is_sub = '0' ORDER BY cat_name ASC";
                $cat_sel_res = mysqli_query($conn,$cat_sel_sql);
                while($row = mysqli_fetch_assoc($cat_sel_res)){
                $cat_id2     = $row['cat_id'];
                $cat_name   = $row['cat_name'];
                $cat_desc   = $row['cat_desc'];
                $is_sub     = $row['is_sub'];
                $cat_status = $row['cat_status'];


                $cat_sel_sql2 = "SELECT * FROM category WHERE is_sub = $cat_id2"; 
                $cat_sel_res2 = mysqli_query($conn,$cat_sel_sql2);
                $sub = mysqli_num_rows($cat_sel_res2);
                if($sub == 0){
                    $has_sub = '';
                }else{
                    $has_sub = 'dropdown-toggle';
                }

                ?> 

                <li class="nav-item dropdown">

                    <a class="nav-link <?php echo $has_sub; ?>" href="category.php?cat_id=<?php echo $cat_id2 ;?>" role="button" data-toggle="dropdown"> <?php echo $cat_name; ?> </a>
                    <?php submenu($cat_id2); ?>
                    
                </li>

                <?php
                
                }
                ?>

                        </ul>
                        <form class="form-inline" method="POST" action="search.php" style="position: relative;">
                            <!-- <input class="form-control mr-sm-2" type="text" placeholder="How may I help?" name="q" required="required"> -->
                            <input class="form-control mr-sm-2" type="text" placeholder="How may I help?" id="search" name="q" required="required" onkeyup="findTitle(this.value)">
                            <small id="hint" style="position: absolute;top: 60px;background: white;color: black;"></small>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="find_val">Search</button>
                        </form>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <script type="text/javascript">

            function findTitle($str){

            if($str.length == 0){
            document.getElementById('hint').innerHTML = '';
            return;
            }

                //alert($str);
                  var xhttp = new XMLHttpRequest();
                      xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                         document.getElementById("hint").innerHTML = this.responseText;
                        }
                          };
                          xhttp.open("GET", "ajax.php?q="+$str, true);
                          xhttp.send();


            }
            
        </script>