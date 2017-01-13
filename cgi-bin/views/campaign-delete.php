<?php get_header('Eliminar campaña'); ?>
<?php if($delete_error): ?>
  <p class="alert error">No se pudo eliminar la campaña, inténtalo más tarde.</p>
<?php elseif($delete_success): ?>
  <p class="alert">La campaña se ha eliminado.</p>
<?php else: ?>
<form id="campaign-delete" action="" method="get">
  <input type="hidden" name="true" value="1" />
  <p>
    ¿Estás seguro que deseas eliminar la campaña?
    <input type="submit" class="refresh" value="Sí, eliminar la campaña" />
  </p>
</form>
<?php endif; ?>
<?php get_footer(); ?>