<?php get_header('Publica tu campaña alternativa', array('step' => 3)); ?>
<div id="campaing-image">
<?php if(!$user->isLoggedIn()): ?>
  <span></span>
<?php endif; ?>
  <img src="<?=$cmpgn->getImageURI()?>" />
</div>
<div id="publish-campaign">
  <h3>Tu campaña ha sido agregada a la galería. ¡Lanza tu campaña!</h3>
  <br />
  <input type="text" class="large" value="<?=SITE_URI . '/ver/' . $cmpgn->getId() . '/'?>">
</div>
<div id="buttons">
  <div id="button-twitter">
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.mixalo.com/ver/<?=$cmpgn->getId()?>/" data-text="Crea tu campaña alternativa en #Mixalo" data-lang="es" data-count="none" data-via="toppli">Twittear</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
  <div id="button-fb">
    <a name="fb_share" type="button" share_url="http://www.mixalo.com/ver/<?=$cmpgn->getId()?>/">Compartir</a> 
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
  </div>
</div>
<?php get_footer(); ?>