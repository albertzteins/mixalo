<?php
$add_to_header = '  <meta property="og:type" content="article" />' . chr(10);
$add_to_header .= '  <meta property="og:title" content="Campañas Alternativas" />' . chr(10);
$add_to_header .= '  <meta property="og:description" content="Lo que no dicen los candidatos. Crea tu campaña alternativa en www.mixalo.com" />' . chr(10);
$add_to_header .= '  <meta property="og:url" content="http://www.mixalo.com/ver/' . $campaign->getId() . '/" />' . chr(10);
$add_to_header .= '  <meta property="og:image" content="' . $campaign->getImageURI() . '" />' . chr(10);
# $add_to_header .= '  <meta property="fb:admins" content="690625762" />' . chr(10);
$add_to_header .= '  <meta property="fb:app_id" content="240337896065664"/>' . chr(10);
?>
<?php get_header(null, null, $add_to_header); ?>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '240337896065664', // App ID
      channelUrl : '//www.mixalo.com/channel.php', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=240337896065664";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php if($user->isLoggedIn()): ?>
<p class="right"><a href="/eliminar/<?=$campaign->getId()?>/">Eliminar campaña</a></p>
<?php endif; ?>
<div id="campaing-image">
<?php if(!$user->isLoggedIn()): ?>
  <span></span>
<?php endif; ?>
  <img src="<?=$campaign->getImageURI()?>" />
</div>
<div id="campaign-author">
<?php if($campaign->getAuthorSite() && $campaign->getAuthor()): ?>
  Campaña de <a href="<?=$campaign->getAuthorSite()?>"><?=$campaign->getAuthor()?></a>
<?php elseif($campaign->getAuthor()): ?>
  Campaña de <?=$campaign->getAuthor()?>
<?php else: ?>
  Campaña de Anónimo
<?php endif; ?>
</div>
<div id="campaign-meta">
  <a id="button-create" href="<?=SITE_URI?>">Crea tu campaña</a>
  <div class="right">
    <div class="tag">Vota y comparte:</div>
    <div id="button-vote">
      <a href="#" id="vote-link"><span>Vota</span></a>
      <script type="text/javascript">
      if (window.addEventListener) {
        window.addEventListener('load', function() { initVote(); }, false);
      } else if (window.attachEvent) {
        window.attachEvent('onload', function() { initVote(); });
      }
      function initVote()
      {
        $('#vote-link').click(function()
        {
          $.ajax(
          {
    		  	url: "/ajax/votar/",
    		  	data: "id=" + <?=$campaign->getId()?>,
    		  	type: "POST",
    		  	success: function(response)
    		  	{
    		  		$('#vote-link').addClass('on');
    		  	},
    		  	error: function(error)
    		  	{
    		  		alert("No se pudo votar, inténtalo más tarde.");
    		  	}
    		  });
          
          return false;
          
        });
      }
      </script>
    </div>
    <div id="button-facebook-toppli">
      <iframe src="//www.facebook.com/plugins/like.php?locale=en_US&amp;href=http%3A%2F%2Fwww.facebook.com%2Ftopenred&amp;send=false&amp;layout=button_count&amp;width=88&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=272050226179900" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:88px; height:21px;" allowTransparency="true"></iframe>
    </div>
    <div id="button-twitter">
      <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.mixalo.com/ver/<?=$campaign->getId()?>/" data-text="Crea tu campaña alternativa en #Mixalo" data-lang="es" data-count="none" data-via="toppli">Twittear</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <div id="button-fb">
    <a name="fb_share" type="button" share_url="http://www.mixalo.com/ver/<?=$campaign->getId()?>/">Compartir</a> 
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
  </div>
  </div>
</div>
<?php if($user->isLoggedIn()): ?>
  <p>Votos: <?=$campaign->getVotes()?></p>
<?php endif; ?>
<?php if ($banner_footer): ?>
    <div id="footer-banner">
      <a target="_blank" href="<?=$banner_footer->getLink()?>"><img src="/views/banners/<?=$banner_footer->getImage()?>" /></a>
    </div>
<?php endif; ?>
<div class="fb-comments" data-href="<?=SITE_URI?>/ver/<?=$campaign->getId()?>/" data-num-posts="2" data-width="720"></div>
<?php get_footer(null, array('hide_footer_banner' => true)); ?>