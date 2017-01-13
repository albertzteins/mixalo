<?php

/* Get banners */
require_once 'models/Banner.class.php';

$banners[1] = Banner::getBannerForPosition(1);
$banners[2] = Banner::getBannerForPosition(2);
$banners[3] = Banner::getBannerForPosition(3);
$banners[4] = Banner::getBannerForPosition(4);
$banners[5] = Banner::getBannerForPosition(5);
$banners[6] = Banner::getBannerForPosition(6);
$banners[7] = Banner::getBannerForPosition(7);
$banners[8] = Banner::getBannerForPosition(8);
$banners[9] = Banner::getBannerForPosition(9);
$banners[10] = Banner::getBannerForPosition(10);
$banner_footer = !isset($properties['hide_footer_banner']) ? Banner::getBannerForPosition(11) : null;

?>
    </div> <!-- /content -->
<?php if ($banner_footer): ?>
    <div id="footer-banner">
      <a target="_blank" href="<?=$banner_footer->getLink()?>"><img src="/views/banners/<?=$banner_footer->getImage()?>" /></a>
    </div>
<?php endif; ?>
    <div id="footer">
      <p>¿El editor en línea no fue suficiente para ti? <a href="/descargas/">Descarga los templates</a> y envíanos tus campañas aún más personalizadas a <a href="mailto:contacto@mixalo.com">contacto@mixalo.com</a></p>
      <p><a href="http://www.mixalo.com/legal/">Condiciones generales</a></p>
    </div>
  </div> <!-- /Content-wrapper -->
  <div id="sidebar">
    <div id="toppli">
<?php if (!DEVELOPMENT): ?>
      <div class="facebook">
        <iframe src="//www.facebook.com/plugins/like.php?locale=en_US&amp;href=http%3A%2F%2Fwww.facebook.com%2Ftopenred&amp;send=false&amp;layout=button_count&amp;width=88&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=272050226179900" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:88px; height:21px;" allowTransparency="true"></iframe>
      </div>
      <div class="twitter">
        <a href="https://twitter.com/toppli" class="twitter-follow-button" data-show-count="false" data-lang="en" data-show-screen-name="false">Follow @toppli</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
<?php endif; ?>
    </div>
    <div id="banners">
<?php if($user->isLoggedIn()): ?>
      <a href="/banner/nuevo/">Agregar banner</a>
<?php endif; ?>
<?php foreach ($banners as $banner): ?>
<?php if($banner): ?>
      <div class="banner">
<?php if($banner->getTitle()): ?>
        <span><?=$banner->getTitle()?></span>
<?php endif; ?>
        <a target="_blank" href="<?=$banner->getLink()?>"><img src="/views/banners/<?=$banner->getImage()?>" /></a>
<?php if($user->isLoggedIn()): ?>
        <br />
        <a href="/banner/eliminar/<?=$banner->getId()?>/">Eliminar</a>
<?php endif; ?>
      </div>
<?php endif; ?>
<?php endforeach; ?>
    </div>
  </div>
</div> <!-- /Wrapper -->
<script type='text/javascript' src='/views/js/jquery-1.7.2.min.js'></script>
<script type='text/javascript' src='/views/js/jquery.lazyload.min.js'></script>
<?php if($add_to_footer) echo $add_to_footer; ?>
<?php if (!DEVELOPMENT): ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31849814-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php endif; ?>
</body>
</html>
