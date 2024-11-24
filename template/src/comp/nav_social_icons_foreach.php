<?php foreach ($social_icons as $icon) : ?>
  <li class="nav-item <?php echo $icon['li-class'] ? $icon['li-class'] : ''; ?>">
    <a href="<?php echo $icon['href'] ?>" target="_blank" class="nav-link" 
      aria-label="<?php 
        if ($icon['title'] == "phone") {
          echo "call us at ".substr($icon['href'], 4);
        } else if ($icon['title'] == "envelope") {
          echo "email us at ".substr($icon['href'], 7);
        } else {
          echo $icon['title']." social icon opens in a new tab";
        }
      ?>">
      <span class="<?php echo $icon['fa-class'] ?>"><span class="visually-hidden"><?php echo $icon['title'] ?></span></span>
    </a>
  </li>
<?php endforeach; ?>