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
        <link href="css/style.css" rel="stylesheet" media="screen">
        <link href="lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <style type="text/css">
            /* Override some defaults */
            html, body {
                background-color: #eee;
            }
            body {
                padding-top: 40px; 
            }
            .container {
                width: 300px;
            }

            /* The white background content wrapper */
            .container > .content {
                background-color: #fff;
                padding: 20px;
                margin: 0 -20px; 
                -webkit-border-radius: 10px 10px 10px 10px;
                -moz-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
            }

            .login-form {
                margin-left: 65px;
            }

            legend {
                margin-right: -50px;
                font-weight: bold;
                color: #404040;
            }

        </style>    
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="lib/bootstrap/js/html5shiv.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="login-form">
                        <h2>Sign Up</h2>
                        <form action="controller/singup.php">
                            <fieldset>
                                <div class="clearfix">
                                    <input type="text" placeholder="Username">
                                </div>
                                <div class="clearfix">
                                    <input type="password" placeholder="Password">
                                </div>
                                <button class="btn primary" type="submit">Sign in</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->
    </body>
</html>