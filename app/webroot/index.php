<?php
//header('Cache-Control: max-age=' . (12 * 60 * 60));
require_once 'rss_php.php';
function myrss($link, $menu = false) {
	$rss = new rss_php;
	$rss->load($link);
	$items = $rss->getItems(); #returns all rss items

	$no = 0;
	if($menu === true) {
		for($i = 0; $i < count($items); $i++) {
			if(strpos( mb_strtolower($items[$i]['description']), 'menü') !== FALSE) {
				$no = $i;
				break;
			}
		}
	}

	$x = new DateTime($items[$no]['pubDate']);
	$yest = new DateTime('yesterday 18:00');
	echo '<h4>';
	if($x->getTimestamp() < $yest->getTimestamp()) {
		echo '<span style="background-color: #F00;">' . $items[$no]['pubDate'] . '</span>';
	} else {
		echo $items[$no]['pubDate'];
	}
	echo '</h4>';
	echo '<div>' . str_replace('href="/', 'href="http://facebook.com/', $items[0]['description']);
	echo '</div>';
}

if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip = $_SERVER['REMOTE_ADDR'];
}

if($ip != $_SERVER['SERVER_ADDR']) {
	$myfile = fopen("logs.txt", "a");
	$txt = date('Y-m-d H:i:s') . "\t" . $ip . "\t" . gethostbyaddr($ip);
	fwrite($myfile, "\n". $txt);
	fclose($myfile);
}


$appid = null;
switch ($_SERVER['SERVER_NAME']) {
  case 'bakroistvan.lwr.local':
    $appid = '839302366159530';
    break;
  case 'lwrkaja.pe.hu':
    $appid = '709627479156746';
    break;
}

?>
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
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
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

            img {
              width: 100%;
            }

            .minim {
              width: 33%;
            }



            #piroska * {
              margin: 0 0 0 0;
            }

			
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script type="text/javascript">
          var appId = '<?php echo $appid; ?>';
        </script>
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<nav class="navbar navbar-default">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">bakró @ <?php echo $_SERVER['SERVER_NAME']; ?></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <ul class="nav navbar-nav">
            <li><a href="https://graph.facebook.com/oauth/authorize?client_id=<?php echo $appid; ?>&redirect_uri=http://<?php echo $_SERVER['SERVER_NAME']; ?>&display=touch">FB Login</a></li>
            <li><a target="_blank" href="http://goo.gl/phT5hD">Javaslatok</a></li>
          </ul>
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<div class="container">
      <!-- Example row of columns -->
  

  <div id="res" class="row">
		<div class="col col-md-4">
			<h1><a href="http://www.piroskavendeglo.hu/etlap/" target="_blank">Piroska</a></h1>
			<div id="piroska"> </div>
		</div>

		<div id="muskatli" class="col col-md-4">
			<h1><a href="https://www.facebook.com/pages/Musk%C3%A1tli-%C3%89tkezde/116495811806493" target="_blank">Muskátli étkezde</a></h1>
			<?php //myrss('https://www.facebook.com/feeds/page.php?id=116495811806493&format=rss20', true); ?>
		</div>

		<div class="col col-md-4">
			<h1><a href="http://www.benczuretterem.hu/" target="_blank">Bencur</a></h1>
			<div id="bencur"> </div>
		</div>
    </div>
	
	
  <div class="row">
		<div class="col col-md-4">
			<h1><a href="http://www.minietelbar.hu/" target="_blank">Mini Ételbár</a></h1>
			<img style="width: 100%;" src="http://www.minietelbar.hu/menu.jpg">
		  </div>
		
		<div id="kefa" class="col col-md-4">
			<h1><a href="https://www.facebook.com/pages/Kefa-Falatoz%C3%B3-K%C3%A1v%C3%A9z%C3%B3-Fagyiz%C3%B3/675297079184846?fref=ts" target="_blank">Kefa falatozó</a></h1>
			<?php //myrss('https://www.facebook.com/feeds/page.php?format=rss20&id=675297079184846'); ?>
		</div>

    <div id="chili" class="col col-md-4">
      <h1><a href="https://www.facebook.com/pages/Chili-Bisztr%C3%B3/124245150953481?ref=ts&fref=ts" target="_blank">Chili Bisztró</a></h1>
      <?php //myrss('https://www.facebook.com/feeds/page.php?format=rss20&id=168988876483576', true); ?>
    </div>
	    
  </div>
		
	
	<div class="row">
    <div id="krinet" class="col col-md-4">
      <h1><a href="https://www.facebook.com/pages/Krinet-gyors%C3%A9tterem-%C3%A9s-k%C3%A1v%C3%A9z%C3%B3/168988876483576" target="_blank">Krinet gyorsétterem</a></h1>
      <?php //myrss('https://www.facebook.com/feeds/page.php?format=rss20&id=168988876483576', true); ?>
      </div>
    


		<div class="col col-md-4">
			<h1><a href="http://www.napfenyesetterem.hu/vegan-vegetarianus-napi-ajanlatok" target="_blank">Napfényes étterem</a></h1>
			<div id="napfenyes"> </div>
		</div>
		
		<div class="col col-md-4">
  			<h1><a href="http://atriumetterem.hu/napi-menu/" target="_blank">Átrium étterem</a></h1>
  			<div id="atrium"> </div>
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
jQuery.expr[':'].regex = function(elem, index, match) {
    var matchParams = match[3].split(','),
        validLabels = /^(data|css):/,
        attr = {
            method: matchParams[0].match(validLabels) ? 
                        matchParams[0].split(':')[0] : 'attr',
            property: matchParams.shift().replace(validLabels,'')
        },
        regexFlags = 'ig',
        regex = new RegExp(matchParams.join('').replace(/^s+|s+$/g,''), regexFlags);
    return regex.test(jQuery(elem)[attr.method](attr.property));
}


$.get("http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://www.benczuretterem.hu/", function (data) {
  // data is the content of the URL.
	$page = $(data);
	$("#bencur").append($("#weekly-menu-content", $page));	
});

$.get("http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://www.piroskavendeglo.hu/etlap", function (data) {
  // data is the content of the URL.
	$page = $(data);
	$("#piroska").append($(".menuRow:first", $page).parent().attr("id"));
	$("#piroska").append($(".menuRow:first", $page));
	
	$("#piroska").find(".price").remove();
	$("#piroska").find(".photoRow").remove();
  
	$("#piroska").find('h4').replaceWith(function() {
		return '<h5>' + $(this).text() + '</h5>';
	});
	
	// fooldal
	//$("#piroska").append($("#content > section:first", $page));
	
	var o_href = $("#piroska > section > article > a").attr('href');
	$("#piroska > section > article > a").attr('href', "http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://www.piroskavendeglo.hu/" + o_href);
	
	var o_src = $("#piroska > section > article > a > img").attr('src');
	$("#piroska > section > article > a > img").attr('src', "http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://www.piroskavendeglo.hu/" + o_src);
	$("#piroska > section > article > a > img").removeAttr( "width" )
});

$.get("http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://www.napfenyesetterem.hu/vegan-vegetarianus-napi-ajanlatok/140-napi-ajanlatok-napfenyes-falatozo", function (data) {
  // data is the content of the URL.
  $page = $(data);
  $("#napfenyes").append($(".article-content > table > tbody > tr > td:first", $page));
});

$.get("http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=http://atriumetterem.hu/napi-menu/", function (data) {
  // data is the content of the URL.
	$page = $(data);
	$("#atrium").append($("#post-19", $page));	
});

$.get("http://<?php echo $_SERVER['SERVER_NAME']; ?>/proxy.php?url=https://www.facebook.com/pages/Chili-Bisztr%C3%B3/124245150953481?fref=ts", function (data) {
  // data is the content of the URL.
	$page = $(data);
	
});

</script>



<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//bakroistvan.lwr.local/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//bakroistvan.lwr.local/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
    </body>
</html>