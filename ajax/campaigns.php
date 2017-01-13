<?php foreach($campaigns as $campaign): ?>
  <li>
    <a href="/ver/<?=$campaign->getId()?>/">
      <img src="<?=$campaign->getThumbURI()?>" />
    </a>
  </li>
<?php endforeach; ?>