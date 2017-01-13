<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title><?=$title ? $title . ' | ' . SITE_NAME : SITE_NAME?></title>
  <link rel="stylesheet" href="<?=SITE_URI?>/views/style.css" type="text/css" />
<?php if($add_to_header) echo $add_to_header; ?>
</head>
<body>
<div id="wrapper">
  <div id="content-wrapper">
    <div id="header">
      <h1>
        <a href="<?=SITE_URI?>" title="Ir a la página de inicio y escoger una campaña"><span>Campaña alternativa</span></a>
      </h1>
      <div id="header-create">
        <a id="button-create" href="<?=SITE_URI?>">Crea tu campaña</a>
      </div>
      <ul id="nav">
        <li><a href="/top/">Top</a></li>
        <li><a href="/top/epn/">Top Peña</a></li>
        <li><a href="/top/jvm/">Top Josefina</a></li>
        <li><a href="/top/amlo/">Top AMLO</a></li>
        <li><a href="/top/quadri/">Top Quadri</a></li>
<?php if($user->isLoggedIn()): ?>        
        <li><a href="/ver/recientes/">Recientes</a></li>
        <li><a href="/nueva/modificada/">Modificada</a></li>
        <li class="last"><a href="/login/logout/">Cerrar sesión</a></li>
<?php else: ?>
        <li class="last"><a href="/ver/recientes/">Recientes</a></li>
<?php endif; ?>
      </ul>
    </div>
    <div id="content">
<?php if(isset($properties['step'])): ?>
      <div id="steps" class="step<?=$properties['step']?>"><a href="<?=SITE_URI?>" title="Escoge una campaña"></a></div>
<?php else: ?>
      <div id="steps"><a href="<?=SITE_URI?>" title="Escoge una campaña"></a></div>
<?php endif; ?>
