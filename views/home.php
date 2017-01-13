<?php
$add_to_header = '  <meta property="og:type" content="article" />' . chr(10);
$add_to_header .= '  <meta property="og:title" content="Campañas Alternativas" />' . chr(10);
$add_to_header .= '  <meta property="og:description" content="Lo que no dicen los candidatos. Crea tu campaña alternativa en www.mixalo.com" />' . chr(10);
$add_to_header .= '  <meta property="og:url" content="http://www.mixalo.com/" />' . chr(10);
# $add_to_header .= '  <meta property="fb:admins" content="690625762" />' . chr(10);
$add_to_header .= '  <meta property="fb:app_id" content="240337896065664"/>' . chr(10);
?>
<?php get_header(null, array('step' => 1), $add_to_header); ?>
<div id="home">
  <div id="home_epn" class="campaign">
    <a href="/nueva/epn/">
      <img id="epn_o" class="original" src="/views/images/thumb_epn.jpg" />
      <img id="epn_r" class="random" src="<?=$epn->getThumbURI()?>" />
    </a>
  </div>
  <div id="home_jvm" class="campaign right">
    <a href="/nueva/jvm/">
      <img id="jvm_o" class="original" src="/views/images/thumb_jvm.jpg" />
      <img id="jvm_r" class="random" src="<?=$jvm->getThumbURI()?>" />
    </a>
  </div>
  <div id="home_amlo" class="campaign">
    <a href="/nueva/amlo/">
      <img id="amlo_o" class="original" src="/views/images/thumb_amlo.jpg" />
      <img id="amlo_r" class="random" src="<?=$amlo->getThumbURI()?>" />
    </a>
  </div>
  <div id="home_quadri" class="campaign right">
    <a href="/nueva/quadri/">
      <img id="quadri_o" class="original" src="/views/images/thumb_quadri.jpg" />
      <img id="quadri_r" class="random" src="<?=$quadri->getThumbURI()?>" />
    </a>
  </div>
</div>
<script type="text/javascript">
if (window.addEventListener) {
  window.addEventListener('load', function() { initChangeCampaign(); }, false);
} else if (window.attachEvent) {
  window.attachEvent('onload', function() { initChangeCampaign(); });
}

function initChangeCampaign()
{
  setTimeout("changeCampaigns()", 2500);
}
function changeCampaigns()
{
  $('#epn_o').fadeOut(250, function(){
    $('#jvm_o').fadeOut(250, function(){
      $('#amlo_o').fadeOut(250, function(){
        $('#quadri_o').fadeOut(250);
      });
    });
  });
}
</script>
<?php get_footer(); ?>