<?php get_header('Galería'); ?>
<ul id="gallery">
<?php foreach($campaigns as $campaign): ?>
  <li>
    <a href="/ver/<?=$campaign->getId()?>/">
      <img class="lazy" data-original="<?=$campaign->getThumbURI()?>" src="/views/images/campaign_placeholder.png" />
    </a>
  </li>
<?php endforeach; ?>
</ul>
<div id="campaigns-loading">Cargando más campañas...</div>
<?php
$meh = <<<MEH
<script type="text/javascript">
alreadyloading = false;
nextpage = 2;
 
$(window).scroll(function() {
  if ($('body').height() <= ($(window).height() + $(window).scrollTop()) + 200) {
    if (alreadyloading == false) {
      $('#campaigns-loading').show();
      var url = "/ajax/{$ajax_page}page=" + nextpage;
      alreadyloading = true;
      $.post(url, function(data) {
        if (data)
        {
          $('#campaigns-loading').hide();
          $('#gallery').children().last().after(data);
          alreadyloading = false;
          nextpage++;
        }
        else
        {
          $('#campaigns-loading').html('Has llegado al final de las campañas.');
        }
      });
    }
  }
});
</script>
MEH;
?>
<?php get_footer('<script type="text/javascript">$("img.lazy").lazyload();</script>' . chr(10) . $meh); ?>