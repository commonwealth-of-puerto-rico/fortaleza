<div class="mobile_nav" align="center" style="position:relative; margin-top:-50px;">
<a href="/"><img src="/img/logo.png" width="100" height="100" border="0" /></a>
</div>
<div id="main_navigation">
<table width="980" border="0" cellspacing="0" cellpadding="5" align="center">  
  <tr>
    <td width="200" align="center" valign="middle"><a href="/"><img src="/img/logo.png" width="150" height="150" border="0" /></a></td>
    <td align="right" width="770"> <div id="navbar" role="banner" class="navbar" style="width: 405px;">
 <?php if ($primary_nav || $secondary_nav || !empty($page['navigation'])): ?>
 	<div class="navbar-inner">
        <div class="nav-collapse">
          <nav role="navigation">
            <?php if ($primary_nav): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>
          </nav>
        </div>
   </div>
      <?php endif; ?>
</div></td>
  </tr>
</table>
</div>
<div class="container">

    <?php
    $includeFile = file_get_contents('http://api.ustream.tv/json/channel/fortalezapr/getValueOf/status?key=4D1869A6089C22AC737C29A041DE4ACC');
    $json_output = json_decode($includeFile);
	$live = $json_output->results;
	
	$twitter_includeFile = file_get_contents('http://search.twitter.com/search.json?q=%23EnVivo+from:fortalezapr');
	$twitter_json_output = (array) json_decode($twitter_includeFile,true);
	$twitter_result = $twitter_json_output['results'];
	$text = $twitter_result['0']['text'];	
	
	if($live == "live") {
    ?><div style="margin-bottom:-20px;">
    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
              <tr>
                <td width="24" align="left" valign="middle" bgcolor="#333333"><img src="/img/record_icon.png" width="24" height="24" alt="En Directo" /></td>
                <td align="right" valign="middle" bgcolor="#333333"><div align="left" style="width:180px; float:left;"><img src="/img/endirecto_text.png" width="180" height="24" /></div><div class="live_text_link"><a href="/envivo" class="live_text_link"><?php echo($text); ?></a></div></td>
              </tr>
        </table><br/><br/></div>
    <?php } ?>

<?php if ($page['highlighted']): ?>
        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>    
<header role="banner" id="page-header">
    <?php if ( $site_slogan ): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#header -->
<div class="row">

<section class="<?php print _bootstrap_content_span(2); ?>">
      <?php if ($breadcrumb): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
      <?php if($title == "Inicio") { ?><?php } else { ?>
      <h1 class="page-header"><?php print $title; ?></h1>
      <?php } ?>
      <?php endif; ?>
      
	  <?php if($title == "Últimos vídeos") {
      			$url = "http://gdata.youtube.com/feeds/api/users/prfortaleza/uploads?alt=rss&orderby=published&format=5";
      			$youtube_rss = simplexml_load_file($url);
				$entries_videos = $youtube_rss->channel->item;
				$latest_video = $entries_videos[-1];
				$youtube_text = $latest_video->link;
				$youtube_video_id = str_replace('http://www.youtube.com/watch?v=', 'http://www.youtube.com/embed/', $youtube_text);
				$youtube_video_id = str_replace('&feature=youtube_gdata', '', $youtube_video_id);
				echo('<div align="center"><iframe name="videoframe" width="640" height="360" src="'.$youtube_video_id.'" frameborder="0" allowfullscreen></iframe></div>');
				echo('<h3>Videos adicionales</h3>');
				echo('<table border="0" cellspacing="0" cellpadding="5" align="center">');
				for($i = 1; $i <= 6; $i++)
				{
					if($i == 1 || $i == 4 )
					{
						echo('<tr>');
					}
					echo('<td width="225" valign="top" align="center">');
					$latest_video = $entries_videos[$i];
					$youtube_video_title = $latest_video->title;
					
					$youtube_text = $latest_video->link;
					$youtube_video_id = str_replace('http://www.youtube.com/watch?v=', '', $youtube_text);
					$youtube_video_id = str_replace('&feature=youtube_gdata', '', $youtube_video_id);
					echo('<a href="http://www.youtube.com/embed/'.$youtube_video_id.'" target="videoframe"><img style="height:135px; width:180px;" src="http://i.ytimg.com/vi/'.$youtube_video_id.'/0.jpg" width="180" height="135" border="0" class="img-polaroid"></a>');
					echo('<br/>');
					// echo($youtube_text);
					echo($youtube_video_title);
					echo('</td>');
					if($i == 3 || $i == 6 )
					{
						echo('</tr>');
					}
				}
				echo('</table>');
	   } ?>        
	  <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if ($tabs): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if ($page['help']): ?> 
        <div class="well"><?php print render($page['help']); ?></div>
      <?php endif; ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <div class="mobile_nav navbar-inner" style="width:240px;">
          <nav role="navigation">
            <?php if ($primary_nav): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>
          </nav>
   </div>
</br>
	  
	  <?php print render($page['content']); ?>

    </section>

      <aside class="span3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
        
    <p>FOTO DEL D&Iacute;A</p>
	<div align="center">
	<?php
	$url = "http://api.flickr.com/services/feeds/photoset.gne?set=72157633108363521&nsid=91802318@N07&format=rss2";
	$flickr_rss = simplexml_load_file($url);
	$entries = $flickr_rss->channel->item;
    $html = '';
    $entry = $entries[-1];
    $content = $entry->description;
    $pre_content = preg_replace('/\n+|\r\n+/', '', $content);
    $img_src_re = preg_match_all('/src=".+"/', $pre_content, $matches);
    $src = str_replace('src="', '', $matches[0][0]);
	$src_link = str_replace('_m','_z',$src);
    $html .= '<a class="fancybox" href="'.$src_link.'"><img src="' . $src . '" target="_blank" border="0" /></a>' . "\n";
    echo $html;
	?>
    </div>
    <br/>
    <button class="btn btn-small" type="button"><a href="http://www.flickr.com/photos/91802318@N07/ ">Ver fotos adicionales</a></button>
    <?php if ($page['sidebar_first']): ?>
        <?php print render($page['sidebar_first']); ?>
    <?php endif; ?>
    <p>REDES SOCIALES</p>
    <table border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td><a href="http://www.facebook.com/fortalezaproficial" target="_blank"><img src="/img/facebook_mailchimp.png" alt="Haz clic aquí para acceder a la página oficial de La Fortaleza en Facebook" width="109" height="50" border="0" /></a></td>
    <td><a href="http://www.twitter.com/fortalezapr" target="_blank"><img src="/img/twitter_mailchimp.png" alt="Haz clic aquí para acceder a la página oficial de La Fortaleza en Twitter" width="90" height="50" border="0" /></a></td>
  </tr>
</table>
</aside>
    <!-- /#sidebar-second -->
  <div align="center">
  <footer class="footer container">
    <?php print render($page['footer']); ?>
  </footer>
  </div>
</div>
