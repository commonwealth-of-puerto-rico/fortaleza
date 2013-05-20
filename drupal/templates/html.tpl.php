<!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
<link href="http://www.fortaleza.pr.gov/sites/all/themes/bootstrap/bootstrap/css/gotham.css" rel="stylesheet" type="text/css">
  <?php print $styles; ?>
  <?php print $scripts; ?>
<!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36374932-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
<!-- **************************************** Barra Gubenamental **************************************** -->
<script type="text/javascript" id="tbs">
  (function() { 
                                var newbgt = document.createElement('div');   newbgt.id = "prTopBanner"; newbgt.style.width = "100%"; newbgt.style.margin = "0 auto 5px auto"; newbgt.className = "prTopBanner";                                                                
                var bg = document.createElement('script');         bg.type = 'text/javascript'; bg.async = true;
                bg.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www2') + '.pr.gov/scripts/prGovTopBanner.js';
                var s = document.getElementById('tbs'); s.parentNode.insertBefore(bg, s); s.parentNode.insertBefore(newbgt,s);
  })();
</script>
<!-- ********************************* End Of Barra Gubenamental **************************************** -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=215034418643308";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="wrap">
  <?php // print $page_top; //comented to eliminate upper fixed administrative menu ?>
  <?php print $page; ?>
<br/>
  <?php print $page_bottom; ?>
</div>
<div id="footer_art" class="whitelink"><div style="background-image:url(/img/escudo.png); background-position:top center; background-repeat:no-repeat; height:150px; z-index:-1;"><div style="padding-top:90px;"><br/>
<span class="whitelink_sm">DESARROLLADO EN LA PLATAFORMA ABIERTA DE <a href="http://www.drupal.org" target="_blank">DRUPAL</a></span></div></div></div>
</body>
</html>
