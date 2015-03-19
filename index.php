<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
			
			
			.weekly-menu-content {
			  display: inline-block;
			  background-color: #ffffff;
			  width: 100%;
			  overflow-x: hidden;
			  overflow-y: auto;
			}
			.weekly-menu-item {
			  padding: 10px;
			}
			.weekly-menu-item-date {
			  font-weight: bold;
			}
			.weekly-menu-item-a::before {
			  content: 'A: ';
			  font-weight: bold;
			}
			.weekly-menu-item-b::before {
			  content: 'B: ';
			  font-weight: bold;
			}
			.weekly-menu-item:nth-child(even) {
			  background-color: #eeeeee;
			}
			
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $_SERVER['SERVER_NAME']; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
		<div class="col col-md-3">
			<h1>Bencur</h1>
			<div id="bencur"> </div>
		</div>
		<div class="col col-md-3">
			<h1>Piroska</h1>
			<div id="piroska"> </div>
		</div>
		<div class="col col-md-3">
			<img style="width: 100%;" src="http://www.minietelbar.hu/menu.jpg">
		</div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2015</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
$.get("http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://www.benczuretterem.hu/", function (data) {
  // data is the content of the URL.
	$page = $(data);
	$("#bencur").append($("#weekly-menu-content", $page));	
});
$.get("http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://www.piroskavendeglo.hu/", function (data) {
  // data is the content of the URL.
	$page = $(data);
	$("#piroska").append($("article", $page));	
	
	var o_href = $("#piroska > article > a").attr('href');
	$("#piroska > article > a").attr('href', "http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://www.piroskavendeglo.hu/" + o_href);
	
	var o_src = $("#piroska > article > a > img").attr('src');
	$("#piroska > article > a > img").attr('src', "http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://www.piroskavendeglo.hu/" + o_src);
	$("#piroska > article > a > img").removeAttr( "width" )
});
	

</script>
    </body>
</html>
