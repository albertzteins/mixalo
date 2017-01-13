<?php get_header('Campaña alternativa de Andrés Manuel López Obrador', array('step' => 2)); ?>
<div id="campaing-image">
  <span></span>
  <img src="/imagenes/amlo.jpg?line_1=<?=$amlo->getLine1()?>&amp;line_2=<?=$amlo->getLine2()?>" />
</div>
<form action="" method="post">
  <label for="line_1">Línea 1</label>
  <input type="text" class="large" name="line_1" value="<?=getFormValue('line_1') ?: 'El Cambio Verdadero está en tus manos'?>" />
  <label for="line_2" class="nobreak">Línea 2</label>
  <input type="text" class="large" name="line_2" value="<?=getFormValue('line_2') ?: 'Unidos es posible'?>" />
  <label for="author">Firma</label>
  <input type="text" name="author" value="<?=getFormValue('author') ?: ''?>" placeholder="Tu nombre..." />
  <label for="author_site" class="nobreak">Sitio</label>
  <input type="text" name="author_site" value="<?=getFormValue('author_site') ?: ''?>" placeholder="blog / facebook / twitter" /><br />
<?php if($show_publish_button): ?>
  <input type="submit" class="publish" name="publish" value="Publicar" />
<?php endif; ?>
  <input type="submit" class="refresh" name="refresh" value="Actualizar" />
  <input type="reset" class="reset" name="reset" value="Borrar" />
</form>
<?php get_footer(); ?>