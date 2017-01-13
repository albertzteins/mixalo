<?php get_header('Publica tu campaña alternativa personalizada'); ?>
<form action="" method="post" enctype="multipart/form-data">
  <label for="image">Imagen</label>
  <input type="file" class="large" name="image" />
  <label for="campaign_type" class="nobreak">Campaña</label>
  <select name="campaign_type">
    <option value="1">Enrique Peña Nieto</option>
    <option value="2">Josefina Vázquez Mota</option>
    <option value="3">Andrés Manuel López Obrador</option>
    <option value="4">Gabriel Quadri de la Torre</option>
  </select>
  <label for="author">Firma</label>
  <input type="text" name="author" value="<?=getFormValue('author') ?: ''?>" placeholder="Tu nombre..." />
  <label for="author_site" class="nobreak">Sitio</label>
  <input type="text" name="author_site" value="<?=getFormValue('author_site') ?: ''?>" placeholder="blog / facebook / twitter" /><br />
  <input type="submit" class="publish" name="publish" value="Publicar" />
  <input type="reset" class="reset" name="reset" value="Borrar" />
</form>
<?php get_footer(); ?>