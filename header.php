<?php 
session_start();
include('inc/config.php');
if($_SESSION['loggedIn']){
   $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <script id="tinyhippos-injected" style="color: rgb(0, 0, 0);">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script><head>
        <meta charset="utf-8">
        <title>Eventik</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" media="screen">
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="lib/bootstrap/js/html5shiv.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="<?php echo BASE_URL;?>">Eventik</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            <div class='signin-form' >
                            <?php if(!$_SESSION['loggedIn']){?>
                            <form id="signinForm" method="POST">
                                
                                    <ul class='inline-signin'>
                                        <li><input type="text" name="username" placeholder="Username" autocomplete="off"></li>
                                    
                                        <li><input type="password" name="password" placeholder="Password" autocomplete="off"></li>
                                    
                                        <li><button class="btn primary" type="submit">Sign in</button>
                                            <button href="#signUpModal" class="btn primary" type="submit" data-toggle="modal" >Sign up</button>
                                        </li>
                                    
                                </ul>
                            </form>
                            <?php }
                            else {
                                echo "Welcome ".$name." <a id='logout' href='#' >Logout</a>";
                            } ?>
                        </div>
                            
                        </p>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
